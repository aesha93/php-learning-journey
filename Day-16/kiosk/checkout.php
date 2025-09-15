<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Checkout</title></head>
<body>
<h1>Checkout</h1>
<form method="post" action="save_order.php">
  <label>Your Name: <input type="text" name="customer" required></label>
  <button type="submit">Place Order</button>
</form>
</body>
</html>
