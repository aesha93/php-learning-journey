<?php
$host = 'db';
$db   = 'magento';
$user = 'magento';
$pass = 'magento'; // set your MySQL password
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start(); // for cart sessions
?>
