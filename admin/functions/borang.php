<?php

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
                                                      <i class="bi bi-file-diff"></i>
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
if (isset($_POST['deletesoalan'])) {

    $id = $_POST['deletesoalan']['id'];
    $soalan = $_POST['deletesoalan']['soalan'];
    $kategori = $_POST['deletesoalan']['kategori'];

    $query =
        "DELETE FROM  borang_psikologi  WHERE id ='$id' ";
    $results = mysqli_query($db, $query);
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