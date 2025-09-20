<?php
require 'functions.php';

// Read all students from CSV
$filename = 'inventory.csv';
$students = readCSV($filename);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory Records</title>
  <style>
    table { border-collapse: collapse; width: 60%; margin: 20px auto; }
    th, td { border: 1px solid #999; padding: 8px; text-align: center; }
    th { background-color: #f2f2f2; }
    a { text-decoration: none; color: #0066cc; }
    a:hover { text-decoration: underline; }
    .actions a { margin: 0 5px; }
    .add-btn { display: block; width: 120px; margin: 20px auto; padding: 8px; background: #28a745; color: white; text-align: center; border-radius: 4px; }
  </style>
</head>
<body>

<h2 style="text-align:center;">📋 Inventory Records</h2>

<a href="add.php" class="add-btn">➕ Add Inventory</a>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Grade</th>
    <th>Actions</th>
  </tr>

  <?php if (!empty($students)): ?>
    <?php foreach ($students as $index => $student): ?>
      <tr>
        <td><?= htmlspecialchars($student[0]) ?></td>
        <td><?= htmlspecialchars($student[1]) ?></td>
        <td><?= htmlspecialchars($student[2]) ?></td>
        <td><?= htmlspecialchars($student[3]) ?></td>
        <td class="actions">
          <a href="edit.php?id=<?= $index ?>">✏️ Edit</a>
          <a href="delete.php?id=<?= $index ?>" onclick="return confirm('Delete this record?')">🗑️ Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  <?php else: ?>
    <tr>
      <td colspan="5">No records found.</td>
    </tr>
  <?php endif; ?>
</table>

</body>
</html>
