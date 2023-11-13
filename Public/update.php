<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Mise à jour de la Transaction</title>
</head>
<body>
    <nav class="navbar">
        <div class="left">
            <a href="transactions.php" class="back-button">Retour</a>
        </div>
    </nav>

    <div class="update-message">
        <h2>Mise à jour de la Transaction</h2>

        <?php
        $transaction_id = $_POST['id'];

        echo "<p>La transaction numero " . $transaction_id . " a été mise à jour avec succès.</p>";
        ?>
    </div>
</body>
</html>
