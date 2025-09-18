<?php
// db.php
$host = 'db';
$db   = 'magento';
$user = 'magento';
$pass = 'magento';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
