<?php
require_once('config.php');

session_start();

$fullname = $email = $password = "";
$fullnameErr = $emailErr = $passwordErr = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($fullnameErr) && empty($emailErr) && empty($passwordErr)) {
        $conn = new mysqli($servername, $username, $password_db, $dbname);

        if ($conn->connect_error) {
            die("Échec de la connexion à la base de données: " . $conn->connect_error);
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password) VALUES ('$fullname', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            $message = "Inscription réussie !";
            $_SESSION['user_id'] = $conn->insert_id;
            header("Location: index.php");
            exit();
        } else {
            $message = "Erreur d'inscription: " . $conn->error;
        }

        $conn->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Page d'Inscription</title>
</head>

<body class="connectbody">
    <div class="connectcontainer">
        <form class="signup-form" method="post" action="<?= PUBLIC_PATH ?>register.php">
            <h2>Inscription</h2>
            <label for="fullname">Nom complet:</label>
            <input type="text" id="fullname" name="fullname" required>
            <span class="error"><?php echo $fullnameErr; ?></span>

            <label for="email">Adresse e-mail:</label>
            <input type="email" id="email" name="email" required>
            <span class="error"><?php echo $emailErr; ?></span>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <span class="error"><?php echo $passwordErr; ?></span>

            <button type="submit" style="margin-top : 1%;">S'inscrire</button>
        </form>

        <!-- Afficher le message de succès ou d'erreur -->
        <p><?php echo $message; ?></p>

        <!-- Utilisation d'un lien pour rediriger vers la page de connexion -->
        <a href="<?= PUBLIC_PATH ?>login.php"><button type="button">Se connecter</button></a>
    </div>
</body>

</html>
