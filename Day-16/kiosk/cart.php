<?php include 'config.php';

// Add to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}

// Fetch cart items
$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html>
<head><title>Your Cart</title></head>
<body>
<h1>Your Cart</h1>
<?php
if (!$cart) {
    echo "Cart is empty. <a href='index.php'>Shop</a>";
} else {
    $total = 0;
    foreach ($cart as $id => $qty) {
        $product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
        $line = $product['price'] * $qty;
        $total += $line;
        echo "{$product['name']} x $qty = \${$line}<br>";
    }
    echo "<p>Total: \${$total}</p>";
    echo "<a href='checkout.php'>Proceed to Checkout</a>";
}
?>
</body>
</html>
