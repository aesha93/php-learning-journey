<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['user'] = $_POST['name'];
    $_SESSION['last_activity'] = time(); // track time
    header('Location: dashboard.php');
    exit;
}
?>
<form method="POST">
    Enter Name: <input type="text" name="name" required>
    <button type="submit">Login</button>
</form>
