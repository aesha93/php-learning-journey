<?php
include 'db_connect.php';

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM books WHERE id=$id");
    header("Location: index.php");
    exit();
}

// Fetch books
$result = $conn->query("SELECT * FROM books");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Library</title>
</head>
<body>
<h2>📚 Book Library</h2>
<a href="add.php">➕ Add Book</a>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Genre</th><th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['author']) ?></td>
        <td><?= $row['year'] ?></td>
        <td><?= htmlspecialchars($row['genre']) ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">✏ Edit</a> | 
            <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this book?')">❌ Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
