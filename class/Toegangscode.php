<!-- toegangscodes class -->

<?php
include __DIR__ . '/../Database/db_connection.php'; // Correct pad naar db_connection.php

class Toegangscode {
    private $conn;

    public function __construct() {
        global $conn; // Gebruik de globale verbinding
        $this->conn = $conn;
    }

    public function addCode($code, $rooster_id) {
        $sql = "INSERT INTO toegangscodes (code, rooster_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $code, $rooster_id);
        return $stmt->execute();
    }

    public function validateCode($code) {
        $sql = "SELECT * FROM toegangscodes WHERE code = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $code);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
