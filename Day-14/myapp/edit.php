<?php
require 'db.php';

$id = $_GET['id'];

// Fetch product
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute([':id' => $id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $stmt = $pdo->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
    $stmt->execute([':name' => $name, ':price' => $price, ':id' => $id]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>
    <h1>Edit Product</h1>
    <form method="post">
        Name: <input type="text" name="name" value="<?= $product['name'] ?>" required><br>
        Price: <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Back</a>
</body>
</html>
