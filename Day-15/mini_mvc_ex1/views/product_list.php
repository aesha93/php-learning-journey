<?php
// $products is provided by controller
?>
<!doctype html>
<html>
<head><title>Products</title></head>
<body>
<h1>Product List</h1>
<ul>
<?php foreach($products as $p): ?>
    <li>
        SKU: <?php echo $p['sku']; ?> — <?php echo $p['name']; ?> — Price: <?php echo $p['price']; ?>

    </li>
<?php endforeach; ?>
</ul>
</body>
</html>
