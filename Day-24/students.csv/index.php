<?php
include 'csv_functions.php';

// Delete student
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
    $students = readCSV();
    $students = array_filter($students, fn($s) => $s['id'] != $id);
    if (!empty($students)) {
        writeCSV(array_values($students));
    } else {
        file_put_contents('students.csv', "id,name,email,course,marks\n");
    }
}

// Read all students
$students = readCSV();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Students CSV</title>
</head>
<body>
    <h2>Students</h2>
    <a href="add.php">Add New Student</a>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Marks</th><th>Action</th>
        </tr>
        <?php foreach ($students as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= htmlspecialchars($s['name']) ?></td>
            <td><?= htmlspecialchars($s['email']) ?></td>
            <td><?= htmlspecialchars($s['course']) ?></td>
            <td><?= $s['marks'] ?></td>
            <td>
                <a href="edit.php?id=<?= $s['id'] ?>">Edit</a> |
                <a href="?delete=<?= $s['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
