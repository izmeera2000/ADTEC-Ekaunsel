<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebSocket Client</title>
</head>
<body>
    <h2>WebSocket Chat</h2>
    <textarea id="chatLog" cols="100" rows="20" readonly></textarea><br>
    <input type="text" id="msgBox" placeholder="Enter message">
    <button onclick="sendMessage()">Send</button>

    <script>
        // Create WebSocket connection
        let ws = new WebSocket("ws://localhost:8080/chat");

        // When connection is open
        ws.onopen = function() {
            console.log("Connected to WebSocket server.");
        };

        // When a message is received
        ws.onmessage = function(event) {
            document.getElementById('chatLog').value += event.data + "\n";
        };

        // When there's an error
        ws.onerror = function(event) {
            console.log("WebSocket error: " + event);
        };

        // When the connection is closed
        ws.onclose = function(event) {
            console.log("WebSocket connection closed.");
        };

        // Send a message to the server
        function sendMessage() {
            let msg = document.getElementById('msgBox').value;
            ws.send(msg);
            document.getElementById('msgBox').value = ""; // Clear input after sending
        }
    </script>
</body>
</html>
