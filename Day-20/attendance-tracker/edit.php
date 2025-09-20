<?php
require 'functions.php';
$filename = 'attendance.csv';
$records = readCSV($filename);

$id = $_GET['id'] ?? null;
if ($id === null || !isset($records[$id])) die("Invalid ID.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    $status = trim($_POST['status']);
    $errors = [];
    if ($name === '' || $date === '') $errors[] = "Name and Date are required.";
    if (!in_array($status, ['Present', 'Absent'])) $errors[] = "Invalid Status.";
    if (empty($errors)) {
        $records[$id] = [$records[$id][0], $name, $date, $status];
        writeCSV($filename, $records);
        header('Location: index.php');
        exit;
    }
}

$current = $records[$id];
?>
<!DOCTYPE html>
<html>
<head><title>Edit Attendance</title></head>
<body>
<h2>Edit Attendance</h2>
<?php if (!empty($errors)) echo "<p style='color:red'>" . implode("<br>", $errors) . "</p>"; ?>
<form method="post">
    Name: <input type="text" name="name" value="<?= htmlspecialchars($current[1]) ?>"><br><br>
    Date: <input type="date" name="date" value="<?= htmlspecialchars($current[2]) ?>"><br><br>
    Status:
    <select name="status">
        <option <?= $current[3]==='Present'?'selected':'' ?> value="Present">Present</option>
        <option <?= $current[3]==='Absent'?'selected':'' ?> value="Absent">Absent</option>
    </select><br><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Back</a>
</body>
</html>
