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




if (isset($_POST['user_login_flutter'])) {  // Check if the login request is from Flutter
  $login = mysqli_real_escape_string($db, $_POST['login']);  // Login identifier (email or NDP)
  $password = mysqli_real_escape_string($db, $_POST['password']);  // Password

  // Validate input
  if (empty($login) || empty($password)) {
      $response = [
          'status' => 'error',
          'message' => 'Please provide both email/ndp and password.'
      ];
      echo json_encode($response);
      exit;
  }

  // Encrypt the password (md5 or consider using more secure methods like bcrypt)
  $password = md5($password);

  // Query to find the user based on email/ndp and password
  $query = "SELECT * FROM user WHERE (ndp='$login' AND password='$password') OR (email='$login' AND password='$password')";
  $results = mysqli_query($db, $query);

  // Check if user exists
  if (mysqli_num_rows($results) == 1) {
      // Fetch user data
      $user = mysqli_fetch_assoc($results);
      
      // Remove password from the response
      $user['password'] = "";

      // Store user details in session (for regular PHP users)
      $_SESSION['user_details'] = $user;

 

      // Send success response to Flutter
      $response = [
          'status' => 'success',
          'message' => 'Login successful',
          'user' => $user
      ];
      echo json_encode($response);
      exit();

  } else {
      // Invalid login credentials
      $response = [
          'status' => 'error',
          'message' => "User doesn't exist or wrong password"
      ];
      echo json_encode($response);
      exit();
  }
} 