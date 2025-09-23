<?php
session_start();

// If not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: index.php?message=Please+log+in+first');
    exit;
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
<p>This is your profile page.</p>
<a href="logout.php?confirm=yes">Logout</a>
</body>
</html>
