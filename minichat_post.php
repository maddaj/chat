<?php
session_start();

include("pdo.php");

//userName which equals ($_SESSION['userId'] = $pseudoFromForm) which equals ($pseudoFromForm = $_POST['userName']);
// $_SESSION['userId'] is stated in minichat_login.php
$userName = $_SESSION['userId'];
$messages = $_POST['messages'];

// Performs the query that inserts the message if the fields are filled in
if (!empty($userName) && !empty($messages)) {
    $prepareRequest = $PDO->prepare(
        "INSERT INTO chat( userName, messages) VALUES( :userName, :userMessage)"
    );

    $prepareRequest->execute(
        array(
            "userName" => $userName,
            "userMessage" => $messages
        )
    );
}

// Redirects to minichat.php with the header() method
header('Location: minichat.php');
