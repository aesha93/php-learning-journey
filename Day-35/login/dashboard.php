<?php
session_start();

// Redirect if user not logged in
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

$email = $_SESSION['user_email'];
$lastLogin = $_COOKIE['last_login'] ?? 'Unknown';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h2>Welcome <?php echo ucfirst(explode('@', $email)[0]); ?>!</h2>
<p>Last Login: <?php echo $lastLogin; ?></p>
<a href="logout.php">Logout</a>
</body>
</html>
