<?php

if (isset($_POST['user_register'])) {




    if (empty($_POST['ndp'])) {
      $errors['ndp'] = "NDP required";
    } else {
      $ndp = mysqli_real_escape_string($db, $_POST['ndp']);
  
    }
    if (empty($_POST['fullname'])) {
      $errors['fullname'] = "Nama Penuh required";
    } else {
      $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  
    }
    if (empty($_POST['sem'])) {
      $errors['sem'] = "Semester required";
    } else {
      $sem = mysqli_real_escape_string($db, $_POST['sem']);
  
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
  
      $user_check_query = "SELECT * FROM user WHERE ndp='$ndp' OR email='$email'  OR phone='$phone'     LIMIT 1";
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
  
        // if ($user['kp'] === $kp) {
        //   $errors['kp'] = "KP already registered";
  
        // }
      }
    }
    checkuploadpid("test", $errors);
  
  
  
    if (count($errors) == 0) {
  
  
  
  
  
      $password = md5($password1);
  
      $query = "INSERT INTO user (role, ndp,password, nama,email,phone,sem,jantina,agama,status_kahwin,bangsa) 
                            VALUES('$role','$ndp','$password','$fullname','$email','$phone','$sem','$jantina','$agama','$statuskahwin','$bangsa')";
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
  