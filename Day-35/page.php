<?php
$visits = 1;

if(isset($_COOKIE['visit_count'])){
    $visits = $_COOKIE['visit_count'] + 1;
}

// Update cookie (1 day)
setcookie('visit_count', $visits, time() + 86400, '/');
?>
<!DOCTYPE html>
<html>
<head><title>Visit Counter</title></head>
<body>
<h3>You have visited this page <?php echo $visits; ?> times.</h3>
</body>
</html>
