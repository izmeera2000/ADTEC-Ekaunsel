<?php
require __DIR__ . '/../route.php';




$pagetitle = "";




$site_url = $_ENV['site1'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




$errors = array();
$toast = array();


$db = mysqli_connect($_ENV['host'], $_ENV['user'], $_ENV['pass'], $_ENV['database1']);




if (isset($_POST['user_register'])) {




  if (empty($_POST['ndp'])) {
    $errors['ndp'] = "NDP requred";
  } else {
    $ndp = mysqli_real_escape_string($db, $_POST['ndp']);

  }
  if (empty($_POST['fullname'])) {
    $errors['fullname'] = "fullname requred";
  } else {
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);

  }
  if (empty($_POST['kp'])) {
    $errors['kp'] = "kp requred";
  } else {
    $kp = mysqli_real_escape_string($db, $_POST['kp']);

  }
  if (empty($_POST['jantina'])) {
    $errors['jantina'] = "jantina requred";
  } else {
    $jantina = mysqli_real_escape_string($db, $_POST['jantina']);

  }
  if (empty($_POST['agama'])) {
    $errors['agama'] = "agama requred";
  } else {
    $agama = mysqli_real_escape_string($db, $_POST['agama']);

  }
  if (empty($_POST['statuskahwin'])) {
    $errors['statuskahwin'] = "statuskahwin requred";
  } else {
    $statuskahwin = mysqli_real_escape_string($db, $_POST['statuskahwin']);

  }
  if (empty($_POST['bangsa'])) {
    $errors['bangsa'] = "bangsa requred";
  } else {
    $bangsa = mysqli_real_escape_string($db, $_POST['bangsa']);

  }
  if (empty($_POST['email'])) {
    $errors['email'] = "email requred";
  } else {
    $email = mysqli_real_escape_string($db, $_POST['email']);

  }
  if (empty($_POST['phone'])) {
    $errors['phone'] = "phone requred";
  } else {
    $phone = mysqli_real_escape_string($db, $_POST['phone']);

  }
  if (empty($_POST['password1'])) {
    $errors['password1'] = "password1 requred";
  } else {
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);

  }
  if (empty($_POST['password2'])) {
    $errors['password2'] = "password2 requred";
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



    header('location:' . $site_url . '');
  }
}

if (isset($_POST['user_login'])) {
  $login = mysqli_real_escape_string($db, $_POST['login']);
  $password = mysqli_real_escape_string($db, $_POST['password']);









  if (count($errors) == 0) {






    $password = md5($password);


    $query = "SELECT * FROM user WHERE (ndp='$login' or email='$login') AND password='$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {

      $user = mysqli_fetch_assoc($results);

      $user['password'] = "";

      $_SESSION['user_details'] = $user;




      header('location:' . $site_url . '');
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

  $id = $_SESSION['user_details']['id'];

  $filename = uploadpic_id($id, $errors);


  $query = "UPDATE user SET image_url='$filename' WHERE id='$id'";
  mysqli_query($db, $query);

  header('location:' . $site_url . 'user/profile');

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



  $query = "SELECT a.id,masalah ,tarikh as start,tarikh, event_status, b.ndp as ndp, b.id as user_id ,sebab , kaunselor_id FROM kaunselor_jadual a INNER JOIN ( SELECT id, ndp FROM user ) b  ON b.id = a.user_id WHERE (tarikh BETWEEN ('$start') AND ('$end')) ORDER BY tarikh  ASC ";


  $result = mysqli_query($db, $query);
  $eventArray = array();


  while ($row = mysqli_fetch_assoc($result)) {

    $row['title'] = $row['masalah'] . " (" . $row['ndp'] . ")";


    if ($row['event_status'] == "0") {

      $row['color'] = "red";

    }

    if ($row['event_status'] == "2") {
      $row['color'] = "green";

    }
    if ($row['user_id'] != $id) {
      $row['color'] = "gray";
      $row['title'] = "";
      $row['masalah'] = "";
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
if (isset($_POST['calendarfetch2'])) {






  $start = ($_POST['calendarfetch2']['start']);
  $end = ($_POST['calendarfetch2']['end']);


  $start = date("Y-m-d", strtotime($start));
  $end = date("Y-m-d", strtotime($end));



  $query = "SELECT a.id,masalah ,tarikh as start, event_status, b.ndp as ndp, b.id as user_id ,sebab , kaunselor_id FROM kaunselor_jadual a INNER JOIN ( SELECT id, ndp FROM user ) b  ON b.id = a.user_id WHERE (tarikh BETWEEN ('$start') AND ('$end')) ORDER BY id";


  $result = mysqli_query($db, $query);
  $eventArray = array();


  while ($row = mysqli_fetch_assoc($result)) {

    $row['title'] = $row['masalah'] . " (" . $row['ndp'] . ")";


    if ($row['event_status'] == "0") {
      $row['color'] = "red";

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












  $query = "INSERT INTO  kaunselor_jadual (user_id,masalah,tarikh) VALUES ('$user_id','$title','$start')";


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



  header('location:' . $site_url . '');

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

    if (!move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
      $err['gambar'] = "Sorry, there was an error uploading your file.";
    } else {
      return "gambar." . $imageFileType;

    }
  }

}

function removepic($path)
{
  unlink($path);

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

  $query =
    "SELECT id,role,ndp,nama,email,phone,kp,jantina,agama,status_kahwin,bangsa,image_url,time_add FROM user WHERE  role='2'";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) > 0) {


    while ($user = mysqli_fetch_assoc($results)) {

      $students[] = array(
        "a" => '<div class="avatar avatar-md"><img class="avatar-img"
                                                                src="' . $site_url . 'assets/img/user/' . $user['id'] . '/' . $user['image_url'] . '"
                                                                alt="' . $user['nama'] . '"></div>',
        "b" => '<div class="text-nowrap">' . $user['nama'] . '</div>
                                                        <div class="small text-body-secondary text-nowrap">
                                                            <span >Registered:
                                                            </span><span>' . $user['time_add'] . '</span>
                                                        </div>',
        "c" => $user['email'],
        "d" => '
            <a class="btn btn-success me-2" href="' . $site_url . 'kaunselor/student/' . $user['ndp'] . '">
        <svg class="icon">
            <use
                xlink:href="' . $site_url . '/assets/vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass">
            </use>
        </svg></a>
        ',
      );

    }
  }



  $response = [
    "draw" => intval($_POST['draw'] ?? 1),
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
    "SELECT a.*,b.nama_kategori  FROM borang_psikologi a INNER JOIN  borang_psikologi_kategori b ON a.kategori = b.id ORDER BY re_order ASC";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results) > 0) {

    while ($row = $results->fetch_assoc()) {
      $data[] = array(
        "id" => $row['id'],
        "a" => '<div class="text-center" >' . $row['re_order'] . '</div>',
        "b" => '<div class="text-center">' . $row['soalan'] . '</div>',
        "c" => '<div class="text-center">' . $row['nama_kategori'] . '</div>',
        "d" => '
              <a class="btn btn-success" href="details.php?id=' . $row['id'] . '">
                  <svg class="icon">
                      <use xlink:href="icons.svg#icon-view"></use>
                  </svg>
              </a>
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

}


if (isset($_POST['addsoalan'])) {
  removepic($site_url . "assets/img/user/" . $_SESSION['user_details']['id'] / "/" . $_SESSION['user_details']['image_url']);
  uploadpic_id($_SESSION['user_details']['id'], $err);
}

function sendmail($receiver, $title, $message = "")
{





  $mail = new PHPMailer(true);

  try {

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'kaunselingadtectaiping.com.my';
    $mail->SMTPAuth = true;
    $mail->Username = 'temujanji@kaunselingadtectaiping.com.my';
    $mail->Password = 'temujanji@33';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;


    $mail->setFrom('temujanji@fingerprint.kaunselingadtectaiping.com.my', 'Temu Janji');
    $mail->addAddress($receiver);










    $mail->isHTML(true);

    $mail->Subject = $title;
    if (!$message) {


      $mail->Body = 'This is the HTML message body <b>in bold!</b>';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    } else {
      $mail->Body = $message;
      $mail->AltBody = $message;
    }
    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}


if (isset($_POST['test3'])) {

    // header('Content-Type: application/json');
    $ndp = $_POST['test3']['ndp'];
    // echo $ndp;

    $query =
      "SELECT a.*,b.ndp  FROM `user_psikologi`  a 
      INNER JOIN user b  ON  a.user_id = b.id
      
      WHERE ndp = '$ndp' ORDER BY a.id DESC LIMIT 1";

    $query2 =
      "SELECT a.*,b.ndp  FROM `user_psikologi`  a INNER JOIN user b  ON  a.user_id = b.id WHERE ndp = '$ndp' ORDER BY a.id ASC LIMIT 1";

    $query3 =
      "SELECT id,nama_kategori FROM `borang_psikologi_kategori`";


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
        $kategoriMap[$kategori['id']] = ucfirst($kategori['nama_kategori']);
    }
    
    // Map category names to the rows data
    foreach ($rows as &$row) {
        foreach ($row as &$item) {
            if (isset($kategoriMap[$item['kategori_id']])) {
                $item['kategori_name'] = $kategoriMap[$item['kategori_id']];
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

?>