<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['name'] = $_POST['name'];
    header('Location: upload.php');
    exit;
}
?>
<form method="POST">
    Enter your name: <input type="text" name="name" required>
    <button type="submit">Login</button>
</form>
