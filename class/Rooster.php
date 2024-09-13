<?php
include 'Database/db_connection.php'; // Verbindt met de database

class Rooster {
    private $conn;

    public function __construct() {
        // Gebruik de globale $conn die je hebt geïmporteerd uit db_connection.php
        global $conn;
        $this->conn = $conn;
    }

    public function getAll() {
        $sql = "SELECT * FROM roosters";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM roosters WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
