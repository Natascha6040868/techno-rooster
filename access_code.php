<?php
include 'Database/db_connection.php'; // Database connection
include 'class/Toegangscode.php';

// Pass the database connection to Toegangscode class
$toegangscode = new Toegangscode($conn);

// Check if category is provided
if (!isset($_GET['category'])) {
    die("Categorie niet gevonden.");
}

$category = $_GET['category'];
$categories = [
    "Slimme Techniek" => "techniek.php",
    "Zorg & gezond leven" => "zorg.php",
    "Onderwijs & bewegen" => "onderwijs_bewegen.php",
    "Circulair & duurzaam ondernemen" => "circulair_duurzaam_ondernemen.php"
];

if (!array_key_exists($category, $categories)) {
    die("Ongeldige categorie.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_code = $_POST['code'];
    $stored_codes = $toegangscode->getCategoryCodes($category);

    // Check if the entered code matches one of the stored codes
    if (in_array($input_code, $stored_codes)) {
        // Redirect to the corresponding page if the code is correct
        header("Location: " . $categories[$category]);
        exit();
    } else {
        $error = "Ongeldige toegangscode.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toegangscode Verificatie</title>
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
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 10px; /* Ensures proper padding on mobile screens */
}

/* Container */
form {
    background-color: #ffffff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px; /* Limits the form width on larger screens */
    text-align: center;
    border-top: 8px solid #6ab04c; /* Green border for a bold Technolab touch */
}

/* Form Elements */
h1 {
    font-size: 1.8em;
    margin-bottom: 20px;
    color: #333;
    font-weight: 600;
}

p {
    margin-bottom: 15px;
    color: #e74c3c;
    font-weight: bold;
}

label {
    font-size: 1.1em;
    margin-bottom: 8px;
    display: block;
    color: #2f3640;
}

input[type="text"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 2px solid #6ab04c;
    border-radius: 5px;
    font-size: 1em;
}

input[type="text"]:focus {
    border-color: #2980b9; /* Blue outline when focused */
    outline: none;
}

/* Button Styling */
button {
    background-color: #2980b9; /* Technolab blue */
    color: white;
    border: none;
    padding: 14px;
    font-size: 1.1em;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    width: 100%;
}

button:hover {
    background-color: #1e6f9f;
}

/* Responsiveness for Mobile */
@media screen and (max-width: 600px) {
    form {
        padding: 20px;
        width: 100%; /* Form takes the full width of the mobile screen */
    }

    h1 {
        font-size: 1.6em; /* Slightly smaller heading for mobile */
    }

    input[type="text"] {
        font-size: 0.95em; /* Smaller input text for mobile */
        padding: 10px;
    }

    button {
        padding: 12px;
        font-size: 1em; /* Slightly smaller button text for mobile */
    }
}


    </style>
</head>
<body>
    <h1>Toegangscode Verificatie voor <?php echo $category; ?></h1>
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="code">Voer uw toegangscode in:</label>
        <input type="text" id="code" name="code" required>
        <button type="submit">Verifiëren</button>
    </form>
</body>
</html>
