<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechnoRooster-Home</title>
    <link rel="stylesheet" href="style.css">
    <script src="animation.js" defer></script>
    <style>
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <a href="home.php"><img id="logo" src="img/logo.png" alt="logo"></a>
    </header>
    <main>
    <h1>Kies een categorie</h1>
    <ul>
        <li><a href="access_code.php?category=<?php echo urlencode('Slimme Techniek'); ?>">Slimme Techniek</a></li>
        <li><a href="access_code.php?category=<?php echo urlencode('Zorg & gezond leven'); ?>">Zorg & gezond leven</a></li>
        <li><a href="access_code.php?category=<?php echo urlencode('Onderwijs & bewegen'); ?>">Onderwijs & bewegen</a></li>
        <li><a href="access_code.php?category=<?php echo urlencode('Circulair & duurzaam ondernemen'); ?>">Circulair & duurzaam ondernemen</a></li>
    </ul>
    </main>
</body>

</html>