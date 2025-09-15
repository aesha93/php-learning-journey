<?php
session_start();

if(!isset($_SESSION['user'])){
    header('Location: login.php');
    exit;
}

$username = $_SESSION['user'];
?>
<!doctype html>
<html>
<head><title>Dashboard</title></head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
<p><a href="logout.php">Logout</a></p>
</body>
</html>
