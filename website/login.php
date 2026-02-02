<?php
session_start();
include 'config.php'; // Database connection

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Simple hashing

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['name'] = $user['name'];
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Personal Finance Manager</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link CSS here -->
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <form method="POST">
            <label>Email:</label><br>
            <input type="email" name="email" required><br>
            
            <label>Password:</label><br>
            <input type="password" name="password" required><br>
            
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
