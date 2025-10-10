<?php
session_start();

// If not logged in, redirect
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

// Auto logout after 3 minutes of inactivity
if (time() - ($_SESSION['last_activity'] ?? 0) > 180) {
    session_unset();
    session_destroy();
    echo "<h3>⏰ Session expired due to inactivity!</h3>";
    echo "<a href='login.php'>Login again</a>";
    exit;
}

// Update last activity
$_SESSION['last_activity'] = time();
