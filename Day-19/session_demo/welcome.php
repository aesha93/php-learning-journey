<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Welcome</title></head>
<body>
<h2>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h2>
<p>This is a protected page only visible after login.</p>
<a href="logout.php">Logout</a>
</body>
</html>
