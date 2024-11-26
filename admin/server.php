<?php
require __DIR__ . '/../route.php';




$pagetitle = "";




$site_url = $_ENV['site1'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Pusher\Pusher;


$options = array(
  'cluster' => 'ap1',
  'useTLS' => true
);
$pusher = new Pusher(
  '4eb1aed9a19557432a94',
  'd72c290be2a8fcd69e5a',
  '1864996',
  $options
);



$errors = array();
$toast = array();


$db = mysqli_connect($_ENV['host'], $_ENV['user'], $_ENV['pass'], $_ENV['database1']);

date_default_timezone_set(timezoneId: 'Asia/Kuala_Lumpur');



if (isset($_POST['user_register'])) {




  if (empty($_POST['ndp'])) {
    $errors['ndp'] = "NDP required";
  } else {
    $ndp = mysqli_real_escape_string($db, $_POST['ndp']);

  }
  if (empty($_POST['fullname'])) {
    $errors['fullname'] = "fullname required";
  } else {
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);

  }
  if (empty($_POST['kp'])) {
    $errors['kp'] = "kp required";
  } else {
    $kp = mysqli_real_escape_string($db, $_POST['kp']);

  }
  if (empty($_POST['jantina'])) {
    $errors['jantina'] = "jantina required";
  } else {
    $jantina = mysqli_real_escape_string($db, $_POST['jantina']);

  }
  if (empty($_POST['agama'])) {
    $errors['agama'] = "agama required";
  } else {
    $agama = mysqli_real_escape_string($db, $_POST['agama']);

  }
  if (empty($_POST['statuskahwin'])) {
    $errors['statuskahwin'] = "status kahwin required";
  } else {
    $statuskahwin = mysqli_real_escape_string($db, $_POST['statuskahwin']);

  }
  if (empty($_POST['bangsa'])) {
    $errors['bangsa'] = "bangsa required";
  } else {
    $bangsa = mysqli_real_escape_string($db, $_POST['bangsa']);

  }
  if (empty($_POST['email'])) {
    $errors['email'] = "email required";
  } else {
    $email = mysqli_real_escape_string($db, $_POST['email']);

  }
  if (empty($_POST['phone'])) {
    $errors['phone'] = "phone required";
  } else {
    $phone = mysqli_real_escape_string($db, $_POST['phone']);

  }
  if (empty($_POST['password1'])) {
    $errors['password1'] = "password 1 required";
  } else {
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);

  }
  if (empty($_POST['password2'])) {
    $errors['password2'] = "password 2 required";
  } else {
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

  }




  $role = 2;



  if (!empty($_POST['password1']) && !empty($_POST['password2'])) {

    if ($password1 != $password2) {
      $errors['password1'] = "Passwords dont match";
      $errors['password2'] = "Passwords dont match";
    }

  }






  if (isset($ndp) && isset($email) && isset($phone) && isset($kp)) {

    $user_check_query = "SELECT * FROM user WHERE ndp='$ndp' OR email='$email'  OR phone='$phone'    OR kp='$kp'   LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
      if ($user['ndp'] === $ndp) {



        $errors['ndp'] = "NDP already registered";

      }

      if ($user['email'] === $email) {
        $errors['email'] = "Email already registered";

      }

      if ($user['phone'] === $phone) {
        $errors['phone'] = "Phone already registered";

      }

      if ($user['kp'] === $kp) {
        $errors['kp'] = "KP already registered";

      }
    }
  }
  checkuploadpid("test", $errors);



  if (count($errors) == 0) {





    $password = md5($password1);

    $query = "INSERT INTO user (role, ndp,password, nama,email,phone,kp,jantina,agama,status_kahwin,bangsa) 
                          VALUES('$role','$ndp','$password','$fullname','$email','$phone','$kp','$jantina','$agama','$statuskahwin','$bangsa')";
    mysqli_query($db, $query);



    $query = "SELECT * FROM user WHERE (ndp='$ndp' OR email='$email') AND password='$password'";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);

    $filename = uploadpic_id($user['id'], $errors);


    $query2 = "UPDATE user SET image_url='$filename' WHERE email='$email'";
    mysqli_query($db, $query2);

    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    $user['password'] = "";


    $_SESSION['user_details'] = $user;



    header('location:' . $site_url . 'dashboard');
  }
}

if (isset($_POST['user_login'])) {
  $login = mysqli_real_escape_string($db, $_POST['login']);
  $password = mysqli_real_escape_string($db, $_POST['password']);









  if (count($errors) == 0) {






    $password = md5($password);


    $query = "SELECT * FROM user WHERE (ndp='$login' OR email='$login') AND password='$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {

      $user = mysqli_fetch_assoc($results);

      $user['password'] = "";

      $_SESSION['user_details'] = $user;

      if ($_SESSION['user_details']['role'] == 1) {
        if (getAccessTokenFromDatabase($user['id'], $db) != "") {
          $_SESSION['user_details']['access_token'] = getAccessTokenFromDatabase($user['id'], $db);
          // $accessToken = getAccessTokenFromDatabase($_SESSION['user_details']['id'], $db);
        }

      }


      header('location:' . $site_url . 'dashboard');
    } else {
      $errors['login'] = "User doesn't exist or wrong password";
    }
  }

}

if (isset($_POST['edit_profile'])) {
  $username = $_SESSION['user_details']['username'];
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);

  $query = "UPDATE user SET fullname = '$fullname', email='$email',phone_number='$phone' WHERE username='$username' ";
  $results = mysqli_query($db, $query);

}


if (isset($_POST['change_pic'])) {
  // print_r($_FILES);


  $id = $_SESSION['user_details']['id'];

  $filename = uploadpic_id($id, $errors);
  //   uploadpic_id($_SESSION['user_details']['id'], $err);

  $query = "UPDATE user SET image_url='$filename' WHERE id='$id'";
  mysqli_query($db, $query);

  // header('location:' . $site_url . 'user/profile');

}

function debug_to_console($data)
{
  $enable = 1;
  $output = $data;
  if (is_array($output))
    $output = implode(',', $output);
  if ($enable) {
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
  }
}




if (isset($_POST['calendarfetch'])) {




  $id = $_SESSION['user_details']['id'];

  $start = ($_POST['calendarfetch']['start']);
  $end = ($_POST['calendarfetch']['end']);


  $start = date("Y-m-d", strtotime($start));
  $end = date("Y-m-d", strtotime($end));



  $query = "SELECT a.id,masalah ,tarikh as start,jenis,tarikh, event_status, b.ndp as ndp, b.id as user_id ,sebab , kaunselor_id FROM kaunselor_jadual a INNER JOIN ( SELECT id, ndp FROM user ) b  ON b.id = a.user_id WHERE (tarikh BETWEEN ('$start') AND ('$end')) ORDER BY tarikh  ASC ";


  $result = mysqli_query($db, $query);
  $eventArray = array();


  while ($row = mysqli_fetch_assoc($result)) {

    $row['title'] = $row['masalah'] . " (" . $row['ndp'] . ")";


    if ($row['event_status'] == "0") {

      $row['color'] = "	#ef376e";

    }
    if ($row['event_status'] == "1") {
      $row['color'] = "yellow";
      $row['textColor'] = "black";

    }

    if ($row['event_status'] == "2") {
      $row['color'] = "#51cc8a";

    }

    if ($row['event_status'] == "3") {
      $row['color'] = "#747af2";
      $row['textColor'] = "black";

    }
    if ($row['event_status'] == "4") {
      $row['color'] = "	#6b7785";

    }
    if ($row['jenis'] == "1") {
      $row['jenis'] = "Online";

    } else {
      $row['jenis'] = "Offline";

    }
    if ($row['user_id'] != $id) {
      $row['color'] = "gray";
      $row['title'] = "";
      $row['masalah'] = "Ditempah";
      $row['ndp'] = "";

    }










    if ($row['user_id'] == $id) {

      array_push($eventArray, $row);

    } else {
      if ($row['event_status'] != "0") {
        array_push($eventArray, $row);

      }
    }

    $row['allDay'] = "true";


  }


  echo json_encode($eventArray);
  die();

}

if (isset($_POST['calendarfetchcuti'])) {




  $id = $_SESSION['user_details']['id'];

  $start = ($_POST['calendarfetchcuti']['start']);
  $end = ($_POST['calendarfetchcuti']['end']);


  $start = date("Y-m-d", strtotime($start));
  $end = date("Y-m-d", strtotime($end));



  $query = "SELECT * FROM `holiday` WHERE (tarikh BETWEEN ('$start') AND ('$end')) ORDER BY tarikh  ASC ";


  $result = mysqli_query($db, $query);
  $eventArray = array();


  while ($row = mysqli_fetch_assoc($result)) {
 


    array_push($eventArray, $row);



  }


  echo json_encode($eventArray);
  die();

}

if (isset($_POST['calendarfetch2'])) {






  $start = ($_POST['calendarfetch2']['start']);
  $end = ($_POST['calendarfetch2']['end']);


  $start = date("Y-m-d", strtotime($start));
  $end = date("Y-m-d", strtotime($end));



  $query = "SELECT a.id,masalah ,tarikh as start, event_status, b.ndp as ndp, b.id as user_id ,sebab , kaunselor_id, image_url , b.nama, jenis FROM kaunselor_jadual a INNER JOIN ( SELECT id, ndp, image_url,nama FROM user ) b  ON b.id = a.user_id WHERE (tarikh BETWEEN ('$start') AND ('$end') )  ORDER BY FIELD(event_status, 1,2,0)";


  $result = mysqli_query($db, $query);
  $eventArray = array();


  while ($row = mysqli_fetch_assoc($result)) {

    $row['title'] = $row['masalah'] . " (" . $row['ndp'] . ")";



    if ($row['event_status'] == "0") {

      $row['color'] = "	#ef376e";

    }
    if ($row['event_status'] == "1") {
      $row['color'] = "yellow";
      $row['textColor'] = "black";

    }

    if ($row['event_status'] == "2") {
      $row['color'] = "#51cc8a";

    }

    if ($row['event_status'] == "3") {
      $row['color'] = "#747af2";
      $row['textColor'] = "black";

    }
    if ($row['event_status'] == "4") {
      $row['color'] = "	#6b7785";

    }
    $row['allDay'] = "true";

    array_push($eventArray, $row);

  }


  echo json_encode($eventArray);
  die();

}


if (isset($_POST['calendaraddna'])) {





  $title = $_POST['calendaraddna']['title'];
  $start = $_POST['calendaraddna']['start'];
  $user_id = $_POST['calendaraddna']['user_id'];
  $jenis = $_POST['calendaraddna']['type'];


  $start = DateTime::createFromFormat('d/m/y', $start)->format('Y-m-d');









  $query = "INSERT INTO  kaunselor_jadual (user_id,masalah,tarikh,jenis) VALUES ('$user_id','$title','$start','$jenis')";


  $result = mysqli_query($db, $query);















  die();

}



if (isset($_POST['calendardeletena'])) {





  $title = $_POST['calendardeletena']['title'];
  $start = $_POST['calendardeletena']['start'];
  $user_id = $_POST['calendardeletena']['user_id'];












  $query = "DELETE FROM  kaunselor_jadual WHERE id ='$user_id' ";


  $result = mysqli_query($db, $query);















  die();

}


if (isset($_POST['borang_psikologi_send_a'])) {


  $user_id = $_POST['user_id'];
  $answer = array();

  $query = "SELECT id as kategori_id FROM borang_psikologi_kategori";

  $result = mysqli_query($db, $query);
  $katArray = array();
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($katArray, $row);
  }



  foreach ($_POST as $key => $value) {
    if (strpos($key, 'soalan-') === 0) {




      $last = explode("-", $key, 3);
      $soalan_id = $last[1];
      $kategori = $last[2];


      foreach ($katArray as $id => $column) {
        if ($kategori == $katArray[$id]['kategori_id']) {






          if (!array_key_exists("value", $katArray[$id])) {

            $katArray[$id]['value'] = 0;
          }
          $katArray[$id]['value'] = $katArray[$id]['value'] + $value;
        }

      }

      $newarr = array(
        $soalan_id => $value
      );
      array_push($answer, $newarr);

    }
  }
  debug_to_console(json_encode($katArray));
  $answer = json_encode($answer);
  $katArray = json_encode($katArray);
  debug_to_console($user_id);

  $query = "INSERT INTO  user_psikologi (user_id,jawapan_psikologi,keputusan) VALUES ('$user_id','$answer','$katArray')";
  $result = mysqli_query($db, $query);



  header('location:' . $site_url . 'dashboard');

}

function formvalidatelabel($key, $arr)
{


  if ($arr) {
    $error = "";
    if (array_key_exists($key, $arr)) {

      if ($arr[$key]) {
        echo "is-invalid";
      } else {
        echo "is-valid";

      }


    } else {
      echo "is-valid";

    }
  }



}
function formvalidateerr($key, $arr)
{
  if ($arr) {

    if (array_key_exists($key, $arr)) {
      echo $arr[$key];




    }
  }
}

function checkuploadpid($id, &$err)
{

  $uploadOk = 1;


  $target_dir = "./assets/img/user/test/";

  $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $target_file = $target_dir . "gambar." . $imageFileType;

  echo $imageFileType;

  if ($_FILES["gambar"]["size"] > 500000) {
    $err['gambar'] = "File too large";
    $uploadOk = 0;

  }
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $err['gambar'] = "Sorry, only JPG, JPEG & PNG  files are allowed.";
    $uploadOk = 0;

  }

}

function uploadpic_id($id, &$err)
{
  $uploadOk = 1;

  if (!is_dir("./assets/img/user/$id/")) {
    mkdir("./assets/img/user/$id/", 0755, true);
  }

  $target_dir = "./assets/img/user/$id/";

  $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $target_file = $target_dir . "gambar." . $imageFileType;


  if ($_FILES["gambar"]["size"] > 500000) {
    $err['gambar'] = "File too large";
    $uploadOk = 0;

  }
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $err['gambar'] = "Sorry, only JPG, JPEG & PNG  files are allowed.";
    $uploadOk = 0;

  }
  if ($uploadOk == 1) {
    removepic("assets/img/user/" . $_SESSION['user_details']['id'] . "/" . $_SESSION['user_details']['image_url']);

    if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
      $err['gambar'] = "Sorry, there was an error uploading your file.";
    } else {


      return "gambar." . $imageFileType;

    }
  }

}

function removepic($path)
{
  if (file_exists($path)) {

    unlink($path);
  }

}

function showtoast($message, &$toast)
{

  array_push($toast, $message);


  echo '<script>document.addEventListener("DOMContentLoaded", function(event){
  $.each($(".toast"), function (i, item) {coreui.Toast.getOrCreateInstance(item).show();});
});</script>';
}


function showmodal($modal_name)
{




  echo '    <script>  const myModal = new coreui.Modal("#' . $modal_name . '")
      myModal.show();</script>';
}











if (isset($_POST['senaraistudent'])) {

  $students = array();

  $limit = $_POST['senaraistudent']['limit'];  // Records per page
  $offset = $_POST['senaraistudent']['offset'];  // Record starting point
  $draw = $_POST['senaraistudent']['draw'];

  $query =
    "SELECT id,role,ndp,nama,email,phone,kp,jantina,agama,status_kahwin,bangsa,image_url,time_add FROM user WHERE  role='2'   LIMIT $limit OFFSET $offset";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) > 0) {


    while ($user = mysqli_fetch_assoc($results)) {

      $students[] = array(
        "a" => '<div class="avatar avatar-md"><img class="avatar-img"
                                                                src="' . $site_url . 'assets/img/user/' . $user['id'] . '/' . $user['image_url'] . '"
                                                                alt="' . $user['nama'] . '"></div>',
        "b" => '<div class="text-nowrap text-truncate " >' . $user['nama'] . '</div>
                                                        <div class="small text-body-secondary text-nowrap"><span>' . $user['ndp'] . '</span>
                                                        </div>',
        "c" => $user['email'],
        "d" => '
            <a class="btn btn-primary me-2" href="' . $site_url . 'student/' . $user['ndp'] . '">
        <i class="icon bi bi-person-bounding-box"></i></a>
        ',
      );

    }
  }



  $response = [
    "draw" => $draw,
    "recordsTotal" => count($students),
    "recordsFiltered" => count($students),
    "data" => $students
  ];

  echo json_encode($response);
  die();
}

if (isset($_POST['order'])) {

  $order = $_POST['order'];

  foreach ($order as $row) {
    $id = $row['id'];
    $re_order = $row['re_order'];


    $query = "UPDATE borang_psikologi SET re_order = '$re_order' WHERE id = '$id'";
    mysqli_query($db, $query);

  }
  die();

}

if (isset($_POST['senaraisoalan'])) {

  $data = array();

  $query =
    "SELECT a.*,b.nama_kategori , b.id as id_kategory  FROM borang_psikologi a INNER JOIN  borang_psikologi_kategori b ON a.kategori = b.id ORDER BY re_order ASC";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) > 0) {

    while ($row = $results->fetch_assoc()) {
      $data[] = array(
        "id" => $row['id'],
        "a" => '<div class="text-center" >' . $row['re_order'] . '</div>',
        "b" => '<div class="text-center">' . $row['soalan'] . '</div>',
        "c" => '<div class="text-center" data-cat="' . $row['id_kategory'] . '">' . $row['nama_kategori'] . '</div>',
        "d" => '
              <button class="btn btn-primary btn-action"   type="button">
                                                    <svg class="icon">
                                                        <use
                                                            xlink:href="' . $site_url . 'assets/vendors/@coreui/icons/svg/free.svg#cil-people">
                                                        </use>
                                                    </svg>
              </button>
          '
      );
    }
  }

  echo json_encode(array('data' => $data));
  die();

}

if (isset($_POST['addsoalan'])) {
  $soalan = $_POST['addsoalan']['soalan'];
  $kategori = $_POST['addsoalan']['kategori'];

  $query =
    "SELECT MAX(re_order) as max FROM borang_psikologi";

  $results = mysqli_query($db, $query);
  while ($borang = mysqli_fetch_assoc($results)) {

    $max = $borang['max'] + 1;
  }

  $query =
    "INSERT INTO borang_psikologi (soalan,kategori,re_order) VALUES ('$soalan','$kategori','$max')";
  $results = mysqli_query($db, $query);

  die();
}
if (isset($_POST['editsoalan'])) {

  $id = $_POST['editsoalan']['id'];
  $soalan = $_POST['editsoalan']['soalan'];
  $kategori = $_POST['editsoalan']['kategori'];

  $query =
    "UPDATE borang_psikologi SET soalan='$soalan' , kategori='$kategori' WHERE id ='$id' ";
  $results = mysqli_query($db, $query);
  die();

}


// if (isset($_POST['addsoalan'])) {
//   removepic($site_url . "assets/img/user/" . $_SESSION['user_details']['id'] / "/" . $_SESSION['user_details']['image_url']);
//   uploadpic_id($_SESSION['user_details']['id'], $err);
// }


function getEmailContent($filePath, $var = "")
{
  ob_start(); // Start output buffering
  extract($var);
  include(getcwd() . '/views/email/' . $filePath); // Include the PHP file
  $content = ob_get_clean(); // Get the content of the output buffer and clean it
  return $content;


}
function sendmail($receiver, $title, $filepath, $var = "")
{





  $mail = new PHPMailer(true);

  try {

    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->Host = 'kaunselingadtectaiping.com.my';
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['email2_username'];
    $mail->Password = $_ENV['email2_password'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465; // Adjust as needed (e.g., 465 for SSL)


    $mail->setFrom('appointment@kaunselingadtectaiping.com.my', 'Temu Janji');
    $mail->addAddress($receiver);


    $emailBodyContent = getEmailContent($filepath, $var);


    // $mail->addEmbeddedImage(getcwd() . '/assets/img/logo3.png', 'logo_cid'); // 'logo_cid' is a unique ID





    $mail->isHTML(true);

    $mail->Subject = $title;
    if (!$var) {


      $mail->Body = 'This is the HTML message body <b>in bold!</b>';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    } else {
      $mail->Body = $emailBodyContent;         // Set the body with the content from the .php file
      $mail->AltBody = $title;
    }
    $mail->send();
    // echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}


if (isset($_POST['test3'])) {

  // header('Content-Type: application/json');
  $ndp = '29124087';
  // echo $ndp;

  $query =
    "SELECT a.*,b.ndp  FROM `user_psikologi`  a 
      INNER JOIN user b  ON  a.user_id = b.id
      
      WHERE ndp = '$ndp' ORDER BY a.id DESC LIMIT 1";

  $query2 =
    "SELECT a.*,b.ndp  FROM `user_psikologi`  a INNER JOIN user b  ON  a.user_id = b.id WHERE ndp = '$ndp' ORDER BY a.id ASC LIMIT 1";

  $query3 =
    "SELECT id,nama_kategori,normal,ringan,sederhana,teruk,sangat_teruk FROM `borang_psikologi_kategori`";


  $rows = [];
  $rows2 = [];

  $results = mysqli_query($db, $query);
  while ($psikologi = mysqli_fetch_assoc($results)) {

    $rows[] = json_decode($psikologi['keputusan'], true);
  }
  $results = mysqli_query($db, $query2);
  while ($psikologi = mysqli_fetch_assoc($results)) {

    $rows[] = json_decode($psikologi['keputusan'], true);
  }


  $results = mysqli_query($db, $query3);
  while ($kategori = mysqli_fetch_assoc($results)) {
    $kategoriMap[$kategori['id']] = [
      'nama_kategori' => ucfirst($kategori['nama_kategori']),
      'normal' => $kategori['normal'],
      'ringan' => $kategori['ringan'],
      'sederhana' => $kategori['sederhana'],
      'teruk' => $kategori['teruk'],
      'sangat_teruk' => $kategori['sangat_teruk'],
    ];
  }

  // Map category names to the rows data
  foreach ($rows as &$row) {
    foreach ($row as &$item) {
      if (isset($kategoriMap[$item['kategori_id']])) {
        $item['kategori_name'] = $kategoriMap[$item['kategori_id']]['nama_kategori'];
        $item['normal'] = $kategoriMap[$item['kategori_id']]['normal'];
        $item['ringan'] = $kategoriMap[$item['kategori_id']]['ringan'];
        $item['sederhana'] = $kategoriMap[$item['kategori_id']]['sederhana'];
        $item['teruk'] = $kategoriMap[$item['kategori_id']]['teruk'];
        $item['sangat_teruk'] = $kategoriMap[$item['kategori_id']]['sangat_teruk'];

        if ($item['value'] > $kategoriMap[$item['kategori_id']]['sangat_teruk']) {
          $item['level'] = "sangat teruk";
        } else if ($item['value'] > $kategoriMap[$item['kategori_id']]['teruk']) {
          $item['level'] = "teruk";

        } else if ($item['value'] > $kategoriMap[$item['kategori_id']]['sederhana']) {
          $item['level'] = "sederhana";

        } else if ($item['value'] > $kategoriMap[$item['kategori_id']]['ringan']) {
          $item['level'] = "ringan";

        } else {
          $item['level'] = "normal";

        }
        // $item['sangat_teruk'] = $kategoriMap[$item['kategori_id']]['sangat_teruk'];
      } else {
        $item['kategori_name'] = 'Unknown';
      }
    }
  }

  if (count($rows) > 0) {
    // Get the first and last rows
    $firstRow = $rows[0];
    $lastRow = $rows[count($rows) - 1];

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode([
      'firstRow' => $firstRow,
      'lastRow' => $lastRow
    ]);


    die();

  }


  //   $data = [
//     ['kategori_id' => '1', 'value' => 1],
//     ['kategori_id' => '2', 'value' => 2],
//     ['kategori_id' => '3', 'value' => 2]
// ];
// header('Content-Type: application/json');
// Return the data as JSON
  // echo json_encode($data);
}
if (isset($_POST['kaunselor_reject'])) {

  $now = date('Y-m-d H:i:s');

  $event_id = $_POST['kaunselor_reject']['id'];
  $sebab = $_POST['kaunselor_reject']['sebab'];
  $kaunselor_id = $_SESSION['user_details']['id'];
  // echo $event_id;
  $query =
    "UPDATE kaunselor_jadual SET event_status = 0 , sebab = '$sebab' , time_edit='$now' ,kaunselor_id='$kaunselor_id'  WHERE id = '$event_id'";
  $results = mysqli_query($db, $query);


  $query2 =
    "SELECT a.*, b.email,b.ndp,b.nama FROM `kaunselor_jadual` a INNER JOIN  user b ON a.user_id = b.id  WHERE a.id = '$event_id'";
  $results2 = mysqli_query($db, $query2);

  $event = mysqli_fetch_assoc($results2);

  $start_modified = date('j F Y gA', strtotime($event['tarikh']));

  $var = array(
    'link' => $site_url . "kaunseling/temujanji/$event_id", // Example variable
    'alasan' => $sebab // Example variable
  );
  sendmail($event['email'], "Temu Janji Anda Pada $start_modified telah dibatalkan", 'meeting_reject.php', $var);






}

if (isset($_POST['kaunselor_approve'])) {


  $event_id = $_POST['kaunselor_approve']['id'];
  $mula1 = $_POST['kaunselor_approve']['mula'];
  $tamat1 = $_POST['kaunselor_approve']['tamat'];
  $kaunselor_id = $_SESSION['user_details']['id'];

  if ($mula1 && $tamat1) {
    // echo $event_id;
    $query =
      "SELECT * FROM kaunselor_jadual WHERE id='$event_id'";
    $results = mysqli_query($db, $query);

    // echo "test";
    $event = mysqli_fetch_assoc($results);
    $mula = date_format(new DateTime(datetime: $event['tarikh'] . $mula1), "Y/m/d H:i:s");
    $tamat = date_format(new DateTime(datetime: $event['tarikh'] . $tamat1), "Y/m/d H:i:s");

    echo $event['tarikh'] . $mula1;

    // list($hours2, $minutes2) = explode(separator: ':', $tamat1);


    // $rows[] = json_decode($psikologi['keputusan'], true);
    $now = date('Y-m-d H:i:s');

    $query1 =
      "UPDATE kaunselor_jadual SET event_status = 2, masa_mula ='$mula', masa_tamat = '$tamat', time_edit='$now',kaunselor_id='$kaunselor_id'   WHERE id = '$event_id'";
    $results = mysqli_query($db, $query1);


    $query2 =
      "SELECT a.*, b.email,b.ndp,b.nama FROM `kaunselor_jadual` a INNER JOIN  user b ON a.user_id = b.id  WHERE a.id = '$event_id'";
    $results2 = mysqli_query($db, $query2);

    $event = mysqli_fetch_assoc($results2);

    $start_modified = date('j F Y gA', strtotime($event['tarikh']));

    $var = array(
      'link' => $site_url . "kaunseling/temujanji/$event_id" // Example variable
    );
    sendmail($event['email'], "Temu Janji Anda Pada $start_modified telah diluluskan", 'meeting_approve.php', $var);


  }


}


function saveTokensToDatabase($accessToken, $refreshToken, $expiresIn, $user_id, $db)
{
  $expiresAt = date('Y-m-d H:i:s', time() + $expiresIn); // Calculate expiration time

  // Assume you have a logged-in user with $userId
  // $userId = 'some_unique_user_id';

  // Save to database (example using PDO)

  $query =
    "INSERT INTO oauth (user_id,access_token,refresh_token,expires_at) VALUES ('$user_id','$accessToken','$refreshToken','$expiresAt') ON 
  DUPLICATE KEY UPDATE access_token='$accessToken',refresh_token='$refreshToken',expires_at='$expiresAt'";
  $results = mysqli_query($db, $query);
}

function getAccessTokenFromDatabase($user_id, $db)
{
  // Retrieve tokens from database


  $query =
    "SELECT access_token, refresh_token, expires_at FROM oauth WHERE user_id = '$user_id'";
  $results = mysqli_query($db, $query);

  if (mysqli_num_rows($results) == 1) {

    $tokenData = $results->fetch_assoc();

    // Check if the access token is expired
    if (time() > strtotime($tokenData['expires_at'])) {
      // Token expired, use the refresh token to get a new access token
      return refreshAccessToken($tokenData['refresh_token'], $user_id, $db);
    }
    return $tokenData['access_token']; // Return valid access token

  }

  return;
}



function refreshAccessToken($refreshToken, $user_id, $db)
{
  $client = new Google_Client();
  $client->setAuthConfig('../client_secret.json');
  $client->refreshToken($refreshToken);

  $newAccessToken = $client->getAccessToken();
  $expiresAt = date('Y-m-d H:i:s', time() + $newAccessToken['expires_in']);

  $accesstoken = $newAccessToken['access_token'];

  $query =
    "UPDATE oauth SET access_token = '$accesstoken', expires_at = '$expiresAt' WHERE user_id = '$user_id'";
  $results = mysqli_query($db, $query);

  $query =
    "SELECT access_token, refresh_token, expires_at FROM oauth WHERE user_id = '$user_id'";
  $results = mysqli_query($db, $query);


  $tokenData = $results->fetch_assoc();

  return $tokenData['access_token']; // Return new access token
}


//cronserver
// /usr/bin/curl -X POST -H "Content-Type: application/json" -d '{"key1":"value1"}' https://example.com/api/endpoint


if (isset($_POST['senaraitemujanji'])) {



  $limit = $_POST['senaraitemujanji']['limit'];  // Records per page
  $offset = $_POST['senaraitemujanji']['offset'];  // Record starting point
  $draw = $_POST['senaraitemujanji']['draw'];


  $data = array();

  $today = date('Y-m-d');
  // echo $today;
  $user_id = $_POST['senaraitemujanji']['user_id'];
  // echo $today;
  if ($user_id != "test") {
    $quser_id = "AND event_status >='1' AND user_id='$user_id'";
  } else {
    $quser_id = "AND event_status >='1' ";
  }
  $totalQuery = "SELECT COUNT(*) as total FROM kaunselor_jadual a WHERE a.tarikh = '$today' $quser_id";
  $totalResult = mysqli_query($db, $totalQuery);
  $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

  // Query to count filtered records
  $filteredQuery = "SELECT COUNT(*) as filtered FROM kaunselor_jadual a WHERE a.tarikh = '$today' $quser_id";
  $filteredResult = mysqli_query($db, $filteredQuery);
  $filteredRecords = mysqli_fetch_assoc($filteredResult)['filtered'];

  $query =
    "SELECT a.* , b.nama,  b.ndp, b.image_url FROM kaunselor_jadual a INNER JOIN  user b ON a.user_id = b.id  WHERE a.tarikh ='$today'     $quser_id  LIMIT $limit OFFSET  $offset";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) > 0) {

    while ($row = $results->fetch_assoc()) {

      $timestamp = strtotime($row['tarikh']);
      $formattedDate = date('d / m / Y', $timestamp);

      if ($row['event_status'] == "0") {

        $class = "btn-danger";
      }
      if ($row['event_status'] == "1") {
        $class = "btn-warning";


      }

      if ($row['event_status'] == "2") {
        $class = "btn-success";


      }

      if ($row['event_status'] == "3") {
        $class = "btn-info";


      }
      if ($row['event_status'] == "4") {
        $class = "btn-secondary";


      }

      $data[] = array(

        "a" => '<div class="avatar avatar-md"><img class="avatar-img" src="' . $site_url . 'assets/img/user/' . $row['user_id'] . '/' . $row['image_url'] . '"
              alt="user@email.com"></div>',
        "b" => '<div class="text-nowrap">' . $row['nama'] . '</div>' . '<div class="small text-body-secondary text-nowrap">' . $row['ndp'] . '</div>',
        "c" => '<div class="text-center">' . $row['masalah'] . '</div>',
        "d" => '<div class="text-center">' . $formattedDate . '</div>' . '<div class="small text-body-secondary text-nowrap">' . date("h:i") . '</div>',
        "e" => '
              <a class="btn ' . $class . '" href="' . $site_url . 'kaunseling/temujanji/' . $row['id'] . '">
<i class="icon  bi bi-calendar-plus"></i>
              </a>
          '
      );
    }
  }

  $output = array(
    "draw" => $draw,  // Return the draw parameter back
    "recordsTotal" => intval($totalRecords),   // Total number of records
    "recordsFiltered" => intval($filteredRecords), // Total number of filtered records
    "data" => $data   // Actual data to be displayed
  );

  echo json_encode($output);
  die();

}


if (isset($_POST['senaraitemujanji2'])) {

  $limit = $_POST['senaraitemujanji2']['limit'];  // Records per page
  $offset = $_POST['senaraitemujanji2']['offset'];  // Record starting point
  $draw = $_POST['senaraitemujanji2']['draw'];


  $data = array();

  $today = date('Y-m-d');
  // echo $today;
  $user_id = $_POST['senaraitemujanji2']['user_id'];
  // echo $today;
  if ($user_id != "test") {
    $quser_id = "AND event_status >='1' AND user_id='$user_id'";
  } else {
    $quser_id = "AND event_status >='1' ";
  }
  $totalQuery = "SELECT COUNT(*) as total FROM kaunselor_jadual a WHERE a.tarikh < '$today' $quser_id";
  $totalResult = mysqli_query($db, $totalQuery);
  $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

  // Query to count filtered records
  $filteredQuery = "SELECT COUNT(*) as filtered FROM kaunselor_jadual a WHERE a.tarikh < '$today' $quser_id";
  $filteredResult = mysqli_query($db, $filteredQuery);
  $filteredRecords = mysqli_fetch_assoc($filteredResult)['filtered'];

  $query =
    "SELECT a.* , b.nama,  b.ndp, b.image_url FROM kaunselor_jadual a INNER JOIN  user b ON a.user_id = b.id  WHERE a.tarikh <'$today'     $quser_id ORDER BY a.tarikh DESC LIMIT $limit OFFSET  $offset ";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) > 0) {

    while ($row = $results->fetch_assoc()) {

      $timestamp = strtotime($row['tarikh']);
      $formattedDate = date('d / m / Y', $timestamp);
      if ($row['event_status'] == "0") {

        $class = "btn-danger";
      }
      if ($row['event_status'] == "1") {
        $class = "btn-warning";


      }

      if ($row['event_status'] == "2") {
        $class = "btn-success";


      }

      if ($row['event_status'] == "3") {
        $class = "btn-info";


      }
      if ($row['event_status'] == "4") {
        $class = "btn-secondary";


      }

      $data[] = array(

        "a" => '<div class="avatar avatar-md"><img class="avatar-img" src="' . $site_url . 'assets/img/user/' . $row['user_id'] . '/' . $row['image_url'] . '"
              alt="user@email.com"></div>',
        "b" => '<div class="text-nowrap">' . $row['nama'] . '</div>' . '<div class="small text-body-secondary text-nowrap">' . $row['ndp'] . '</div>',
        "c" => '<div class="text-center">' . $row['masalah'] . '</div>',
        "d" => '<div class="text-center">' . $formattedDate . '</div>' . '<div class="small text-body-secondary text-nowrap">' . date("h:i") . '</div>',
        "e" => '
              <a class="btn ' . $class . '" href="' . $site_url . 'kaunseling/temujanji/' . $row['id'] . '">
                <i class="icon  bi bi-calendar-x"></i>
              </a>
          '
      );
    }
  }

  $output = array(
    "draw" => $draw,  // Return the draw parameter back
    "recordsTotal" => intval($totalRecords),   // Total number of records
    "recordsFiltered" => intval($filteredRecords), // Total number of filtered records
    "data" => $data   // Actual data to be displayed
  );

  echo json_encode($output);
  die();

}

if (isset($_POST['senaraitemujanji3'])) {


  $limit = $_POST['senaraitemujanji3']['limit'];  // Records per page
  $offset = $_POST['senaraitemujanji3']['offset'];  // Record starting point
  $draw = $_POST['senaraitemujanji3']['draw'];


  $data = array();

  $today = date('Y-m-d');
  // echo $today;
  $user_id = $_POST['senaraitemujanji3']['user_id'];
  // echo $today;
  if ($user_id != "test") {
    $quser_id = "AND event_status >='1' AND user_id='$user_id'";
  } else {
    $quser_id = "AND event_status >='1' ";
  }
  $totalQuery = "SELECT COUNT(*) as total FROM kaunselor_jadual a WHERE a.tarikh > '$today' $quser_id";
  $totalResult = mysqli_query($db, $totalQuery);
  $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

  // Query to count filtered records
  $filteredQuery = "SELECT COUNT(*) as filtered FROM kaunselor_jadual a WHERE a.tarikh > '$today' $quser_id";
  $filteredResult = mysqli_query($db, $filteredQuery);
  $filteredRecords = mysqli_fetch_assoc($filteredResult)['filtered'];

  $query =
    "SELECT a.* , b.nama,  b.ndp, b.image_url FROM kaunselor_jadual a INNER JOIN  user b ON a.user_id = b.id  WHERE a.tarikh >'$today'     $quser_id  ORDER BY a.tarikh ASC  LIMIT $limit OFFSET  $offset";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) > 0) {

    while ($row = $results->fetch_assoc()) {

      $timestamp = strtotime($row['tarikh']);
      $formattedDate = date('d / m / Y', $timestamp);

      if ($row['event_status'] == "0") {

        $class = "btn-danger";
      }
      if ($row['event_status'] == "1") {
        $class = "btn-warning";


      }

      if ($row['event_status'] == "2") {
        $class = "btn-success";


      }

      if ($row['event_status'] == "3") {
        $class = "btn-info";


      }
      if ($row['event_status'] == "4") {
        $class = "btn-secondary";


      }

      $data[] = array(

        "a" => '<div class="avatar avatar-md"><img class="avatar-img" src="' . $site_url . 'assets/img/user/' . $row['user_id'] . '/' . $row['image_url'] . '"
              alt="user@email.com"></div>',
        "b" => '<div class="text-nowrap">' . $row['nama'] . '</div>' . '<div class="small text-body-secondary text-nowrap">' . $row['ndp'] . '</div>',
        "c" => '<div class="text-center">' . $row['masalah'] . '</div>',
        "d" => '<div class="text-center">' . $formattedDate . '</div>' . '<div class="small text-body-secondary text-nowrap">' . date("h:i") . '</div>',
        "e" => '
              <a class="btn ' . $class . '" href="' . $site_url . 'kaunseling/temujanji/' . $row['id'] . '">
                     <i class="icon  bi bi-calendar-plus"></i>
              </a>
          '
      );
    }
  }

  $output = array(
    "draw" => $draw,  // Return the draw parameter back
    "recordsTotal" => intval($totalRecords),   // Total number of records
    "recordsFiltered" => intval($filteredRecords), // Total number of filtered records
    "data" => $data   // Actual data to be displayed
  );

  echo json_encode($output);
  die();

}



if (isset($_POST['temujanji_update'])) {


  $meeting_id = $_POST['temujanji_update']['meeting_id'];




  if (isset($_POST['temujanji_update']['selector'])) {
    $selector = $_POST['temujanji_update']['selector'];
  }

  $start = date('Y-m-d\TH:i:sP', strtotime($_POST['temujanji_update']['start']));
  $end = date('Y-m-d\TH:i:sP', strtotime($_POST['temujanji_update']['end']));
  $user_id = $_POST['temujanji_update']['user_id'];
  $user_mail = $_POST['temujanji_update']['user_mail'];

  $start_modified = date('j F Y gA', strtotime($_POST['temujanji_update']['start']));

  // echo $start;
  // debug_to_console($start);
  if (isset($_POST['temujanji_update']['manual'])) {
    $manual = $_POST['temujanji_update']['manual'];


    if (!$selector) {
      if (isset($_SESSION['user_details']['access_token'])) {


        $client = new Google_Client();
        $client->setAuthConfig('../client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $client->setAccessToken(getAccessTokenFromDatabase($_SESSION['user_details']['id'], $db));

        $calendarService = new Google_Service_Calendar($client);
        // Create a Google Meet event
        $event = new Google_Service_Calendar_Event(array(
          'summary' => 'Kaunseling ADTEC Meeting',
          'start' => array(
            'dateTime' => $start, // Specify your date and time here
            'timeZone' => 'Asia/Kuala_Lumpur',
          ),
          'end' => array(
            'dateTime' => $end,
            'timeZone' => 'Asia/Kuala_Lumpur',
          ),
          'conferenceData' => array(
            'createRequest' => array(
              'requestId' => 'random-string',
              'conferenceSolutionKey' => array(
                'type' => 'hangoutsMeet'
              ),
            ),
          ),
        ));

        try {
          // Insert the event into the calendar
          $event = $calendarService->events->insert('primary', $event, array('conferenceDataVersion' => 1));

          // Get the Google Meet link
          $googleMeetLink = $event->getHangoutLink();

          $parsedUrl = parse_url($googleMeetLink, PHP_URL_PATH);
          $googleMeetCode = basename($parsedUrl);


          // $meeting_link = $googleMeetLink; // Store the meeting link
          $var = array(
            'meeting_link' => $googleMeetLink, // Example variable
            'meeting_code' => $googleMeetCode // Example variable
          );
          // echo $user_mail;
          // echo 'Meet Link: ' . $meeting_link; // Output the meeting link

          $now = date('Y-m-d H:i:s');


          $query =
            "UPDATE kaunselor_jadual SET event_status = '3', masa_mula2 = '$now', meeting_link='$googleMeetLink' , time_edit='$now' WHERE id = '$meeting_id'";

          $results = mysqli_query($db, $query);

          sendmail($user_mail, "Link Temu Janji Pada $start_modified", 'meeting_link.php', $var);



        } catch (Exception $e) {
          // Handle error
          // echo 'Error creating event: ' . $e->getMessage();

        }


      }
    } else {


      if (!$manual) {

        // showtoast("Please Enter The Google Meeting Link Manually", $toast); // Use actual NULL for the database

        echo "Please Enter The Google Meeting Link Manually";

      } else {
        $now = date('Y-m-d H:i:s');

        // $meeting_link = $manual;

          $parsedUrl = parse_url($googleMeetLink, PHP_URL_PATH);
          $googleMeetCode = basename($parsedUrl);


          // $meeting_link = $googleMeetLink; // Store the meeting link
          $var = array(
            'meeting_link' => $googleMeetLink, // Example variable
            'meeting_code' => $googleMeetCode // Example variable
          );

        $query =
          "UPDATE kaunselor_jadual SET event_status = '3', masa_mula2 = '$now', meeting_link='$manual' , time_edit='$now' WHERE id = '$meeting_id'";

        $results = mysqli_query($db, $query);
        sendmail($user_mail, "Link Temu Janji Pada $start_modified", 'meeting_link.php', $var);

      }

    }
  } else {
    $now = date('Y-m-d H:i:s');
    // echo $meeting_id;
    // $meeting_link = $manual;
    $query =
      "UPDATE kaunselor_jadual SET event_status = '3', masa_mula2 = '$now', time_edit='$now' WHERE id = '$meeting_id'";
    $results = mysqli_query($db, $query);

  }




  die();



}
if (isset($_POST['temujanji_end'])) {


  $now = date('Y-m-d H:i:s');
  $user_mail = $_POST['temujanji_end']['user_mail'];
  $meeting_id = $_POST['temujanji_end']['meeting_id'];


  $query =
    "UPDATE kaunselor_jadual SET event_status = '4', masa_tamat2 = '$now' , time_edit='$now' WHERE id = '$meeting_id'";

  $results = mysqli_query($db, $query);

  // sendmail($user_mail, "Meeting Link", 'meeting_link.php', $meeting_link, $site_url);


  $query2 =
    "SELECT a.*, b.email,b.ndp,b.nama FROM `kaunselor_jadual` a INNER JOIN  user b ON a.user_id = b.id  WHERE a.id = '$event_id'";
  $results2 = mysqli_query($db, $query2);

  $event = mysqli_fetch_assoc($results2);

  $start_modified = date('j F Y gA', strtotime($event['tarikh']));

  $var = array(
    'link' => $site_url . "kaunseling/temujanji/$event_id" // Example variable
  );
  sendmail($event['email'], "Temu Janji Anda Pada $start_modified telah ditamat", 'meeting_end.php', $var);


  die();

}



if (isset($_POST['bar_chart_kaunseling_total'])) {
  $year = $_POST['bar_chart_kaunseling_total']['year'];
  $query = " SELECT MONTHNAME(tarikh) as month, COUNT(*) as count FROM kaunselor_jadual WHERE YEAR(tarikh) = '$year'   GROUP BY MONTH(tarikh) ORDER BY MONTH(tarikh); ";
  $result = mysqli_query($db, $query);
  $data = [];
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
  }
  echo json_encode($data);
  die();

}


if (isset($_POST['card_chart_kaunseling_total_day'])) {
  $month = $_POST['card_chart_kaunseling_total_day']['month'];
  $year = $_POST['card_chart_kaunseling_total_day']['year'];
  $query = "SELECT DAYNAME(tarikh) AS day_of_week, COUNT(*) AS total 
  FROM kaunselor_jadual 
  WHERE MONTH(tarikh) = '$month' AND YEAR(tarikh) = '$year'
  GROUP BY DAYOFWEEK(tarikh) 
  ORDER BY FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');";
  $result = mysqli_query($db, $query);
  $data = [];
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
  }
  echo json_encode($data);
  die();

}



if (isset($_POST['fetch_masalah'])) {

  $query = "SELECT masalah, COUNT(*) as frequency FROM kaunselor_jadual GROUP BY masalah ORDER BY frequency DESC";
  $result = mysqli_query($db, $query);

  $options = "<option value=''>All" . '</option>';
  while ($row = $result->fetch_assoc()) {
    $options .= "<option value='" . $row['masalah'] . "'>" . $row['masalah'] . '</option>';
  }

  echo json_encode($options);
  die();

}


if (isset($_POST['kaunseling_analytics'])) {
  $limit = $_POST['kaunseling_analytics']['limit'];
  $offset = $_POST['kaunseling_analytics']['offset'];
  $draw = $_POST['kaunseling_analytics']['draw'];
  $search = $_POST['kaunseling_analytics']['search'];
  $gender = $_POST['kaunseling_analytics']['gender'];
  $masalah = $_POST['kaunseling_analytics']['masalah'];
  $status = $_POST['kaunseling_analytics']['status'];

  if ($gender == 'Lelaki') {
    $gender2 = '1';
  } else {
    $gender2 = '0';
  }
  // Total records count
  $totalQuery = "SELECT COUNT(*) as total FROM kaunselor_jadual";
  $totalResult = mysqli_query($db, $totalQuery);
  $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

  // Total filtered records count
  $filteredQuery = "SELECT COUNT(*) as filtered, a.*, b.jantina FROM kaunselor_jadual a INNER JOIN user b ON b.id= a.user_id WHERE 1=1";
  if (!empty($search)) {
    $filteredQuery .= " AND (jantina LIKE '%$search%' OR masalah LIKE '%$search%' )";
  }
  if (!empty($gender)) {
    $filteredQuery .= " AND jantina = '$gender2'";
  }
  if (!empty($masalah)) {
    $filteredQuery .= " AND masalah = '$masalah'";
  }
  if ($status !== '') {
    $filteredQuery .= " AND event_status = '$status'";
  }
  $filteredResult = mysqli_query($db, $filteredQuery);
  $filteredRecords = mysqli_fetch_assoc(result: $filteredResult)['filtered'];

  // Fetch records
  $query = "SELECT a.*, b.jantina FROM kaunselor_jadual a INNER JOIN user b ON b.id= a.user_id WHERE 1=1";
  if (!empty($search)) {
    $query .= " AND (jantina LIKE '%$search%' OR masalah LIKE '%$search%')";
  }
  if (!empty($gender)) {
    $query .= " AND jantina = '$gender2'";
  }
  if (!empty($masalah)) {
    $query .= " AND masalah = '$masalah'";
  }
  if ($status !== '') {
    $query .= " AND event_status = '$status'";
  }
  $query .= " LIMIT $offset, $limit";
  $results = mysqli_query($db, $query);

  $data = [];
  if (mysqli_num_rows($results) > 0) {
    while ($row = mysqli_fetch_assoc($results)) {
      $jantina = ($row['jantina'] == '1') ? 'Lelaki' : 'Perempuan';
      $status_text = ($row['event_status'] == '2') ? 'Success' : (($row['event_status'] == '1') ? 'Waiting' : 'Fail');
      $data[] = array(
        "a" => $row['masalah'],
        "b" => $jantina,
        "c" => $status_text,
      );
    }
  }

  $output = array(
    "draw" => $draw,
    "recordsTotal" => intval($totalRecords),
    "recordsFiltered" => intval($filteredRecords),
    "data" => $data
  );

  echo json_encode($output);
  die();
}



?>