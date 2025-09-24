<?php
include 'db_connect.php';

// Delete product
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM products WHERE id = $id");
}

// Fetch products
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Product List</title>
</head>
<body>
  <h2>Products</h2>
  <a href="add.php">Add New Product</a>
  <table border="1" cellpadding="8">
    <tr>
      <th>ID</th><th>Product</th><th>Category</th><th>Price</th><th>Stock</th><th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['product_name']) ?></td>
      <td><?= htmlspecialchars($row['category']) ?></td>
      <td><?= $row['price'] ?></td>
      <td><?= $row['stock'] ?></td>
      <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this product?')">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
