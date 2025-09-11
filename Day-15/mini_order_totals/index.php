<?php

$cartItems = [
    ['sku'=>'SHOE123','name'=>'Running Shoes','price'=>1200,'qty'=>1],
    ['sku'=>'BAG456','name'=>'Backpack','price'=>800,'qty'=>2],
    ['sku'=>'CAP789','name'=>'Cap','price'=>300,'qty'=>3]
];
$subtotal = 0;
foreach ($cartItems as $item) {
    $lineTotal = $item['price'] * $item['qty'];
    $subtotal += $lineTotal;
}

$discount = 0;
if ($subtotal > 2000) {
    $discount = $subtotal * 0.10; // 10% discount
}

$grandTotal = $subtotal - $discount;
?>
<!doctype html>
<html>
<head><title>Order Summary</title></head>
<body>
<h1>Order Summary</h1>
<?php foreach ($cartItems as $item): ?>
  <p>
    Item: <?php echo $item['name']; ?> (x<?php echo $item['qty']; ?>)
    — <?php echo $item['price'] * $item['qty']; ?>
  </p>
<?php endforeach; ?>

<hr>
<p>Subtotal: <?php echo $subtotal; ?></p>
<?php if ($discount > 0): ?>
  <p>Discount: <?php echo $discount; ?></p>
<?php else: ?>
  <p>No discount applied.</p>
<?php endif; ?>
<p><strong>Grand Total: <?php echo $grandTotal; ?></strong></p>
</body>
</html>
