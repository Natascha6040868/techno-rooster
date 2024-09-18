<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "t_t_rooster";

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
