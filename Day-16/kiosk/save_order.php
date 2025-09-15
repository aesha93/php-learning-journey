<?php
include 'config.php';
$cart = $_SESSION['cart'] ?? [];
if (!$cart) {
    die("Cart is empty.");
}

$customer = $_POST['customer'];
$total = 0;

// Calculate total
foreach ($cart as $id => $qty) {
    $product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
    $total += $product['price'] * $qty;
}

// Save order
$conn->query("INSERT INTO orders (customer_name,total) VALUES ('$customer',$total)");
$orderId = $conn->insert_id;

// Save order items
foreach ($cart as $id => $qty) {
    $conn->query("INSERT INTO order_items (order_id,product_id,quantity) VALUES ($orderId,$id,$qty)");
}

// Clear cart
unset($_SESSION['cart']);
echo "Order placed successfully! <a href='index.php'>New Order</a>";
?>
