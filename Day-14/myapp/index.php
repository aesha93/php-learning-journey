<?php
require 'db.php';

// Fetch all products
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Manager</title>
</head>
<body>
    <h1>Products</h1>
    <a href="add.php">Add New Product</a>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?= htmlspecialchars($product['name']) ?> - $<?= $product['price'] ?>
                [<a href="edit.php?id=<?= $product['id'] ?>">Edit</a>] 
                [<a href="delete.php?id=<?= $product['id'] ?>">Delete</a>]
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
