<?php
session_start();

// Destroy session and cookie
session_unset();
session_destroy();

if (isset($_COOKIE['last_login'])) {
    setcookie('last_login', '', time() - 3600, '/');
}

header('Location: login.php');
exit;
