<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['username'] = $_POST['username'];
    header('Location: profile.php');
    exit;
}
?>
<form method="POST">
    <h3>Login</h3>
    Username: <input type="text" name="username" required>
        <button type="submit">Login</button>
</form>