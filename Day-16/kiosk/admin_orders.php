<?php include 'config.php'; ?>
<h1>All Orders</h1>
<?php
$result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");
while ($row = $result->fetch_assoc()) {
    echo "<div><strong>Order #{$row['id']}</strong> - {$row['customer_name']} - \$${row['total']} - {$row['created_at']}</div>";
}
?>
