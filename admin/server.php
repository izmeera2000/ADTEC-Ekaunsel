<?php
require __DIR__ . '/../route.php';




$pagetitle = "";




$site_url = $_ENV['site1'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Google\Auth\Credentials\ServiceAccountCredentials;
use GuzzleHttp\Client;

$errors = array();
$toast = array();


$db = mysqli_connect($_ENV['host'], $_ENV['user'], $_ENV['pass'], $_ENV['database1']);

date_default_timezone_set(timezoneId: 'Asia/Kuala_Lumpur');


require 'admin/functions/register.php';
require 'admin/functions/login.php';
require 'admin/functions/edit_profile.php';
require 'admin/functions/booking.php';
require 'admin/functions/booking_student.php';
require 'admin/functions/senarai_booking.php';
require 'admin/functions/user_dashboard.php';
require 'admin/functions/laporan.php';
require 'admin/functions/borang.php';
require 'admin/functions/chat.php';


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

//cronserver
// /usr/bin/curl -X POST -H "Content-Type: application/json" -d '{"key1":"value1"}' https://example.com/api/endpoint





function sendFcmNotificationTopic(string $topic, string $title, string $body, string $siteName = 'site1')
{
  try {
    $sitePrefix = $siteName;
    $serviceAccountData = [
      "type" => $_ENV["{$sitePrefix}_type"],
      "project_id" => $_ENV["{$sitePrefix}_project_id"],
      "private_key_id" => $_ENV["{$sitePrefix}_private_key_id"],
      "private_key" => str_replace('\\n', "\n", $_ENV["{$sitePrefix}_private_key"]),
      "client_email" => $_ENV["{$sitePrefix}_client_email"],
      "client_id" => $_ENV["{$sitePrefix}_client_id"],
      "auth_uri" => $_ENV["{$sitePrefix}_auth_uri"],
      "token_uri" => $_ENV["{$sitePrefix}_token_uri"],
      "auth_provider_x509_cert_url" => $_ENV["{$sitePrefix}_auth_provider_x509_cert_url"],
      "client_x509_cert_url" => $_ENV["{$sitePrefix}_client_x509_cert_url"]
    ];

    $scopes = ['https://www.googleapis.com/auth/cloud-platform'];
    $credentials = new ServiceAccountCredentials($scopes, $serviceAccountData);
    $authToken = $credentials->fetchAuthToken();

    if (!isset($authToken['access_token'])) {
      throw new Exception("Failed to retrieve access token.");
    }

    $accessToken = $authToken['access_token'];
    $projectId = $serviceAccountData['project_id'];
    $url = "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send";

    $message = [
      "message" => [
        "topic" => $topic,
        "notification" => [
          "title" => $title,
          "body" => $body
        ]
      ]
    ];

    $client = new Client();
    $response = $client->post($url, [
      'headers' => [
        'Authorization' => "Bearer {$accessToken}",
        'Content-Type' => 'application/json',
      ],
      'json' => $message
    ]);

    return [
      'status' => $response->getStatusCode(),
      'response' => json_decode($response->getBody(), true),
    ];

  } catch (\GuzzleHttp\Exception\RequestException $e) {
    // Handle network or API errors from Guzzle
    return [
      'status' => 500,
      'error' => 'HTTP request failed',
      'message' => $e->getMessage(),
      'response' => $e->hasResponse() ? (string) $e->getResponse()->getBody() : null,
    ];
  } catch (\Exception $e) {
    // Handle other PHP errors
    return [
      'status' => 500,
      'error' => 'Unexpected error',
      'message' => $e->getMessage()
    ];
  }
}




function sendFcmNotificationDevice(string $deviceToken, string $title, string $body, string $siteName = 'site1', ?string $route = null)
{
  try {

    $sitePrefix = $siteName;
    $serviceAccountData = [
      "type" => $_ENV["{$sitePrefix}_type"],
      "project_id" => $_ENV["{$sitePrefix}_project_id"],
      "private_key_id" => $_ENV["{$sitePrefix}_private_key_id"],
      "private_key" => str_replace('\\n', "\n", $_ENV["{$sitePrefix}_private_key"]),
      "client_email" => $_ENV["{$sitePrefix}_client_email"],
      "client_id" => $_ENV["{$sitePrefix}_client_id"],
      "auth_uri" => $_ENV["{$sitePrefix}_auth_uri"],
      "token_uri" => $_ENV["{$sitePrefix}_token_uri"],
      "auth_provider_x509_cert_url" => $_ENV["{$sitePrefix}_auth_provider_x509_cert_url"],
      "client_x509_cert_url" => $_ENV["{$sitePrefix}_client_x509_cert_url"]
    ];

    $scopes = ['https://www.googleapis.com/auth/cloud-platform'];
    $credentials = new ServiceAccountCredentials($scopes, $serviceAccountData);
    $authToken = $credentials->fetchAuthToken();

    if (!isset($authToken['access_token'])) {
      throw new Exception("Failed to retrieve access token.");
    }

    $accessToken = $authToken['access_token'];
    $projectId = $serviceAccountData['project_id'];
    $url = "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send";


    $message = [
      "message" => [
        "token" => $deviceToken,
        "notification" => [
          "title" => $title,
          "body" => $body
        ],
        "data" => [
          "route" => $route ?? '' // pass the route or fallback to /home
        ]
      ]
    ];

    $client = new Client();
    $response = $client->post($url, [
      'headers' => [
        'Authorization' => "Bearer {$accessToken}",
        'Content-Type' => 'application/json',
      ],
      'json' => $message
    ]);

    return [
      'status' => $response->getStatusCode(),
      'response' => json_decode($response->getBody(), true),
    ];

  } catch (\GuzzleHttp\Exception\RequestException $e) {
    // Handle network or API errors from Guzzle
    return [
      'status' => 500,
      'error' => 'HTTP request failed',
      'message' => $e->getMessage(),
      'response' => $e->hasResponse() ? (string) $e->getResponse()->getBody() : null,
    ];
  } catch (\Exception $e) {
    // Handle other PHP errors
    return [
      'status' => 500,
      'error' => 'Unexpected error',
      'message' => $e->getMessage()
    ];
  }
}

