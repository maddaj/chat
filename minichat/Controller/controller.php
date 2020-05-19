<?php

include "../model/msg.php";
include "../model/user.php";

$action = $_GET['action'] ?? 'display';

switch ($action) {
    case 'login':
        $pseudoFromForm = $_POST['pseudo'];
        $mdpFromForm = $_POST['mdp'];
        $userExists = checkNicknameAndPassword($pseudoFromForm, $mdpFromForm);
        if ($userExists) {
            $_SESSION['userId'] = $pseudoFromForm;
        }
        $rows = getLastMessages();
        include "../view/view.php";
        break;
    case 'logout':
        session_destroy();
        $rows = getLastMessages();
        $msg = "Vous avez été déloggé";
        include "../view/view.php";
        break;
    case 'post':
        if (isset($_SESSION['userId'])) {
            $pseudo = $_SESSION['userId'];
            $message = $_POST['message'];
            $msg = "Nouveau message";
            insertNewMessage($pseudo, $message);
            $rows = getLastMessages();
            include "../view/view.php";
        }
        break;
    case 'display':
        $rows = getLastMessages();
        include "../view/view.php";
        break;
    case 'search':
        $search = $_GET['search'];
        $msg = "Resultat de la recherche";
        $rows = searchIntoMessages($search);
        include "../view/view.php";
        break;
    case 'delete':
        $idPostToDelete = $_GET['idPostToDelete'];
        deleteMessage($idPostToDelete);
        $msg = "Bien supprimé";
        $rows = getLastMessages();
        include "../view/view.php";
        break;
    default:
        include "../view/error.php";
        break;
}
