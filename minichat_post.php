<?php

include("pdo.php");

// Performs the query that inserts the message if the fields are filled in
$userName = $_REQUEST['userName'] ?? '';
$messages = $_REQUEST['messages'] ?? '';

if (!empty($userName) && !empty($messages)) {
    $prepareRequest = $PDO->prepare("INSERT INTO chat( userName, messages) VALUES( :userName, :userMessage)");
    $prepareRequest->execute(
        array(
            "userName" => $userName,
            "userMessage" => $messages
        )
    );
}

// Redirects to minichat.php with the header() method
header('Location: minichat.php');
