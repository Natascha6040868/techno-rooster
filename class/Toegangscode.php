<?php
class Toegangscode {
    private $conn;

    // Constructor that accepts the database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Method to add a new access code for a category
    public function addCategoryCode($code, $category) {
        $sql = "INSERT INTO category_access_codes (category_name, access_code) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $category, $code);
        return $stmt->execute();
    }

    // Method to retrieve codes for a specific category
    public function getCategoryCodes($category) {
        $sql = "SELECT access_code FROM category_access_codes WHERE category_name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $result = $stmt->get_result();
        $codes = [];

        while ($row = $result->fetch_assoc()) {
            $codes[] = $row['access_code'];
        }

        return $codes;
    }
}
?>
