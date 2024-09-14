<?php   

require __DIR__ . '/../route.php';


use Ratchet\App;

class Chat implements \Ratchet\MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(\Ratchet\ConnectionInterface $conn) {
        // Store the new connection
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }
    public function onMessage(\Ratchet\ConnectionInterface $from, $msg) {
        echo "Message received from connection {$from->resourceId}: $msg\n";
    
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                echo "Sending message to client {$client->resourceId}\n";
                $client->send($msg);
            }
        }
    
        // Optionally send confirmation back to the sender
        $from->send("You sent: " . $msg);
    }
    

    public function onClose(\Ratchet\ConnectionInterface $conn) {
        // Detach the connection on close
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(\Ratchet\ConnectionInterface $conn, \Exception $e) {
        echo "An error occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}
// Create a new WebSocket App
$app = new App('localhost', 8080); // Create server on localhost:8080

// Define a route (e.g., /chat) and the class that handles it
$app->route('/chat', new Chat, ['*']);

// Run the server
$app->run();



?>