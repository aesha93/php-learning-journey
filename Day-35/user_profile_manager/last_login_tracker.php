<?php
date_default_timezone_set('Asia/Kolkata');

// If cookie exists → show last login
if (isset($_COOKIE['last_login'])) {
    echo "Welcome back! Your last login was on: " . $_COOKIE['last_login'] . "<br>";
} else {
    echo "Welcome! This is your first login.<br>";
}

// Update cookie for next time
setcookie('last_login', date('Y-m-d H:i:s'), time() + 3600, '/');
