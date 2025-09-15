<?php
// $orders is provided by the controller
?>
<!doctype html>
<html>
<head><title>Orders for Customer</title></head>
<body>
<h1>Orders for Customer</h1>
<?php if (empty($orders)): ?>
  <p>No orders found.</p>
<?php else: ?>
  <ul>
  <?php foreach ($orders as $o): ?>
    <li>Order #<?php echo $o['order_id']; ?> — Total: <?php echo $o['total']; ?></li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
</body>
</html>
