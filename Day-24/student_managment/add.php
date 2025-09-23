<?php
include 'db_connect.php';

if($_SERVER['REQUEST_METHOD']  == 'POST'){
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $course = $conn->real_escape_string($_POST['course']);
    $marks = $conn->real_escape_string($_POST['marks']);

    $conn->query("INSERT INTO students (name, email, course, marks) VALUES ('$name','$email','$course',$marks)");
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Students</title>
</head>
<body>
    <h2>Add Students</h2>
    <form method="post">
        Name:<input type="text" name="name" required><br><br>
        Email: <input type="text" name="email"><br><br>
        Course: <input type="text" name="course"><br><br>
        Marks: <input type="number" name="marks"><br><br>
        <button type="submit">Save</button>
    </form>
    <a href="index.php">Back</a>
</body>
</html>
