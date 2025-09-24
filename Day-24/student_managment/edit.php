<?php
include 'db_connect.php';

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$students = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $course = $conn->real_escape_string($_POST['course']);
    $marks = floatval($_POST['marks']);

    // $conn->query("UPDATE students SET name='$name', email='$email', course='$course'  marks=$marks WHERE id=$id");
          
    $conn->query("UPDATE students SET name='$name', email='$email', course='$course', marks=$marks WHERE id=$id");
    header('Location: index.php');

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit students</title>
</head>
<body>
    <h2>Edit students</h2>
    <form method="post">
        Name:  <input type="text" name="name" value="<?= htmlspecialchars($students['name']) ?>" required><br><br>
        Email: <input type="text" name="email" value="<?= htmlspecialchars($students['email']) ?>"><br><br>
        Course: <input type="text" name="course" value="<?= $students['course'] ?>"><br><br>
        Marks: <input type="number" name="marks" value="<?= $students['marks'] ?>"><br><br>

        <button type="submit">Update</button>
        
    </form>
<a href="index.php">Back</a>
</body>
</html>