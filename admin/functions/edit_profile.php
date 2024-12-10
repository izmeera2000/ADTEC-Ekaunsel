<?php


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