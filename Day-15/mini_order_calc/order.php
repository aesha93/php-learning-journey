<?php
// Products array
$products = [
    ['sku'=>'P1001','name'=>'Bag','price'=>500],
    ['sku'=>'P1002','name'=>'Shoes','price'=>1200],
    ['sku'=>'P1003','name'=>'Watch','price'=>2500]
];
?>
<!doctype html>
<html>
<head><title>Place Order</title></head>
<body>
<h1>Select Products</h1>
<form action="summary.php" method="post">
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>Select</th><th>Product</th><th>Price</th><th>Quantity</th>
    </tr>
    <?php foreach ($products as $p): ?>
    <tr>
      <td><input type="checkbox" name="selected[]" value="<?php echo $p['sku']; ?>"></td>
      <td><?php echo $p['name']; ?></td>
      <td><?php echo $p['price']; ?></td>
      <td><input type="number" name="qty[<?php echo $p['sku']; ?>]" value="1" min="1"></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <br>
  <button type="submit">Calculate Total</button>
</form>
</body>
</html>
