<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO expenses (user_id, category, description, amount, expense_date) 
            VALUES ($user_id, '$category', '$description', $amount, '$date')";
    if ($conn->query($sql) === TRUE) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense - Personal Finance Manager</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h1>Add Expense</h1>
        <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <form method="POST">
            <label>Category:</label><br>
            <input type="text" name="category" required><br>

            <label>Description:</label><br>
            <input type="text" name="description" required><br>

            <label>Amount:</label><br>
            <input type="number" name="amount" step="0.01" required><br>

            <label>Date:</label><br>
            <input type="date" name="date" required><br>

            <button type="submit">Add Expense</button>
        </form>
        <br>
        <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
    </div>
</body>
</html>
