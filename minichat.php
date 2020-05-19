<?php
session_start();

include("pdo.php");

$request = $PDO->query(
    "SELECT userName, messages "
        . "FROM chat "
        . "ORDER BY ID DESC "
        . "LIMIT 0, 10 "
);

$allLine = $request->fetchAll();
