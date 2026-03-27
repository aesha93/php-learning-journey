<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    // Try auto-login via cookie
    if (isset($_COOKIE['remember_user'])) {
        $_SESSION['username'] = $_COOKIE['remember_user'];
    } else {
        header('Location: login.php');
        exit;
    }
}

$username = $_SESSION['username'];
$lastLogin = $_COOKIE['last_login'] ?? 'First time login';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h2>Welcome <?php echo htmlspecialchars($username); ?>! You are logged in.</h2>
<p>Last Login: <?php echo $lastLogin; ?></p>
<a href="logout.php">Logout</a>
</body>
</html>
