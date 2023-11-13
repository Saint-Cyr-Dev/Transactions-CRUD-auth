<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Ma Navigation</title>
</head>

<body>
    <nav class="navbar">
        <div class="left">
            <a href="index.php" class="home-button">Page d'accueil</a>
        </div>
        <div class="right">
            <?php
            session_start();

            if (isset($_SESSION['user_id'])) {
                echo '<a href="transactions.php" class="login-button">Transactions</a>';
                echo '<a href="logout.php" class="logout-button">Déconnexion</a>';
            } else {
                echo '<a href="login.php" class="login-button">Connexion</a>';
                echo '<a href="register.php" class="signup-button">Inscription</a>';
            }
            ?>
        </div>
    </nav>

    <div class="hero">
        <h1>Bienvenue</h1>
    </div>
</body>

</html>
