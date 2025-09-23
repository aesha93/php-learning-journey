<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newProduct = [$_POST['id'], $_POST['name'], $_POST['price'], $_POST['status']];
    $handle = fopen("products.csv", "a");
    fputcsv($handle, $newProduct);
    fclose($handle);
    echo "Product added successfully! <a href='read.php'>View Products</a>";
} else {
?>
<form method="POST">
    ID: <input type="text" name="id"><br>
    Name: <input type="text" name="name"><br>
    Price: <input type="text" name="price"><br>
    Status: <input type="text" name="status"><br>
    <button type="submit">Add</button>
</form>
<?php } ?>
