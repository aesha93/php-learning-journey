<?php
include 'csv_functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $students = readCSV();
    $id = empty($students) ? 1 : max(array_column($students, 'id')) + 1;
    
    $students[] = [
        'id' => $id,
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'course' => $_POST['course'],
        'marks' => $_POST['marks']
    ];
    
    writeCSV($students);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
<h2>Add Student</h2>
<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Course: <input type="text" name="course" required><br><br>
    Marks: <input type="number" step="0.01" name="marks"><br><br>
    <button type="submit">Add</button>
</form>
<a href="index.php">Back</a>
</body>
</html>
