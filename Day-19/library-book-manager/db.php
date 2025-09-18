<?php
$dsn = "mysql:host=db;dbname=magento;charset=utf8";
$user = "magento";  // change if needed
$pass = "magento";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
