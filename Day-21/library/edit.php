<?php
require 'functions.php';
$filename = 'data.csv';
$books = readCSV($filename);

$id = $_GET['id'] ?? '';
if ($id === '' || !ctype_digit($id)) {
    die("Invalid book ID.");
}

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

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title  = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $year   = trim($_POST['year'] ?? '');
    $status = $_POST['status'] ?? '';

    // ✅ Validation
    if ($title === '' || $author === '' || $year === '' || !in_array($status, ['Available','Borrowed'])) {
        $error = "All fields are required. Status must be Available or Borrowed.";
    } elseif (!ctype_digit($year) || (int)$year < 0) {
        $error = "Year must be a valid positive number.";
    } else {
        // ✏ Update the book
        $books[$bookIndex] = [$id, $title, $author, $year, $status];
        writeCSV($filename, $books);

        // 🔄 Redirect
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
<h2>✏ Edit Book (ID: <?=htmlspecialchars($id)?>)</h2>

<?php if ($error): ?>
<p style="color:red;"><?=htmlspecialchars($error)?></p>
<?php endif; ?>

<form method="post">
    Title: <input type="text" name="title" value="<?=htmlspecialchars($_POST['title'] ?? $book[1])?>"><br><br>
    Author: <input type="text" name="author" value="<?=htmlspecialchars($_POST['author'] ?? $book[2])?>"><br><br>
    Year: <input type="text" name="year" value="<?=htmlspecialchars($_POST['year'] ?? $book[3])?>"><br><br>
    Status:
    <select name="status">
        <option value="Available" <?= (($_POST['status'] ?? $book[4])==='Available')?'selected':''?>>Available</option>
        <option value="Borrowed" <?= (($_POST['status'] ?? $book[4])==='Borrowed')?'selected':''?>>Borrowed</option>
    </select><br><br>
    <button type="submit">Update</button>
</form>

<p><a href="index.php">⬅ Back to Library</a></p>
</body>
</html>
