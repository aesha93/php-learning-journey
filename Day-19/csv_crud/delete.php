<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idToDelete = $_POST['id'];
    $rows = [];

    if (($handle = fopen("products.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
            if ($data[0] != $idToDelete) {
                $rows[] = $data; // Keep only rows not matching ID
            }
        }
        fclose($handle);
    }

    $handle = fopen("products.csv", "w");
    foreach ($rows as $row) {
        fputcsv($handle, $row);
    }
    fclose($handle);

    echo "Product deleted successfully! <a href='read.php'>View Products</a>";
} else {
?>
<form method="POST">
    ID to Delete: <input type="text" name="id"><br>
    <button type="submit">Delete</button>
</form>
<?php } ?>
