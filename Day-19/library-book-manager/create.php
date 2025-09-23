<?php include 'db.php'; ?>
<h2>Add New Book</h2>
<form method="POST">
  Title: <input type="text" name="title" required><br>
  Author: <input type="text" name="author" required><br>
  Published Year: <input type="number" name="published_year" required><br>
  <button type="submit">Add Book</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO books (title, author, published_year) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['title'], $_POST['author'], $_POST['published_year']]);
    echo "✅ Book added successfully!";
}
?>
<a href="index.php">⬅ Back to List</a>
