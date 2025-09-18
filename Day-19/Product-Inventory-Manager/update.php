<?php include 'db.php';
$id = $_GET['id'];
$product = $pdo->prepare("SELECT * FROM products WHERE id=?");
$product->execute([$id]);
$data = $product->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE products SET price=?, stock=? WHERE id=?");
    $stmt->execute([$_POST['price'], $_POST['stock'], $id]);
    header("Location: index.php");
}
?>
<form method="POST">
    Name: <input type="text" value="<?= $data['name'] ?>" disabled><br>
    Price: <input type="number" step="0.01" name="price" value="<?= $data['price'] ?>"><br>
    Stock: <input type="number" name="stock" value="<?= $data['stock'] ?>"><br>
    <button type="submit">Update Product</button>
</form>
