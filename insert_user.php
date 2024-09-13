<?php
// Include database connection file
include 'Database/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $full_name = $_POST['full_name']; // Assuming you are also collecting full name

    // Validate input
    if (!empty($email) && !empty($password) && !empty($full_name)) {
        try {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare an insert statement
            $stmt = $pdo->prepare("INSERT INTO users (email, password, full_name) VALUES (?, ?, ?)");
            $stmt->execute([$email, $hashed_password, $full_name]);

            echo "User successfully registered.";
            // Redirect to login page or somewhere else
            header("Location: login.php");
            exit;
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        }
    } else {
        echo "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

    <div class="register-container">
        <h1>Register</h1>
        <form action="insert_user.php" method="post">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
    </div>

</body>
</html>
