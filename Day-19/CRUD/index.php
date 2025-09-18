<?php
include 'db.php';

$users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>User List</h2>
<table border="1">
<tr>
     <th>ID</th><th>Name</th><th>Email</th><th>City</th><th>Actions</th>
</tr>
<?php foreach($users as $u):?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= htmlspecialchars($u['name']) ?></td>
    <td><?= htmlspecialchars($u['email']) ?></td>
    <td><?= htmlspecialchars($u['city']) ?></td>
    <td>
        <a href="update.php?id=<?= $u['id'] ?>">Edit</a> | 
        <a href="delete.php?id=<?= $u['id'] ?>" onclick="return confirm('Delete this user?');">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
<a href="create.php">➕ Add User</a>
