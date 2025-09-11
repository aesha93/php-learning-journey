<?php
// $order comes from controller
?>
<!doctype html>
<html>
<head><title>Order Detail</title></head>
<body>
<?php if (!$order): ?>
  <h1>Order not found</h1>
<?php else: ?>
  <h1>Order #<?php echo $order['order_id']; ?></h1>
  <p>Customer: <?php echo $order['customer']; ?></p>
  <h2>Items</h2>
  <ul>
    <?php foreach ($order['items'] as $item): ?>
      <li><?php echo $item['sku']; ?> — <?php echo $item['name']; ?> — Qty: <?php echo $item['qty']; ?> — Price: <?php echo $item['price']; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
</body>
</html>
