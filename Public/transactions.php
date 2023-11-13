<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Interface Bancaire</title>
</head>

<body>

    <nav class="transnavbar">
        <div class="left">
            <a href="#" class="home-button">Accueil</a>
        </div>
        <div class="right">
            <a href="logout.php" class="logout-button">Déconnexion</a>
        </div>
    </nav>

    <div class="transactions">
        <h2>Liste des transactions</h2>

        <?php
        
        require_once('config.php');

        session_start();

        if (isset($_SESSION['user_id'])) {
            header("Location: index.php");
            exit();
        }

        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        if ($conn->connect_error) {
            die("Échec de la connexion à la base de données: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM transactions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>Transaction " . $row["id"] . " - Montant: $" . $row["amount"];
                echo " <a href='details.php?id=" . $row["id"] . "'>Détails</a>";
                echo " <a href='edit.php?id=" . $row["id"] . "'>Modifier</a>";
                echo " <a href='delete.php?id=" . $row["id"] . "'>Supprimer</a>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Aucune transaction trouvée.</p>";
        }

        $conn->close();
        ?>
    
        <a href="create.php"><button type="button">Nouvelle transaction</button></a>
    </div>

</body>

</html>
