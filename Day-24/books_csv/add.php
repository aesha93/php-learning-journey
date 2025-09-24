<?php
include 'csv_functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $students = readCSV();
    $id = empty($students) ? 1 : max(array_column($students, 'id')) + 1;
    
    $students[] = [
        'id' => $id,
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'genre' => $_POST['genre'],
        'price' => $_POST['price']
    ];
    
    writeCSV($students);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Books</title>
</head>
<body>
<h2>Add Books</h2>
<form method="post">
    Title: <input type="text" name="title" required><br><br>
    Author: <input type="text" name="author" required><br><br>
    Genre: <input type="text" name="genre" required><br><br>
    Price: <input type="number" step="0.01" name="price"><br><br>
    <button type="submit">Add</button>
</form>
<a href="index.php">Back</a>
</body>
</html>
