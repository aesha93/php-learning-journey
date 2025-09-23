<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idToUpdate = $_POST['id'];
    $updatedData = [$_POST['id'], $_POST['name'], $_POST['price'], $_POST['status']];
    $rows = [];

    if (($handle = fopen("products.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            if ($data[0] == $idToUpdate) {
                $rows[] = $updatedData; // Replace matching row
            } else {
                $rows[] = $data;
            }
        }
        fclose($handle);
    }

    $handle = fopen("products.csv", "w");
    foreach ($rows as $row) {
        fputcsv($handle, $row);
    }
    fclose($handle);

    echo "Product updated successfully! <a href='read.php'>View Products</a>";
} else {
?>
<form method="POST">
    ID to Update: <input type="text" name="id"><br>
    New Name: <input type="text" name="name"><br>
    New Price: <input type="text" name="price"><br>
    New Status: <input type="text" name="status"><br>
    <button type="submit">Update</button>
</form>
<?php } ?>
