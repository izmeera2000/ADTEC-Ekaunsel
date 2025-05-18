<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with AI</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .chat-box {
            margin-bottom: 20px;
        }

        .chat-box input,
        .chat-box button {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }

        .message {
            margin-bottom: 10px;
        }

        .message.user {
            color: blue;
        }

        .message.bot {
            color: green;
        }

        .user-list {
            margin-top: 20px;
        }

        .user-list div {
            padding: 8px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Chat with AI</h1>

    <div class="chat-box">
        <textarea id="userMessage" placeholder="Type your message here..." rows="4" style="width: 100%;"></textarea>
        <button id="sendMessageButton">Send Message</button>
    </div>

    <div id="chatHistory">
        <!-- Messages will appear here -->
    </div>

    <!-- User List Section -->
    <div class="user-list">
        <h3>Users Who Have Interacted:</h3>
        <div id="userList"></div>
    </div>

    <script>
        // Fetch previous chat history when the page loads
        window.onload = function () {
            fetchChatHistory();
            fetchChatList(); // Fetch the distinct users interacting with this user
        };

        // Function to fetch previous chat history from the server
        function fetchChatHistory() {
            fetch('get_chat', {
                method: 'POST',
                body: new URLSearchParams({
                    user_id: 1, // Hardcoded user_id for this example (change as needed)
                    get_chat_user: 'get_chat_user'
                })
            })
                .then(response => response.json())  // Parse the JSON response
                .then(data => {
                    console.log(data);  // Log the data received

                    // Check if there are any previous messages
                    if (data.messages) {
                        data.messages.forEach(message => {
                            const messageElement = document.createElement('div');
                            // Assuming message is an object with 'sender' and 'message' properties

                            messageElement.classList.add('message', message.sender === 'user' ? 'user' : 'bot');
                            messageElement.textContent = (message.sender === 'user' ? 'User: ' : 'Bot: ') + message.message;

                            document.getElementById('chatHistory').appendChild(messageElement);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error fetching chat history:', error);
                });
        }

        // Fetch the list of users who interacted with the current user (excluding bot)
        function fetchChatList() {
            fetch('get_chat_list', {
                method: 'POST',
                body: new URLSearchParams({
                    user_id: 18, // Hardcoded user_id for this example (change as needed)
                    get_chat_list: 'get_chat_list'
                })
            })
                .then(response => response.json())  // Parse the JSON response
                .then(data => {
                    console.log(data);  // Log the data received

                    // Check if there are any users in the list
                    if (data.users) {
                        const userListDiv = document.getElementById('userList');
                        userListDiv.innerHTML = ''; // Clear the list

                        data.users.forEach(user => {
                            const userElement = document.createElement('div');
                            userElement.textContent = 'User ID: ' + user.user_id + ', Message: ' + user.message;
                            userListDiv.appendChild(userElement);
                        });
                    }
                })
                .catch(error => {
                    console.error('Error fetching user list:', error);
                });
        }

        // Handle sending a new message
        document.getElementById('sendMessageButton').addEventListener('click', function () {
            const userMessage = document.getElementById('userMessage').value;

            if (userMessage.trim() === '') {
                console.log('Please enter a message!');
                return;
            }

            // Show user message in chat history
            const userMessageElement = document.createElement('div');
            userMessageElement.classList.add('message', 'user');
            userMessageElement.textContent = 'User: ' + userMessage;
            document.getElementById('chatHistory').appendChild(userMessageElement);

            // Send message to the server
            fetch('send_chat', {
                method: 'POST',
                body: new URLSearchParams({
                    user_id: 1, // Hardcoded user_id for this example (change as needed)
                    message: userMessage,
                    chat_send: "chat_send"
                })
            })
                .then(response => response.json())  // Parse the JSON response
                .then(data => {
                    console.log(data);  // Log the data received

                    // Check if there's a reply from the bot
                    if (data.reply) {
                        // Show bot reply in chat history
                        const botMessageElement = document.createElement('div');
                        botMessageElement.classList.add('message', 'bot');
                        botMessageElement.textContent = 'Bot: ' + data.reply;
                        document.getElementById('chatHistory').appendChild(botMessageElement);
                    } else if (data.error) {
                        console.log(data.error);  // Log any error returned by the server
                    }
                })
                .catch(error => {
                    console.error('Error:', error);  // Log errors that occur during fetch
                    console.log('There was an error processing your message.');
                });

            // Clear the input field
            document.getElementById('userMessage').value = '';
        });
    </script>
</body>

</html>
