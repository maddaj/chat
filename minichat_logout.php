<?php
session_start();

// Destroys session (userId(nickname & pwd))
session_destroy();

// Redirects to minichat.php with the header() method
header('Location: minichat.php');
