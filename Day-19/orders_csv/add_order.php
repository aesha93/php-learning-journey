<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order = [
        $_POST['order_id'],
        $_POST['customer_name'],
        $_POST['product'],
        $_POST['quantity'],
        $_POST['status']
    ];

    // Append order to CSV
    $handle = fopen('orders.csv', 'a');
    fputcsv($handle, $order);
    fclose($handle);

    echo "✅ Order added successfully! <a href='view_orders.php'>View Orders</a>";
} else {
?>
<h2>Add New Order</h2>
<form method="POST">
    Order ID: <input type="text" name="order_id" required><br>
    Customer Name: <input type="text" name="customer_name" required><br>
    Product: <input type="text" name="product" required><br>
    Quantity: <input type="number" name="quantity" required><br>
    Status: <input type="text" name="status" required><br>
    <button type="submit">Add Order</button>
</form>
<?php } ?>
