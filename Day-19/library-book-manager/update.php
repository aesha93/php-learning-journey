<?php include 'db.php';
$id = $_GET['id'];
$book = $pdo->prepare("SELECT * FROM books WHERE id=?");
$book->execute([$id]);
$data = $book->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE books SET title=?, author=?, published_year=? WHERE id=?");
    $stmt->execute([$_POST['title'], $_POST['author'], $_POST['published_year'], $id]);
    header("Location: index.php");
}
?>
<h2>Edit Book</h2>
<form method="POST">
  Title: <input type="text" name="title" value="<?= $data['title'] ?>"><br>
  Author: <input type="text" name="author" value="<?= $data['author'] ?>"><br>
  Published Year: <input type="number" name="published_year" value="<?= $data['published_year'] ?>"><br>
  <button type="submit">Update Book</button>
</form>
<a href="index.php">⬅ Back to List</a>
