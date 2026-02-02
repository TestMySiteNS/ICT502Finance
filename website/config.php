<?php
$servername = "localhost";
$username = "root";
$password = "y5C9O0RBqRoh";
$dbname = "PersonalFinance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
