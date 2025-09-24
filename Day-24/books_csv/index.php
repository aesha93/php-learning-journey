<?php
include 'csv_functions.php';

// Delete student
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
    $books = readCSV();
    $books = array_filter($students, fn($s) => $s['id'] != $id);
    if (!empty($books)) {
        writeCSV(array_values($books));
    } else {
        file_put_contents('books.csv', "id,title,author,genre,price\n");
    }
}

// Read all students
$books = readCSV();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Books CSV</title>
</head>
<body>
    <h2>Books</h2>
    <a href="add.php">Add New Book</a>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th><th>Title</th><th>Author</th><th>Genre</th><th>Price</th><th>Action</th>
        </tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?= $book['id'] ?></td>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td><?= htmlspecialchars($book['genre']) ?></td>
            <td><?= $book['price'] ?></td>
            <td>
                <a href="edit.php?id=<?= $book['id'] ?>">Edit</a> |
                <a href="?delete=<?= $book['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
