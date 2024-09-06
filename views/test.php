<?php include(getcwd() . '/admin/server.php');

use Ddeboer\Imap\Server;

$username = 'temujanji@kaunselingadtectaiping.com.my';
$password = 'temujanji@33';
$server = new Server('mail.kaunselingadtectaiping.com.my
');
$connection = $server->authenticate($username, $password);


$mailboxes = $connection->getMailboxes();
foreach ($mailboxes as $mailbox) {
    // Skip container-only mailboxes (we can't open this mailboxes)
    if ($mailbox->getAttributes() & \LATT_NOSELECT) {
        continue;
    }
    printf("Mailbox '%s' has %s messages\n", $mailbox->getName(), $mailbox->count());
}