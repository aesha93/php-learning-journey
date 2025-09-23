<?php
include 'db_connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM books WHERE id=$id";

if ($conn->query($sql)) {
    header('Location: index.php');
} else {
    echo "Error: " . $conn->error;
}
?>
