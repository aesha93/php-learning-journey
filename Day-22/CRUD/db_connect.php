<?php
$host = "db";
$user = "magento";      // Your MySQL username
$pass = "magento";          // Your MySQL password
$db   = "magento";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
