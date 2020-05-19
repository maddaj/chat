<?php
session_start();

include("db.php");

$response = $PDO->query("select * from msg order by ID desc limit 10");
$rows = $response->fetchAll();

$isLogged = isset($_SESSION['userId']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if ($isLogged) {
    ?>
        <a href="minichat_logout.php">Deconnexion</a>
        <form method="POST" action="minichat_post.php">
            <input type="text" name="message" placeholder="your message" />
            <button type="submit">Post</button>
        </form>
    <?php
    } else {
    ?>
        <form method="POST" action="minichat_login.php">
            <input type="text" name="pseudo" placeholder="your pseudo" />
            <input type="password" name="mdp" placeholder="your password" />
            <button type="submit">Login</button>
        </form>
    <?php
    }
    foreach ($rows as $row) {
        $pseudo = $row['pseudo'];
        $message = $row['message'];
        echo "<p><b>$pseudo</b>: $message</p>";
    }
    ?>
</body>

</html>