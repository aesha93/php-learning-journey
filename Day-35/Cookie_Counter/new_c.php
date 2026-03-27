<?php
$visits = isset($_COOKIE['visit_count']) ? $_COOKIE['visit_count'] + 1 : 1;
setcookie('visit_count', $visits, time() + 3600, "/");
echo "You have visited this page $visits times.";
?>