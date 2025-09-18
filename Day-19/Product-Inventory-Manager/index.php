<?php include 'db.php';
$products = $pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Product Inventory</h2>
<table border="1">
<tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Actions</th></tr>
<?php foreach ($products as $p): ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= $p['name'] ?></td>
    <td><?= $p['price'] ?></td>
    <td><?= $p['stock'] ?></td>
    <td>
        <a href="update.php?id=<?= $p['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $p['id'] ?>" onclick="return confirm('Delete this product?');">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<a href="create.php">➕ Add New Product</a>
