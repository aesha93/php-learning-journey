<?php
$search = $_GET['search'] ?? '';
$filename = 'orders.csv';
?>
<h2>Orders</h2>
<form method="GET">
    Search by Customer or Product: 
    <input type="text" name="search" value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Search</button>
</form>
<table border="1" cellpadding="8">
<tr>
    <th>Order ID</th><th>Customer Name</th><th>Product</th><th>Quantity</th><th>Status</th>
</tr>
<?php
if (($handle = fopen($filename, 'r')) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
        // Skip empty rows
        if (count($row) < 5) continue;

        // Simple search filter
        if ($search && stripos($row[1], $search) === FALSE && stripos($row[2], $search) === FALSE) {
            continue;
        }

        echo '<tr>';
        foreach ($row as $cell) {
            echo '<td>' . htmlspecialchars($cell) . '</td>';
        }
        echo '</tr>';
    }
    fclose($handle);
} else {
    echo "<tr><td colspan='5'>Unable to open file</td></tr>";
}
?>
</table>
