<!DOCTYPE html>
<html>
<head><title>Shopping Cart</title></head>
<body>
<form method="post">
    <input type="checkbox" name="items[]" value="Shirt-500"> Shirt (₹500)<br>
    <input type="checkbox" name="items[]" value="Shoes-800"> Shoes (₹800)<br>
    <input type="checkbox" name="items[]" value="Watch-1000"> Watch (₹1000)<br>
    <input type="checkbox" name="items[]" value="shoes-300"> shoes (₹300)<br><br>
    <input type="submit" value="Checkout">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $items = $_POST['items'] ?? [];

    if (!empty($items)) {
        $total = 0;
        echo "<h3>Your Cart:</h3>";
        foreach ($items as $item) {
            list($name, $price) = explode("-", $item);
            echo "$name - ₹$price<br>";
            $total += $price;
        }
        echo "<strong>Total = ₹$total</strong>";
    } else {
        echo "❌ No items selected.";
    }
}
?>
</body>
</html>
