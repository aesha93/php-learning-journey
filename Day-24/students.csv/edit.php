<?php
include 'csv_functions.php';

$id = intval($_GET['id']);
$students = readCSV();
$student = null;

foreach ($students as $s) {
    if ($s['id'] == $id) { $student = $s; break; }
}

if (!$student) { die("Student not found"); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($students as &$s) {
        if ($s['id'] == $id) {
            $s['name'] = $_POST['name'];
            $s['email'] = $_POST['email'];
            $s['course'] = $_POST['course'];
            $s['marks'] = $_POST['marks'];
            break;
        }
    }
    writeCSV($students);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
<h2>Edit Student</h2>
<form method="post">
    Name: <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required><br><br>
    Course: <input type="text" name="course" value="<?= htmlspecialchars($student['course']) ?>" required><br><br>
    Marks: <input type="number" step="0.01" name="marks" value="<?= $student['marks'] ?>"><br><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Back</a>
</body>
</html>
