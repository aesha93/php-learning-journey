<?php
include 'db_connect.php';

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM books WHERE id=$id");
$book = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title  = $_POST['title'];
    $author = $_POST['author'];
    $year   = intval($_POST['year']);
    $genre  = $_POST['genre'];

    if ($title && $author && $year && $genre) {
        $stmt = $conn->prepare("UPDATE books SET title=?, author=?, year=?, genre=? WHERE id=?");
        $stmt->bind_param("ssisi", $title, $author, $year, $genre, $id);
        $stmt->execute();
        header("Location: index.php");
        exit();
    } else {
        echo "⚠ Please fill all fields.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Book</title></head>
<body>
<h2>✏ Edit Book</h2>
<form method="POST">
    Title: <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>"><br><br>
    Author: <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>"><br><br>
    Year: <input type="number" name="year" value="<?= $book['year'] ?>"><br><br>
    Genre: <input type="text" name="genre" value="<?= htmlspecialchars($book['genre']) ?>"><br><br>
    <button type="submit">Update</button>
</form>
</body>
</html>
