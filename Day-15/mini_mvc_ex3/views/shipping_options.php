<?php
// $methods from controller
?>
<!doctype html>
<html>
<head><title>Shipping Options</title></head>
<body>
<h1>Available Shipping Methods</h1>
<ul>
<?php foreach ($methods as $m): ?>
  <li><?php echo $m['label']; ?> (<?php echo $m['code']; ?>) — Cost: <?php echo $m['cost']; ?></li>
<?php endforeach; ?>
</ul>
</body>
</html>
