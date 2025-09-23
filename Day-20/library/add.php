<?php
require 'functions.php';
$filename = 'data.csv';
$books = readCSV($filename);

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
        // 🔑 Generate new ID
        $ids = array_column($books, 0);
        $id = $ids ? max($ids) + 1 : 1;

        // 📌 Add the new book
        $books[] = [$id, $title, $author, $year, $status];
        writeCSV($filename, $books);

        // 🔄 Redirect to index
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
<h2>➕ Add New Book</h2>

<?php if ($error): ?>
<p style="color:red;"><?=htmlspecialchars($error)?></p>
<?php endif; ?>

<form method="post">
    Title: <input type="text" name="title" value="<?=htmlspecialchars($_POST['title'] ?? '')?>"><br><br>
    Author: <input type="text" name="author" value="<?=htmlspecialchars($_POST['author'] ?? '')?>"><br><br>
    Year: <input type="text" name="year" value="<?=htmlspecialchars($_POST['year'] ?? '')?>"><br><br>
    Status:
    <select name="status">
        <option value="Available" <?= (($_POST['status'] ?? '')==='Available')?'selected':''?>>Available</option>
        <option value="Borrowed" <?= (($_POST['status'] ?? '')==='Borrowed')?'selected':''?>>Borrowed</option>
    </select><br><br>
    <button type="submit">Save</button>
</form>

<p><a href="index.php">⬅ Back to Library</a></p>
</body>
</html>
