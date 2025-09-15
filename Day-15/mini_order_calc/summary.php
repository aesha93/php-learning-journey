<?php
// Same product data for lookup
$products = [
    ['sku'=>'P1001','name'=>'Bag','price'=>500],
    ['sku'=>'P1002','name'=>'Shoes','price'=>1200],
    ['sku'=>'P1003','name'=>'Watch','price'=>2500]
];

// Build a lookup table for easy access by SKU
$productLookup = [];
foreach ($products as $p) {
    $productLookup[$p['sku']] = $p;
}

$selected = $_POST['selected'] ?? [];
$qty      = $_POST['qty'] ?? [];

if (empty($selected)) {
    echo "<p style='color:red;'>No products selected. <a href='order.php'>Back</a></p>";
    exit;
}

$items = [];
$subtotal = 0;

// Calculate line totals
foreach ($selected as $sku) {
    if (!isset($productLookup[$sku])) {
        continue; // skip invalid SKU
    }
    $quantity = isset($qty[$sku]) && $qty[$sku] > 0 ? (int)$qty[$sku] : 0;
    if ($quantity === 0) {
        continue; // skip zero quantities
    }
    $price = $productLookup[$sku]['price'];
    $lineTotal = $price * $quantity;
    $subtotal += $lineTotal;
    $items[] = [
        'name' => $productLookup[$sku]['name'],
        'qty'  => $quantity,
        'line' => $lineTotal
    ];
}

if (empty($items)) {
    echo "<p style='color:red;'>Invalid quantities or no valid products selected. <a href='order.php'>Back</a></p>";
    exit;
}

// Calculate tax and grand total
$tax = $subtotal * 0.10;
$grandTotal = $subtotal + $tax;
?>
<!doctype html>
<html>
<head><title>Order Summary</title></head>
<body>
<h1>Order Summary</h1>
<table border="1" cellpadding="5" cellspacing="0">
  <tr><th>Product</th><th>Qty</th><th>Line Total</th></tr>
  <?php foreach ($items as $item): ?>
    <tr>
      <td><?php echo $item['name']; ?></td>
      <td><?php echo $item['qty']; ?></td>
      <td><?php echo $item['line']; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<p>Subtotal: <?php echo $subtotal; ?></p>
<p>Tax (10%): <?php echo $tax; ?></p>
<p><strong>Grand Total: <?php echo $grandTotal; ?></strong></p>
<p><a href="order.php">Back to Order Page</a></p>
</body>
</html>
