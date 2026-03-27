<?php
session_start();

// 🔹 Step 1: Destroy the session
session_unset();
session_destroy();

// 🔹 Step 2: Delete the cookie (if exists)
if (isset($_COOKIE['remember_me'])) {
    setcookie('remember_me', '', time() - 3600, '/'); // Expire it
}

// 🔹 Step 3: Redirect to login page
header('Location: login.php');
exit;
