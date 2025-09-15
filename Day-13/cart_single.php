<?php
// cart_single.php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product = $_POST['product'];
    $qty = (int)$_POST['qty'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $_SESSION['cart'][$product] = ($_SESSION['cart'][$product] ?? 0) + $qty;
}

echo "<h2>Your Cart</h2>";
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item => $qty) {
        echo "<p>$item x $qty</p>";
    }
} else {
    echo "Cart is empty.";
}
?>

<form method="POST">
    Product: <input type="text" name="product" required>
    Qty: <input type="number" name="qty" min="1" value="1">
    <button type="submit">Add to Cart</button>
</form>
