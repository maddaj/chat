<?php
session_start();

$pseudoFromForm = $_POST['pseudo'];
$mdpFromForm = $_POST['mdp'];

include("db.php");

$preparedRequest = $PDO->prepare("select * from user where pseudo=:nickname and mdp=:password");
$preparedRequest->execute(
    array(
        "nickname" => $pseudoFromForm,
        "password" => $mdpFromForm
    )
);

$users = $preparedRequest->fetchAll();
if (count($users) == 1) {
    // good login/pwd => authentification good
    $_SESSION['userId'] = $pseudoFromForm;
}

header("location: minichat.php");
