<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$transaction_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM transactions WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $transaction_id);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Détails de la Transaction</title>
</head>

<body>
    <nav class="navbar">
        <div class="left">
            <a href="transactions.php" class="back-button">Retour</a>
        </div>
    </nav>

    <?php
if ($stmt->execute()) {
  echo "<p>Transaction supprimée avec succès.</p>";
} else {
  echo "Erreur lors de la suppression de la transaction: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
    
</body>

</html>
