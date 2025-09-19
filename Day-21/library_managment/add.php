<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title  = $_POST['title'];
    $author = $_POST['author'];
    $year   = intval($_POST['year']);
    $genre  = $_POST['genre'];

    if ($title && $author && $year && $genre) {
        $stmt = $conn->prepare("INSERT INTO books (title, author, year, genre) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $title, $author, $year, $genre);
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
<head><title>Add Book</title></head>
<body>
<h2>➕ Add New Book</h2>
<form method="POST">
    Title: <input type="text" name="title"><br><br>
    Author: <input type="text" name="author"><br><br>
    Year: <input type="number" name="year"><br><br>
    Genre: <input type="text" name="genre"><br><br>
    <button type="submit">Save</button>
</form>
</body>
</html>
