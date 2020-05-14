<?php
session_start();

include("pdo.php");

$pseudoFromForm = $_POST['userName'];
$pwdFromForm = $_POST['mdp'];

// Check if the nickname and pwd are filled in before making the request.
if (isset($pseudoFromForm) && isset($pwdFromForm)) {
    $PrepareRequest = $PDO->prepare(
        "SELECT * "
            . "FROM user "
            . "WHERE userName = :pseudo AND mdp = :pwd"
    );

    $PrepareRequest->execute(
        array(
            'pseudo' => $pseudoFromForm,
            'pwd' => $pwdFromForm
        ),
    );

    if (count($PrepareRequest->fetchAll()) == 1) {
        // Check that there is a user with the corresponding nickname and pwd.
        $_SESSION['userId'] = $pseudoFromForm;
    }
}

// Redirects to minichat.php with the header() method
header('Location: minichat.php');
