<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';
$user_id = $_SESSION['user_id'];

// Fetch income and expenses
$income_res = $conn->query("SELECT * FROM income WHERE user_id=$user_id ORDER BY income_date DESC");
$expenses_res = $conn->query("SELECT * FROM expenses WHERE user_id=$user_id ORDER BY expense_date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Personal Finance Manager</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo $_SESSION['name']; ?>!</h1>
        <a href="logout.php" class="logout-btn">Logout</a>

        <div class="section">
            <h2>Income</h2>
            <ul>
                <?php while($row = $income_res->fetch_assoc()) {
                    echo "<li>{$row['source']}: \$ {$row['amount']} ({$row['income_date']})</li>";
                } ?>
            </ul>
            <a href="add_income.php" class="add-btn">Add Income</a>
        </div>

        <div class="section">
            <h2>Expenses</h2>
            <ul>
                <?php while($row = $expenses_res->fetch_assoc()) {
                    echo "<li>{$row['category']} - {$row['description']}: \$ {$row['amount']} ({$row['expense_date']})</li>";
                } ?>
            </ul>
            <a href="add_expense.php" class="add-btn">Add Expense</a>
        </div>
    </div>
</body>
</html>
