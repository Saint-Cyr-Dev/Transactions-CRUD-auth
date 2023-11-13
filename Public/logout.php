<?php
session_start();

session_destroy();

header("Location: index.php");
exit();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Déconnexion</title>
</head>

<body>
    <div class="logout-message">
        <h2>Déconnexion</h2>
        <form action="logout.php" method="post">
            <button type="submit">Se déconnecter</button>
        </form>
    </div>
</body>

</html>
