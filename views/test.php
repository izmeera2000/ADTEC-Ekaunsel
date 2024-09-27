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
$client->setRedirectUri('http://localhost/ADTEC-EKaunsel/testemail2');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

if (!isset($_GET['code'])) {
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
} else {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    header('Location: ' . filter_var('http://localhost/ADTEC-EKaunsel/login', FILTER_SANITIZE_URL));
}