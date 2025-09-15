<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    die("Access Denied! <a href='login.php'>Login here</a>");
}
echo "Welcome, " . $_SESSION['user'];

?>