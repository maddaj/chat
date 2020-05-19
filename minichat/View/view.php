<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($msg)) {
    ?>
        <p><b style="color:red;"><?= $msg ?></b></p>
    <?php
    }
    ?>
    <?php
    if (isset($_SESSION['userId'])) {
    ?>
        <a href="index.php?action=logout">Deconnexion</a>
        <form method="POST" action="index.php?action=post">
            <input type="text" name="message" placeholder="your message" />
            <button type="submit">Post</button>
        </form>
        <form method="GET" action="index.php">
            <input type="hidden" name="action" value="search" />
            <input type="text" name="search" placeholder="your search" />
            <button type="submit">Search</button>
        </form>
    <?php
    } else {
    ?>
        <form method="POST" action="index.php?action=login">
            <input type="text" name="pseudo" placeholder="your pseudo" />
            <input type="password" name="mdp" placeholder="your password" />
            <button type="submit">Login</button>
        </form>
    <?php
    }
    foreach ($rows as $row) {
        $pseudo = $row['pseudo'];
        $message = $row['message'];
        $id = $row['ID'];
        echo "<p><b>$pseudo</b>: $message  <a href='index.php?action=delete&idPostToDelete=$id'>DELETE</a></p>";
    }
    ?>
</body>

</html>