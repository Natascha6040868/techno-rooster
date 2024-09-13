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
        <section id="buttons">
            <?php
            // Importeer de ButtonGenerator klasse
            require 'class/ButtonGenerator.php';

            // Array met knoppenlabels en de bijbehorende webpagina's (URLs)
            $buttons = [
                "Slimme Techniek" => "techniek.php",
                "Zorg & gezond leven" => "zorg.php",
                "Onderwijs & bewegen" => "onderwijs_bewegen.php",
                "Circulair & duurzaam ondernemen" => "circulair_duurzaam_ondernemen.php"
            ];

            // Maak een nieuw ButtonGenerator object
            $buttonGenerator = new ButtonGenerator($buttons);

            // Roep de methode aan om de knoppen te genereren
            $buttonGenerator->generateButtons();
            ?>
        </section>
    </main>
</body>

</html>