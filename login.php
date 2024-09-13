<?php
// Include database connection file
include 'Database/db_connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (!empty($email) && !empty($password)) {
        try {
            // Prepare a select statement
            $stmt = $pdo->prepare("SELECT id, username, password, full_name FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                // Password is correct, start a new session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['full_name'];
                echo "Login successful.";
                // Redirect to profile or home page
                header("Location: index.php");
                exit;
            } else {
                echo "Invalid email or password.";
            }
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
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <style>
        body {
            background-color: #A020F0;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 350px;
            text-align: center;
            position: relative;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #0b79d0;
        }

        .login-container img {
            margin-left: -15px;
            width: 300px;
            height: 100px;
            margin-bottom: 20px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: border 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border: 1px solid #0b79d0;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #0b79d0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #055a9c;
        }

        a {
            display: block;
            margin-top: 15px;
            color: #0b79d0;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }

        /* Technolab colors */
        body {
            background-color: #e6f7ff;
        }

        button {
            background-color: #0b79d0;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #0b79d0;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <!-- Voeg hier het Technolab-logo toe -->
        <img src="img/logo2.png" alt="Technolab Logo" id="logo_login">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log in</button>
            <a href="forgot_password.php">Forget Your Password?</a>
        </form>
        <div class="footer">© 2024 Technolab</div>
    </div>

</body>
</html>
