<?php
include 'db_connect.php';

if($_SERVER['REQUEST_METHOD']  == 'POST'){
    $name = $conn->real_escape_string($_POST['name']);
    $department = $conn->real_escape_string($_POST['department']);
    $salary = floatval($_POST['salary']);

    $conn->query("INSERT INTO employees (name, department, salary) VALUES ('$name','$department',$salary)");
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
    <h2>Add Employee</h2>
    <form method="post">
        Name:<input type="text" name="name" required><br><br>
        Department: <input type="text" name="department"><br><br>
        Salary: <input type="number" step="0.01" name="salary"><br><br>
        <button type="submit">Save</button>
    </form>
    <a href="index.php">Back</a>
</body>
</html>
