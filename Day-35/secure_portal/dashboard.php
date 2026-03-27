<?php
include 'session_check.php';
$email = $_SESSION['user_email'];
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<body>
<h2>Welcome, <?php echo ucfirst(explode('@', $email)[0]); ?>!</h2>
<p>Role: <?php echo strtoupper($role); ?></p>

<?php if ($role === 'admin'): ?>
    <a href="admin.php">Go to Admin Panel</a><br><br>
<?php endif; ?>

<a href="logout.php">Logout</a>
</body>
</html>
