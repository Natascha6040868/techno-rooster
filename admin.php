<?php
include 'class/Rooster.php';
include 'Toegangscode.php';

$rooster = new Rooster();
$toegangscode = new Toegangscode();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_code'])) {
    $code = $_POST['code'];
    $rooster_id = $_POST['rooster_id'];

    if ($toegangscode->addCode($code, $rooster_id)) {
        echo "Nieuwe code toegevoegd!";
    } else {
        echo "Fout bij het toevoegen van de code.";
    }
}

$roosters = $rooster->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Pagina</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Admin Pagina</h1>
    <form method="post" action="">
        <label for="code">Toegangscode:</label>
        <input type="text" id="code" name="code" required>
        
        <label for="rooster">Rooster:</label>
        <select id="rooster" name="rooster_id" required>
            <?php while ($row = $roosters->fetch_assoc()) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['naam']; ?></option>
            <?php } ?>
        </select>
        
        <button type="submit" name="submit_code">Code Toevoegen</button>
    </form>
</body>
</html>
