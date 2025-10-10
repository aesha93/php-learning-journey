<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Session timeout 60 sec
if (time() - $_SESSION['last_activity'] > 60) {
    session_unset();
    session_destroy();
    echo "<h3>⏰ Session expired due to inactivity!</h3>";
    echo "<a href='login.php'>Login again</a>";
    exit;
}

// update activity time
$_SESSION['last_activity'] = time();
?>
<h2>Welcome <?php echo $_SESSION['user']; ?>!</h2>
<p>Your session is active.</p>
<a href="logout.php">Logout</a>
