<?php
include 'csv_functions.php';

$id = intval($_GET['id']);
$books = readCSV();
$book = null;

foreach ($books as $b) {
    if ($b['id'] == $id) { $book = $b; break; }
}

if (!$book) { die("Book not found"); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($books as &$book) {
        if ($book['id'] == $id) {
            $book['title'] = $_POST['title'];
            $book['author'] = $_POST['author'];
            $book['genre'] = $_POST['genre'];
            $book['price'] = $_POST['price'];
            break;
        }
    }
    writeCSV($books);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
<h2>Edit Book</h2>
<form method="post">
    Title: <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required><br><br>
    Author: <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>" required><br><br>
    Genre: <input type="text" name="genre" value="<?= htmlspecialchars($book['genre']) ?>" required><br><br>
    Price: <input type="number" step="0.01" name="price" value="<?= $book['price'] ?>"><br><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Back</a>
</body>
</html>
