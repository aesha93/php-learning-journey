<?php
session_start();
session_unset();
session_destroy();

// ❌ Clear cookie on logout
setcookie("user", "", time() - 3600, "/");

header("Location: login_cookie.php");
exit;
?>
