<?php
include 'db.php';
$id = $_GET['id'];
$user = $pdo->prepare("SELECT * FROM users WHERE id=?");
$user->execute([$id]);
$data = $user->fetch(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $stmt  = $pdo->prepare("UPDATE users SET name=?, email=?, city=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['email'], $_POST['city'], $id]);
    header("Location: index.php");
}
?>