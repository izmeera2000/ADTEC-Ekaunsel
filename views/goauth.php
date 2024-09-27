<?php include(getcwd() . '/admin/server.php');

// use Ddeboer\Imap\Server;


// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// try {
//     // Connecting to IMAP server with SSL
// $server = new Server('mail.kaunselingadtectaiping.com.my', 993, '/ssl/novalidate-cert');
    
//     // Authenticate
//     $username = 'temujanji@kaunselingadtectaiping.com.my';
//     $password = 'temujanji@33';
//     $connection = $server->authenticate($username, $password);
    
//     // Get INBOX mailbox
//     $inbox = $connection->getMailbox('INBOX');
    
//     // Retrieve messages sorted by date (descending)
//     $messages = $inbox->getMessages(null, \SORTDATE, true);
    
//     // Output message subjects
//     foreach ($messages as $message) {
//         echo 'Subject: ' . $message->getSubject() . "<br>";
//     }
// } catch (\Throwable $e) {
//     echo 'Error: ' . $e->getMessage();
// }
// $data['message'] = 'Hello from localhost!';
// $response = $pusher->trigger('my-channel', 'test-event', $data);

// echo "Response: ";
// print_r($response);

$client = new Google_Client();
$client->setAuthConfig('../client_secret.json');
$client->addScope(Google_Service_Calendar::CALENDAR);

$client->setRedirectUri( $site_url .'goauth');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

if (!isset($_GET['code'])) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
} else {
    $client->authenticate($_GET['code']);
    $accessToken = $client->getAccessToken();   

    // Store access token and refresh token in a persistent database
    saveTokensToDatabase($accessToken['access_token'], $accessToken['refresh_token'], $accessToken['expires_in'],$_SESSION['user_details']['id'],$db);
    if ($_SESSION['user_details']['role'] == 1) {
        $_SESSION['user_details']['access_token'] = getAccessTokenFromDatabase($_SESSION['user_details']['id'], $db);
        // $accessToken = getAccessTokenFromDatabase($_SESSION['user_details']['id'], $db);


      }
    header('Location: ' . filter_var($site_url .'/user/profile', FILTER_SANITIZE_URL));
}