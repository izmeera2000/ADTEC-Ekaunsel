<?php


if (isset($_POST['user_login'])) {
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
  
  
  
  
  
  
  
  
    if (count($errors) == 0) {
  
  
  
  
  
  
      $password = md5($password);
  
  
      $query = "SELECT * FROM user WHERE (ndp='$login' AND password='$password' )  OR  (email='$login'AND password='$password' ) ";
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