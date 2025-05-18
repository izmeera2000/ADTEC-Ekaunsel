<?php


if (isset($_POST['chat_send'])) {
    header('Content-Type: application/json');




    $user_id = $_POST['user_id'];
    $message = $_POST['message'];

    // 1. Store user message without using prepared statement
    $sql = "INSERT INTO chat (user_id, sender, message) VALUES ($user_id, 'user', '$message')";
    if ($db->query($sql) === TRUE) {
        // Proceed to the next step if the query was successful
    } else {
        echo json_encode(["error" => "Error: " . $conn->error]);
        exit;
    }

    $apiKey = $_ENV['aikey'];

    if (!$apiKey) {
        die(json_encode(["error" => "API Key is missing!"]));
    }

    $message = $_POST['message']; // Ensure you capture the message from user input

    // 2. Set up the data to send to OpenAI API
    $data = [
        "model" => "gpt-3.5-turbo",
        "messages" => [
            ["role" => "system", "content" => "You are a kind and supportive AI counselor. Help the user talk through their thoughts and feelings. also able to talk in malay as most users are from malaysia"],
            ["role" => "user", "content" => $message]
        ]
    ];

    // 3. Initialize cURL and set options
    $ch = curl_init('https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $apiKey",
        "Content-Type: application/json"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // 4. Execute the request
    $response = curl_exec($ch);

    // 5. Check if there was an error in the cURL request
    if ($response === false) {
        die(json_encode(["error" => "cURL Error: " . curl_error($ch)]));
    }

    // 6. Close the cURL session
    curl_close($ch);

    // 7. Decode the JSON response
    $responseData = json_decode($response, true);

    // 8. Check if the response has the required 'choices' and 'message' fields
    if (isset($responseData['choices'][0]['message']['content'])) {
        $reply = $responseData['choices'][0]['message']['content'];
        // echo json_encode(["reply" => $reply]);
    } else {
        // Handle the case where the API response doesn't contain a valid reply
        echo json_encode(["error" => "Error: Invalid response from OpenAI API."]);
    }
    $reply2 = mysqli_real_escape_string($db, $reply);

    // 3. Store bot reply without using prepared statement
    $sql2 = "INSERT INTO chat (user_id, sender, message) VALUES ($user_id, 'bot', '$reply2')";
    if ($db->query($sql2) === TRUE) {
        // Proceed if the bot's reply is successfully inserted
    } else {
        echo json_encode(["error" => "Error: " . $db->error]);
        exit;
    }

    // 4. Return response
    echo json_encode(["reply" => $reply]);
    die();




}

if (isset($_POST['chat_send_admin'])) {
    header('Content-Type: application/json');




    $user_id = $_POST['user_id'];
    $message = $_POST['message'];

    // 1. Store user message without using prepared statement
    $sql = "INSERT INTO chat (user_id, sender, message) VALUES ($user_id, 'admin', '$message')";
    if ($db->query($sql) === TRUE) {
        // Proceed to the next step if the query was successful
    } else {
        echo json_encode(["error" => "Error: " . $conn->error]);
        exit;
    }
 
 
    die();




}


// Assuming $db is your MySQL connection

if (isset($_POST['get_chat_user'])) {
    header('Content-Type: application/json');

    // Get user inputs from POST
    $user_id = $_POST['user_id'];
  
   
    // 4. Fetch the last 10 messages (user + bot)
    $sql_fetch = "SELECT user_id, sender, message  FROM chat WHERE user_id = $user_id ORDER BY created_at DESC LIMIT 10";
    $result = $db->query($sql_fetch);

    if ($result === FALSE) {
        echo json_encode(["error" => "Error fetching previous messages: " . $db->error]);
        exit;
    }

    // Prepare messages to send back
    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = [
            'sender' => $row['sender'],
            'message' => $row['message']
        ];
    }

    // Return the bot's reply and the 10 previous messages
    echo json_encode([
         "messages" => array_reverse($messages)  // Reverse to get the oldest messages first
    ]);
    die();
}



if (isset($_POST['get_chat_list'])) {
    header('Content-Type: application/json');

    // Fetch distinct users and their latest messages, joining with the user table to get additional details
    $sql_fetch = "
        SELECT 
            c.user_id, 
            c.sender, 
            c.message, 
            u.image_url, 
            u.ndp, 
            u.nama, 
            u.email
        FROM chat c
        INNER JOIN user u ON c.user_id = u.id  -- Join the user table with the chat table
        WHERE c.sender != 'bot'
        GROUP BY c.user_id
        ORDER BY MAX(c.created_at) DESC
    ";

    $result = $db->query($sql_fetch);

    if ($result === FALSE) {
        echo json_encode(["error" => "Error fetching previous messages: " . $db->error]);
        exit;
    }

    // Prepare users to send back
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = [
            'user_id' => $row['user_id'],
            'sender' => $row['sender'],
            'message' => $row['message'],
            'image_url' => $row['image_url'],
            'ndp' => $row['ndp'],
            'nama' => $row['nama'],
            'email' => $row['email']
        ];
    }

    // Return the list of distinct users who interacted with the system (excluding bot)
    echo json_encode([
        "users" => array_reverse($users)  // Reverse to get the oldest messages first
    ]);
    die();
}
