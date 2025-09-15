<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <title>Kiosk Menu</title>
</head>
<body>
<h1>Self-Ordering Kiosk</h1>
<?php
$result = $conn->query("SELECT * FROM products");
while ($row = $result->fetch_assoc()) {
    echo "<div class='product'>
            <h3>{$row['name']}</h3>
            <p>Price: \${$row['price']}</p>
            <form method='post' action='cart.php'>
              <input type='hidden' name='id' value='{$row['id']}'>
              <button type='submit'>Add to Cart</button>
            </form>
          </div>";
}
?>
<a href="cart.php">View Cart</a>
</body>
</html>
