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
      exit();

    } else {
      $errors['login'] = "User doesn't exist or wrong password";
    }
  }

}



if (isset($_POST['user_login_flutter'])) {
    $login = mysqli_real_escape_string($db, $_POST['login']);  // Login identifier (email or NDP)
    $password = mysqli_real_escape_string($db, $_POST['password']);  // Password
    $fcm_token = isset($_POST['fcm_token']) ? mysqli_real_escape_string($db, $_POST['fcm_token']) : null;

    // Validate input
    if (empty($login) || empty($password)) {
        $response = [
            'status' => 'error',
            'message' => 'Please provide both email/ndp and password.'
        ];
        echo json_encode($response);
        exit;
    }

    // Encrypt the password (you should ideally use password_hash in production)
    $password = md5($password);

    // Query to find the user
    $query = "SELECT * FROM user WHERE (ndp='$login' AND password='$password') OR (email='$login' AND password='$password')";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
        $user = mysqli_fetch_assoc($results);
        $userId = $user['id'];

        // Update FCM token if provided
        if ($fcm_token) {
            $updateTokenQuery = "UPDATE user SET fcm_token = '$fcm_token' WHERE id = '$userId'";
            mysqli_query($db, $updateTokenQuery);
        }

        $user['password'] = ""; // Clear password for response
        $_SESSION['user_details'] = $user;

        $response = [
            'status' => 'success',
            'message' => 'Login successful',
            'user' => $user
        ];
        echo json_encode($response);
        exit();
    } else {
        $response = [
            'status' => 'error',
            'message' => "User doesn't exist or wrong password"
        ];
        echo json_encode($response);
        exit();
    }
}
