<?php

function getLastMessages()
{
    global $PDO;
    $response = $PDO->query("select * from msg order by ID desc limit 10");
    return $response->fetchAll();
}

function searchIntoMessages($search)
{
    global $PDO;
    $response = $PDO->query("select * from msg where message like '%$search%'");
    return $response->fetchAll();
}

function deleteMessage($postId)
{
    global $PDO;
    $PDO->exec("delete from msg where ID = $postId");
}

function insertNewMessage($pseudo, $message)
{
    global $PDO;
    if (!empty($pseudo) && !empty($message)) {
        $preparedRequest = $PDO->prepare("INSERT INTO msg(pseudo, message) values (:pseudo, :message)");
        $preparedRequest->execute(
            array(
                "pseudo" => $pseudo,
                "message" => $message
            )
        );
    }
}
