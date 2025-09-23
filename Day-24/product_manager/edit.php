<?php
include 'db_connect.php';

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM products WHERE id = $id");
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $conn->real_escape_string($_POST['product_name']);
    $category     = $conn->real_escape_string($_POST['category']);
    $price        = floatval($_POST['price']);
    $stock        = intval($_POST['stock']);

    $sql = "UPDATE products 
            SET product_name='$product_name', category='$category', price=$price, stock=$stock 
            WHERE id=$id";
    $conn->query($sql);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
</head>
<body>
  <h2>Edit Product</h2>
  <form method="post">
    Name: <input type="text" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required><br><br>
    Category: <input type="text" name="category" value="<?= htmlspecialchars($product['category']) ?>" required><br><br>
    Price: <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br><br>
    Stock: <input type="number" name="stock" value="<?= $product['stock'] ?>" required><br><br>
    <button type="submit">Update</button>
  </form>
  <a href="index.php">Back</a>
</body>
</html>
