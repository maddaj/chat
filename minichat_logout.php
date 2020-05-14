<?php
session_start();

include("pdo.php");

// Destroys session variables (nickname & pwd)
session_unset();

// Redirects to minichat.php with the header() method
header('Location: minichat.php');
