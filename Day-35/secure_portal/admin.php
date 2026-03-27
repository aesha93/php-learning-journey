<?php
include 'session_check.php';

// Restrict access
if ($_SESSION['role'] !== 'admin') {
    echo "<h3>🚫 Access Denied! Admins only.</h3>";
    echo "<a href='dashboard.php'>Back to Dashboard</a>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Admin Panel</title></head>
<body>
<h2>🛠️ Admin Panel</h2>
<p>Welcome, Admin <?php echo $_SESSION['user_email']; ?>!</p>
<a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
