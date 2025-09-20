<?php
require 'functions.php';
$filename = 'data.csv';
$rows = readCSV($filename);

$id = $_GET['id'] ?? null;
$key = array_search($id, array_column($rows, 0));

if ($key === false) die("Record not found");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $date = $_POST['date'];
    $status = $_POST['status'];
    $rows[$key] = [$id, $name, $date, $status];
    writeCSV($filename, $rows);
    header('Location: index.php');
    exit;
}

list($id,$name,$date,$status) = $rows[$key];
?>
<h2>Edit Attendance</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?=$name?>"><br>
    Date: <input type="date" name="date" value="<?=$date?>"><br>
    Status:
    <select name="status">
        <option value="Present" <?=$status==='Present'?'selected':''?>>Present</option>
        <option value="Absent" <?=$status==='Absent'?'selected':''?>>Absent</option>
    </select><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">⬅ Back</a>
