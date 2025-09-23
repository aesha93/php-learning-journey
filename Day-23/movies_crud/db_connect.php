<?php
$host = 'db';
$user = 'magento';
$pass = 'magento';
$db = 'magento';

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
    die('Connection failed: '. $conn->connect_error);
}
?>