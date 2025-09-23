<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $conn->real_escape_string($_POST['product_name']);
    $category     = $conn->real_escape_string($_POST['category']);
    $price        = floatval($_POST['price']);
    $stock        = intval($_POST['stock']);

    $sql = "INSERT INTO products (product_name, category, price, stock) 
            VALUES ('$product_name', '$category', $price, $stock)";
    $conn->query($sql);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
</head>
<body>
  <h2>Add Product</h2>
  <form method="post">
    Name: <input type="text" name="product_name" required><br><br>
    Category: <input type="text" name="category" required><br><br>
    Price: <input type="number" step="0.01" name="price" required><br><br>
    Stock: <input type="number" name="stock" required><br><br>
    <button type="submit">Save</button>
  </form>
  <a href="index.php">Back</a>
</body>
</html>
