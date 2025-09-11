<?php
// $product and $shipping come from the controller
?>
<!doctype html>
<html>
<head><title>Checkout Summary</title></head>
<body>
<?php if (!$product): ?>
  <h1>Product not found.</h1>
<?php elseif (!$shipping): ?>
  <h1>Shipping method not found.</h1>
<?php else: ?>
  <h1>Checkout Summary</h1>
  <p><strong>Product:</strong> <?php echo $product['name']; ?> (<?php echo $product['sku']; ?>)</p>
  <p><strong>Price:</strong> <?php echo $product['price']; ?></p>
  <p><strong>Quantity:</strong> 1</p>
  <p><strong>Shipping:</strong> <?php echo $shipping['label']; ?> — Cost: <?php echo $shipping['cost']; ?></p>
  <hr>
  <p><strong>Total:</strong> <?php echo $product['price'] + $shipping['cost']; ?></p>
<?php endif; ?>
</body>
</html>
