<?php
require 'functions.php';
$filename = 'books.csv';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    $status = trim($_POST['status']);
    $records = readCSV($filename);

    // Validation
    $errors = [];
    if ($name === '' || $date === '') $errors[] = "Name and Date are required.";
    if (!in_array($status, ['Present', 'Absent'])) $errors[] = "Invalid Status.";

    if (empty($errors)) {
        $nextId = empty($records) ? 1 : max(array_column($records, 0)) + 1;
        $records[] = [$nextId, $name, $date, $status];
        writeCSV($filename, $records);
        header('Location: index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Book</title></head>
<body>
<h2>Add Book</h2>
<?php if (!empty($errors)) echo "<p style='color:red'>" . implode("<br>", $errors) . "</p>"; ?>
<form method="post">
    Name: <input type="text" name="name"><br><br>
    Date: <input type="date" name="date"><br><br>
    Status:
    <select name="status">
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
    </select><br><br>
    <button type="submit">Save</button>
</form>
<a href="index.php">Back</a>
</body>
</html>
