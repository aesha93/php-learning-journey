<?php
require 'functions.php';
$filename = 'data.csv';

// Read all books
$books = readCSV($filename);

// Get filters from URL
$filterTitle  = $_GET['title'] ?? '';
$filterStatus = $_GET['status'] ?? '';

// Filter by title or status if provided
if ($filterTitle || $filterStatus) {
    $books = array_filter($books, function ($row) use ($filterTitle, $filterStatus) {
        $matchesTitle  = !$filterTitle  || stripos($row[1], $filterTitle) !== false;
        $matchesStatus = !$filterStatus || $row[4] === $filterStatus;
        return $matchesTitle && $matchesStatus;
    });
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Library</title>
</head>
<body>
<h2>📚 Book Library</h2>

<form method="get" style="margin-bottom:10px;">
    Filter by Title: <input type="text" name="title" value="<?=htmlspecialchars($filterTitle)?>">
    Status:
    <select name="status">
        <option value="">--Any--</option>
        <option value="Available" <?= $filterStatus==='Available'?'selected':''?>>Available</option>
        <option value="Borrowed" <?= $filterStatus==='Borrowed'?'selected':''?>>Borrowed</option>
    </select>
    <button type="submit">Filter</button>
</form>

<a href="add.php">➕ Add New Book</a>

<table border="1" cellpadding="5" cellspacing="0" style="margin-top:10px;">
<tr>
    <th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Status</th><th>Actions</th>
</tr>
<?php foreach ($books as $row): ?>
<tr>
    <td><?=htmlspecialchars($row[0])?></td>
    <td><?=htmlspecialchars($row[1])?></td>
    <td><?=htmlspecialchars($row[2])?></td>
    <td><?=htmlspecialchars($row[3])?></td>
    <td><?=htmlspecialchars($row[4])?></td>
    <td>
        <a href="edit.php?id=<?=$row[0]?>">Edit</a> |
        <a href="delete.php?id=<?=$row[0]?>" onclick="return confirm('Delete this book?');">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php if (empty($books)): ?>
<p>No books found.</p>
<?php endif; ?>

</body>
</html>
