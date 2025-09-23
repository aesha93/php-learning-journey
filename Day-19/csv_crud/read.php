<?php
$filename = "products.csv";
if (($handle = fopen($filename, "r")) !== FALSE) {
    echo "<h2>Product List</h2><table border='1' cellpadding='8'>";
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        echo "<tr>";
        foreach ($data as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }
    fclose($handle);
    echo "</table>";
} else {
    echo "Unable to open the file.";
}
?>
