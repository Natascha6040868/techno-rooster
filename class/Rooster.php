<?php
class Rooster {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM roosters";
        return $this->conn->query($sql);
    }
}
?>
