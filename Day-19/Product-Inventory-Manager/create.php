<?php
include 'db.php'; 
?>
<form method="POST">
        Product Name: <input type="text" name="name" required><br>
    Price: <input type="number" step="0.01" name="price" required><br>
    Stock: <input type="number" name="stock" required><br>
    <button type="submit">Add Product</button>
</form>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO products (name, price, stock) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['price'], $_POST['stock']]);
    echo "Product added successfully!";
}
?>