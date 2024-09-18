<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Include the database connection
    include 'Database/db_connection.php';

    // Prepare SQL to insert user into the database
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    
    // Prepare the statement and check if it's successful
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $name, $email, $password);

        // Execute and check for success
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Output SQL error
        echo "Error preparing statement: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

