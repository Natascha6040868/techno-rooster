<?php
$host = 'localhost';  // of gebruik de servernaam van je database
$db = 'T_T_Rooster';  // naam van je database
$user = 'root';       // je MySQL-gebruikersnaam
$pass = 'root';           // je MySQL-wachtwoord (laat leeg als je geen wachtwoord hebt ingesteld)

// DSN (Data Source Name) configuratie
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    // Maak een nieuwe PDO-verbinding
    $pdo = new PDO($dsn, $user, $pass);
    
    // Zet PDO foutmodus naar Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  
} catch (PDOException $e) {
    // Als er een fout optreedt, laat de foutmelding zien
    echo "Verbindingsfout: " . $e->getMessage();
    exit;
}
?>
