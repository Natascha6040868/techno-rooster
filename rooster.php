<?php
include 'class/Rooster.php';
include 'class/Toegangscode.php';

$rooster = new Rooster();
$toegangscode = new Toegangscode();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $result = $toegangscode->validateCode($code);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $rooster_id = $row['rooster_id'];
        
        $roosterData = $rooster->getById($rooster_id);
        echo "<h1>" . $roosterData['naam'] . "</h1>";
        echo "<p>" . $roosterData['inhoud'] . "</p>";
    } else {
        echo "Ongeldige toegangscode.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toegang Tot Rooster</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Toegang Tot Rooster</h1>
    <form method="post" action="">
        <label for="code">Toegangscode:</label>
        <input type="text" id="code" name="code" required>
        
        <button type="submit">Toegang Verlenen</button>
    </form>
</body>
</html>
