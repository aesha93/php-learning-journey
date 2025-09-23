<?php
require_once 'functions.php';

// Read all contacts from CSV
$contacts = readContacts();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Contacts List</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body { font-family: Arial, sans-serif; max-width:900px; margin:30px auto; padding:0 16px; }
    h1 { font-size:22px; }
    a.button { display:inline-block; padding:6px 12px; background:#4CAF50; color:#fff; text-decoration:none; border-radius:4px; }
    table { width:100%; border-collapse:collapse; margin-top:16px; }
    th, td { border:1px solid #ddd; padding:8px; text-align:left; }
    th { background:#f5f5f5; }
    .actions a { margin-right:8px; text-decoration:none; color:#007BFF; }
  </style>
</head>
<body>

<h1>Contacts</h1>
<p><a href="add.php" class="button">+ Add New Contact</a></p>

<?php if (count($contacts) > 0): ?>
  <table>
    <thead>
      <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($contacts as $c): ?>
        <tr>
          <td><?= htmlspecialchars($c['id']) ?></td>
          <td><?= htmlspecialchars($c['name']) ?></td>
          <td><?= htmlspecialchars($c['email']) ?></td>
          <td class="actions">
            <a href="edit.php?id=<?= urlencode($c['id']) ?>">Edit</a>
            <a href="delete.php?id=<?= urlencode($c['id']) ?>"
               onclick="return confirm('Delete <?= htmlspecialchars(addslashes($c['name'])) ?>?');">
               Delete
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>No contacts found. Click “Add New Contact” to create one.</p>
<?php endif; ?>

</body>
</html>
