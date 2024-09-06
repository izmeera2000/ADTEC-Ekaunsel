<?php include(getcwd() . '/admin/server.php');

use Ddeboer\Imap\Server;

$username = 'temujanji@kaunselingadtectaiping.com.my';
$password = 'temujanji@33';
$server = new Server('mail.kaunselingadtectaiping.com.my');
$connection = $server->authenticate($username, $password);


$inbox = $connection->getMailbox('INBOX');

// Retrieve all messages in the inbox
$messages = $inbox->getMessages();

foreach ($messages as $message) {
    echo 'Subject: ' . $message->getSubject() . "\n" . "<br>";
    // echo 'From: ' . $message->getFrom()->getAddress() . "\n";
    // echo 'Date: ' . $message->getDate()->format('Y-m-d H:i:s') . "\n";
    // echo 'Body: ' . $message->getBodyText() . "\n\n"; // Get the body of the email
}
