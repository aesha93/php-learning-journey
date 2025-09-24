<?php
include 'db_connect.php';

if(isset($_GET['delete'])){
     $id = intval($_GET['delete']);
     $conn->query("DELETE FROM students WHERE id = $id");
}

//Fetch all employees

$result = $conn->query("SELECT * FROM students");

?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
</head>
<body>
    <h2>Students</h2>
    <a href="add.php">Add New</a>
    <table border="1" cellpadding = "8">
         <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Marks</th><th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= $row['email'] ?></td>
                 <td><?= $row['course'] ?></td>
                <td><?= $row['marks'] ?></td>
                 <td>
                        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                        <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this?')">Delete</a>
                 </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>