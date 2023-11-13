<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $date = $_POST["date"];
    $amount = $_POST["amount"];
    $type = $_POST["type"];

    $errors = array();

    if (!is_numeric($user_id) || intval($user_id) <= 0) {
        $errors[] = "Le numéro de transaction doit être un entier positif.";
    }

    if (!strtotime($date)) {
        $errors[] = "La date n'est pas dans un format valide.";
    }

    if (!is_numeric($amount) || floatval($amount) <= 0) {
        $errors[] = "Le montant doit être un nombre positif.";
    }

    $valid_types = array("payment", "deposit");  
    if (!in_array($type, $valid_types)) {
        $errors[] = "Le type de transaction n'est pas valide.";
    }

    if (!empty($errors)) {
        $message = "Erreurs dans le formulaire :<br>" . implode("<br>", $errors);
    } else {
        $query = "INSERT INTO transactions (user_id, label, amount, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iss", $user_id, $type, $amount);
        
*        if ($stmt->execute()) {
            $message = "Transaction créée avec succès.";
        } else {
            $message = "Erreur lors de la création de la transaction : " . $conn->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Création de Transaction</title>
</head>

<body>
    <nav class="navbar">
        <div class="left">
            <a href="transactions.php" class="back-button">Retour</a>
        </div>
    </nav>

    <div class="transaction-form">
        <h2>Création de Transaction</h2>
        <?php echo "<p>{$message}</p>"; ?> 
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" style="margin-top:1%">
            <label for="user_id">Numéro de transaction:</label>
            <input type="text" id="user_id" name="user_id" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="amount">Montant:</label>
            <input type="text" id="amount" name="amount" required>

            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="payment">Paiement</option>
                <option value="deposit">Dépôt</option>
            </select>

            <button type="submit">Créer Transaction</button>
        </form>
    </div>
</body>

</html>
