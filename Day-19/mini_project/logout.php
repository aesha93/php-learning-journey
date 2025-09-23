<?php
session_start();

// Check GET parameter for confirmation
if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    session_unset();      // Remove all session variables
    session_destroy();    // Destroy the session
    header('Location: index.php?message=You+have+logged+out');
    exit;
} else {
    echo "Invalid logout request!";
}
?>
