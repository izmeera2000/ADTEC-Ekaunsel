<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebSocket Reconnect Example</title>
</head>
<body>
    <h2>WebSocket Client with Reconnect</h2>
    <textarea id="chatLog" cols="100" rows="20" readonly></textarea><br>
    <input type="text" id="msgBox" placeholder="Enter message">
    <button onclick="sendMessage()">Send</button>

    <script>
        let ws;
<<<<<<< HEAD
        const serverUrl = "wss://kaunselingadtectaiping.com.my/chat"; // Replace with your WebSocket server URL
=======
        const serverUrl = "ws://kaunselingadtectaiping.com.my/chat:8080"; // Replace with your WebSocket server URL
>>>>>>> 38e2c0bde871c755827890dbedfdecd5197dd38f
        const reconnectInterval = 5000; // Time to wait before attempting reconnection (in milliseconds)

        function connectWebSocket() {
            ws = new WebSocket(serverUrl);

            ws.onopen = function() {
                console.log("Connected to WebSocket server.");
                document.getElementById('chatLog').value += "Connected to WebSocket server.\n";
            };

            ws.onmessage = function(event) {
                document.getElementById('chatLog').value += event.data + "\n";
            };

            ws.onerror = function(event) {
                console.error("WebSocket error: ", event);
            };

            ws.onclose = function(event) {
                console.log("WebSocket connection closed. Reconnecting...");
                document.getElementById('chatLog').value += "WebSocket connection closed. Reconnecting...\n";
                setTimeout(connectWebSocket, reconnectInterval);
            };
        }

        function sendMessage() {
            const msg = document.getElementById('msgBox').value;
            if (ws && ws.readyState === WebSocket.OPEN) {
                ws.send(msg);
                document.getElementById('msgBox').value = ""; // Clear input after sending
            } else {
                console.log("WebSocket is not connected. Unable to send message.");
            }
        }

        // Initial connection
        connectWebSocket();
    </script>
</body>
</html>
