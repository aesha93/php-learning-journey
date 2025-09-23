<?php
include 'db_connect.php';
$id = $_GET['id'];

// Get current data
$result = $conn->query("SELECT * FROM books WHERE id=$id");
$book = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title  = $_POST['title'];
    $author = $_POST['author'];
    $year   = $_POST['year'];

    $sql = "UPDATE books SET title='$title', author='$author', published_year=$year WHERE id=$id";
    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Book</title></head>
<body>
<h2>Edit Book</h2>
<form method="POST" enctype="multipart/form-data">
    Title: <input type="text" name="title" value="<?= $book['title']; ?>" required><br><br>
    Author: <input type="text" name="author" value="<?= $book['author']; ?>" required><br><br>
    Year: <input type="number" name="year" value="<?= $book['published_year']; ?>" required><br><br>
    Cover:<input type="file" name="cover">
    <button type="submit">Update</button>
</form>
</body>
</html>
