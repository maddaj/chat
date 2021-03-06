<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/button.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <?php
                foreach ($allLine as $oneLine) {
                    echo (htmlspecialchars($oneLine['userName']) . ' : ' . htmlspecialchars($oneLine['messages']) . '<br />');
                }
                $request->closeCursor();
                ?>
            </div>
            <div class="col-12 col-md-4">
                <?php
                // If the user is logged in
                if (isset($_SESSION['userId'])) {
                ?>
                    <form action="minichat_post.php" method="post">
                        <button type="submit" formaction="minichat_logout.php">Déconnexion</button>
                        <input class="chat-window-message" name="messages" type="text" autocomplete="off" autofocus placeholder="Aa" />
                        <button type="submit" value="Envoyer" class="button">Envoyer</button>
                    </form>
                <?php
                } else {
                ?>
                    <form action="minichat_login.php" method="post">
                        <input type="text" name="userName" id="pseudo" placeholder="Pseudo" /><br />
                        <input class="chat-window-message" name="mdp" type="password" autocomplete="off" autofocus placeholder="Password" />
                        <button type="submit" value="Envoyer" class="button">Connexion</button>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>