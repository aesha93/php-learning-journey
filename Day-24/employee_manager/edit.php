<?php
include 'db_connect.php';

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM employees WHERE id=$id");
$employee = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $conn->real_escape_string($_POST['name']);
    $department = $conn->real_escape_string($_POST['department']);
    $salary = floatval($_POST['salary']);

    $conn->query("UPDATE employees SET name='$name', department='$department', salary=$salary WHERE id=$id");
    header('Location: index.php');

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h2>Edit Employee</h2>
    <form method="post">
        Name:  <input type="text" name="name" value="<?= htmlspecialchars($employee['name']) ?>" required><br><br>
        Department: <input type="text" name="department" value="<?= htmlspecialchars($employee['department']) ?>"><br><br>
        Salary: <input type="number" step="0.01" name="salary" value="<?= $employee['salary'] ?>"><br><br>
        <button type="submit">Update</button>
    </form>
<a href="index.php">Back</a>
</body>
</html>