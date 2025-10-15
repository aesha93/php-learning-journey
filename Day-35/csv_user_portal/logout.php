<?php
session_start();

// Step 1: Unset all session variables
session_unset();

// Step 2: Destroy the session
session_destroy();

// Step 3: Clear the "Remember Me" cookie (if it exists)
if(isset($_COOKIE['username'])){
    setcookie('username', '', time() - 3600, "/");
}

// Step 4: Redirect back to login
header("Location: login.php");
exit;

// Think: Destroy session and cookie → redirect to login
?>
