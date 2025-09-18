<?php include 'db.php';
$books = $pdo->query("SELECT * FROM books")->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Library Books</h2>
<table border="1">
<tr>
  <th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Actions</th>
</tr>
<?php foreach ($books as $book): ?>
<tr>
  <td><?= $book['id'] ?></td>
  <td><?= htmlspecialchars($book['title']) ?></td>
  <td><?= htmlspecialchars($book['author']) ?></td>
  <td><?= $book['published_year'] ?></td>
  <td>
    <a href="update.php?id=<?= $book['id'] ?>">Edit</a> | 
    <a href="delete.php?id=<?= $book['id'] ?>" onclick="return confirm('Delete this book?');">Delete</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
<a href="create.php">➕ Add Book</a>
