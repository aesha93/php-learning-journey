<?php
require 'functions.php';
$filename = 'data.csv';
$books = readCSV($filename);

// ✅ Get the ID to delete
$id = $_GET['id'] ?? '';
if ($id === '' || !ctype_digit($id)) {
    die("Invalid book ID.");
}

// 🔍 Find the book
$bookIndex = -1;
$book = null;
foreach ($books as $index => $b) {
    if ($b[0] == $id) {
        $bookIndex = $index;
        $book = $b;
        break;
    }
}

if ($book === null) {
    die("Book not found.");
}

// 🗑 If the user confirmed deletion
if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
    unset($books[$bookIndex]); // remove the book
    $books = array_values($books); // reindex the array
    writeCSV($filename, $books);

    // Redirect back to list
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Book</title>
</head>
<body>
<h2>🗑 Delete Book</h2>
<p>Are you sure you want to delete <strong><?=htmlspecialchars($book[1])?></strong> by <?=htmlspecialchars($book[2])?>?</p>

<form method="post">
    <button type="submit" name="confirm" value="yes">✅ Yes, Delete</button>
    <a href="index.php">❌ Cancel</a>
</form>
</body>
</html>
