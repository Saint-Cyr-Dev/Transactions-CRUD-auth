<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$transaction_id = $_GET['id'];

$sql_select = "SELECT * FROM transactions WHERE id = ?";
$stmt_select = $conn->prepare($sql_select);
$stmt_select->bind_param("i", $transaction_id);
$stmt_select->execute();
$result_select = $stmt_select->get_result();


$stmt_select->close();
$conn->close();
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
if ($result_select->num_rows > 0) {
  $row = $result_select->fetch_assoc();

  echo "<h2>Détails de la Transaction</h2>";
  echo "<p>Numéro de transaction: " . $row["id"] . "</p>";
  echo "<p>Date: " . $row["created_at"] . "</p>";
  echo "<p>Montant: $" . $row["amount"] . "</p>";
  echo "<p>Type: " . $row["label"] . "</p>";
} else {
  echo "<p>Transaction non trouvée.</p>";
} ?>
</body>

</html>
