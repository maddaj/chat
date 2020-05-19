<?php

function checkNicknameAndPassword($login, $password)
{
    global $PDO;
    $preparedRequest = $PDO->prepare("select * from user where pseudo=:nickname and mdp=:password");
    $preparedRequest->execute(
        array(
            "nickname" => $login,
            "password" => $password
        )
    );
    $users = $preparedRequest->fetchAll();
    return count($users) == 1;
}
