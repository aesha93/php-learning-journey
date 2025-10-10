<?php
session_start();
session_unset();
session_destroy();

// Delete cookies
setcookie('remember_user', '', time() - 3600, '/');
setcookie('last_login', '', time() - 3600, '/');

header('Location: login.php');
exit;
?>
