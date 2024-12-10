<?php


if (isset($_POST['senaraigambar'])) {

    $data = array();
  
    $query =
      "SELECT * FROM user_dashboard";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
  
      while ($row = $results->fetch_assoc()) {
        $data[] = array(
          "id" => $row['id'],
          "a" => '<div class="text-center" >' . $row['_order'] . '</div>',
          "b" => '<div class="text-center">' . $row['filepath'] . '</div>',
          "d" => '
                <button class="btn btn-primary btn-delete-gambar"   type="button">
                                                      <i class="bi bi-file-diff"></i>
                </button>
            '
        );
      }
    }
  
    echo json_encode(array('data' => $data));
    die();
  
  }
  
  
  if (isset($_POST['deletegambar'])) {
  
    $id = $_POST['deletegambar']['id'];
  
    $query =
      "SELECT * FROM user_dashboard WHERE id='$id'";
  
    $results = mysqli_query($db, $query);
    while ($row = $results->fetch_assoc()) {
      $filepath = $row['filepath'];
    }
  
    $query =
      "DELETE FROM  user_dashboard  WHERE id ='$id' ";
    $results = mysqli_query($db, $query);
  
    removepic("assets/img/user_dashboard/" . $filepath);
  
    die();
  
  }
  
  if (isset($_POST['order2'])) {
  
    $order = $_POST['order2'];
  
    foreach ($order as $row) {
      $id = $row['id'];
      $re_order = $row['re_order'];
  
  
      $query = "UPDATE user_dashboard SET _order = '$re_order' WHERE id = '$id'";
      mysqli_query($db, $query);
  
    }
    die();
  
  }
  if (isset($_POST['add_gambar_submit'])) {
    $uploadOk = 1;
  
    if (!is_dir("./assets/img/user_dashboard/")) {
      mkdir("./assets/img/user_dashboard/", 0755, true);
    }
  
    $target_dir = "./assets/img/user_dashboard/";
  
    $target_file = $target_dir . basename($_FILES["gambar2"]["name"]);
  
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  
  
    if ($_FILES["gambar2"]["size"] > 500000) {
      $err['gambar2'] = "File too large";
      $uploadOk = 0;
  
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      $err['gambar2'] = "Sorry, only JPG, JPEG & PNG  files are allowed.";
      $uploadOk = 0;
  
    }
    if ($uploadOk == 1) {
  
      if (!move_uploaded_file($_FILES["gambar2"]["tmp_name"], $target_file)) {
        $err['gambar2'] = "Sorry, there was an error uploading your file.";
      } else {
  
  
        $query =
          "SELECT MAX(_order) as max FROM user_dashboard";
  
        $results = mysqli_query($db, $query);
        while ($gambar = mysqli_fetch_assoc($results)) {
  
          $max = $gambar['max'] + 1;
        }
        $nama = basename($_FILES["gambar2"]["name"]);
        $query =
          "INSERT INTO user_dashboard (filepath,_order) VALUES ('$nama','$max')";
        $results = mysqli_query($db, $query);
  
  
  
      }
    }
  
  
    header('location:' . $site_url . 'settings/user_dashboard');
    die();
  
  }
  
  