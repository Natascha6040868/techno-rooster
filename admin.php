<?php
include 'Database/db_connection.php'; // Include the external database connection
include 'class/Rooster.php';
include 'class/Toegangscode.php';

// Pass the database connection to the Rooster and Toegangscode classes
$rooster = new Rooster($conn);
$toegangscode = new Toegangscode($conn);

$categories = [
    "Slimme Techniek" => "techniek.php",
    "Zorg & gezond leven" => "zorg.php",
    "Onderwijs & bewegen" => "onderwijs_bewegen.php",
    "Circulair & duurzaam ondernemen" => "circulair_duurzaam_ondernemen.php"
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_code'])) {
    $code = $_POST['code'];
    $category = $_POST['category'];

    if ($toegangscode->addCategoryCode($code, $category)) {
        echo "Nieuwe code toegevoegd!";
    } else {
        echo "Fout bij het toevoegen van de code.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Pagina</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f0f0f0;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    color: #333;
}

h1 {
    color: #2c3e50; /* Dark blue for headings */
    margin-bottom: 20px;
}

h2 {
    color: #2c3e50;
    margin-top: 40px;
}

h3 {
    color: #8e44ad; /* Purple for subheadings */
}

/* Form Styles */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
    border-top: 5px solid #8e44ad; /* Purple border */
    margin-bottom: 30px;
}

label {
    font-size: 1.1em;
    color: #2c3e50;
    margin-bottom: 10px;
    display: block;
}

input[type="text"], select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 2px solid #8e44ad;
    border-radius: 5px;
    font-size: 1em;
}

input[type="text"]:focus, select:focus {
    border-color: #3498db; /* Blue focus */
    outline: none;
}

button {
    background-color: #3498db; /* Blue button */
    color: white;
    border: none;
    padding: 12px 20px;
    font-size: 1.1em;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    width: 100%;
    margin-top: 10px;
}

button:hover {
    background-color: #2980b9;
}

/* List Styles */
ul {
    list-style-type: none;
    padding-left: 0;
}

li {
    background-color: #8e44ad; /* Purple background */
    color: white;
    padding: 10px;
    margin-bottom: 5px;
    border-radius: 5px;
}

/* Responsiveness */
@media screen and (max-width: 600px) {
    form {
        padding: 15px;
        width: 100%;
    }

    h1, h2, h3 {
        font-size: 1.4em;
    }

    input[type="text"], select {
        font-size: 0.95em;
    }

    button {
        padding: 10px;
        font-size: 1em;
    }
}

    </style>
</head>
<body>
<h1>Admin Pagina</h1>

<form method="post" action="">
    <label for="code">Toegangscode:</label>
    <input type="text" id="code" name="code" required>

    <label for="category">Categorie:</label>
    <select id="category" name="category" required>
        <?php foreach ($categories as $name => $link) { ?>
            <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
        <?php } ?>
    </select>

    <button type="submit" name="submit_code">Code Toevoegen</button>
</form>

<h2>Overzicht Toegangscodes</h2>
<?php
foreach ($categories as $name => $link) {
    $codes = $toegangscode->getCategoryCodes($name);
    echo "<h3>$name</h3>";
    echo "<ul>";
    foreach ($codes as $code) {
        echo "<li>$code</li>";
    }
    echo "</ul>";
}
?>
</body>
</html>
