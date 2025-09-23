<!-- src/Views/product-view.php -->
<h1><?= htmlspecialchars($product['name']) ?></h1>
<p>Price: $<?= number_format($product['price'], 2) ?></p>
