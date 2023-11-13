<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Modifier la Transaction</title>
</head>

<body>
  <nav class="navbar">
    <div class="left">
      <a href="transactions.php" class="back-button">Retour</a>
    </div>
  </nav>
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

    $sql = "SELECT * FROM transactions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $transaction_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Modifier la Transaction</h2>";
        echo "<form action='update.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "Montant: <input type='text' name='amount' value='" . $row["amount"] . "'><br>";
        echo "<input type='submit' value='Enregistrer les modifications'>";
        echo "</form>";
    } else {
        echo "<p>Transaction non trouvée.</p>";
    }

    $stmt->close();
    $conn->close();
    ?>
</body>

</html>
