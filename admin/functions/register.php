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
  
  
      echo json_encode(['status' => 'success', 'message' => 'Registration successful!', 'user_details' => $user]);
      header('location:' . $site_url . 'dashboard');
    }
  }
  

if (isset($_POST['user_register_flutter'])) {

 
    $errors = [];

    // Validate and sanitize fields
    $fields = ['ndp', 'fullname', 'sem', 'jantina', 'agama', 'statuskahwin', 'bangsa', 'email', 'phone', 'password1', 'password2'];
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = "$field required";
        } else {
            $$field = mysqli_real_escape_string($db, $_POST[$field]);
        }
    }

    $role = 2;

    // Password check
    if (!isset($errors['password1']) && !isset($errors['password2']) && $password1 !== $password2) {
        $errors['password1'] = "Passwords don't match";
        $errors['password2'] = "Passwords don't match";
    }

    // Check uniqueness
    if (!isset($errors['ndp']) && !isset($errors['email']) && !isset($errors['phone'])) {
        $check = mysqli_query($db, "SELECT * FROM user WHERE ndp='$ndp' OR email='$email' OR phone='$phone' LIMIT 1");
        $existingUser = mysqli_fetch_assoc($check);

        if ($existingUser) {
            if ($existingUser['ndp'] === $ndp) $errors['ndp'] = "NDP already registered";
            if ($existingUser['email'] === $email) $errors['email'] = "Email already registered";
            if ($existingUser['phone'] === $phone) $errors['phone'] = "Phone already registered";
        }
    }

    if (count($errors) > 0) {
        echo json_encode(['status' => 'error', 'errors' => $errors]);
        exit;
    }

    // Encrypt password and insert user
    $password = md5($password1);
    $insert = "INSERT INTO user (role, ndp, password, nama, email, phone, sem, jantina, agama, status_kahwin, bangsa) 
               VALUES ('$role', '$ndp', '$password', '$fullname', '$email', '$phone', '$sem', '$jantina', '$agama', '$statuskahwin', '$bangsa')";
    mysqli_query($db, $insert);

    // Get inserted user
    $result = mysqli_query($db, "SELECT * FROM user WHERE email='$email' AND password='$password'");
    $user = mysqli_fetch_assoc($result);

    // === Upload Image ===
    $image_url = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $img_name = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $new_name = 'user_' . $user['id'] . '.' . $img_ext;
        $upload_dir = 'assets/img/user/';

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($img_tmp, $upload_dir . $new_name)) {
            $image_url =$new_name;
            mysqli_query($db, "UPDATE user SET image_url='$image_url' WHERE id='{$user['id']}'");
        }
    }

    // Final fetch & response
    $user['image_url'] = $image_url;
    $user['password'] = "";

    $_SESSION['user_details'] = $user;

    echo json_encode([
        'status' => 'success',
        'message' => 'Registration successful!',
        'user_details' => $user
    ]);
    die();
}