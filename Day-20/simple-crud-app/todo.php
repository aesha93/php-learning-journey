<?php
// Simple To-Do CRUD in one file

$filename = 'tasks.txt';

// --- Helper Functions ---
function readTasks($filename) {
    if (!file_exists($filename)) return [];// if file not exist return null
    return array_filter(array_map('trim', file($filename)));//Read all lines from the file, trim whitespace from each line, and filter out empty lines.
}

function writeTasks($filename, $tasks) {
    file_put_contents($filename, implode(PHP_EOL, $tasks) . PHP_EOL);//Join all tasks with line breaks, add a final newline, and write the result into the file (creating or overwriting it).
}

// --- Handle Create ---
if (isset($_POST['new_task']) && $_POST['new_task'] !== '') {
    $tasks = readTasks($filename);
    $tasks[] = $_POST['new_task'];
    writeTasks($filename, $tasks);
    header('Location: todo.php');
    exit;
}

// --- Handle Update ---
if (isset($_POST['edit_id']) && isset($_POST['edited_task'])) {
    $tasks = readTasks($filename);
    $tasks[$_POST['edit_id']] = $_POST['edited_task'];
    writeTasks($filename, $tasks);
    header('Location: todo.php');
    exit;
}

// --- Handle Delete ---
if (isset($_GET['delete'])) {
    $tasks = readTasks($filename);
    unset($tasks[$_GET['delete']]);
    writeTasks($filename, $tasks);
    header('Location: todo.php');
    exit;
}

// --- Display Tasks ---
$tasks = readTasks($filename);
?>

<!DOCTYPE html>
<html>
<head>
  <title>To-Do CRUD</title>
  <style>
    body { font-family: Arial; margin:20px;}
    table { border-collapse: collapse; width: 50%; }
    td, th { border: 1px solid #ddd; padding: 8px; }
    form { display:inline; }
  </style>
</head>
<body>
<h2>To-Do List</h2>

<!-- Create Task -->
<form method="POST">
  <input type="text" name="new_task" placeholder="New task" required>
  <button type="submit">Add</button>
</form>

<table>
  <tr><th>#</th><th>Task</th><th>Actions</th></tr>
  <?php foreach ($tasks as $id => $task): ?>
  <tr>
    <td><?= $id ?></td>
    <td>
      <!-- Inline edit form -->
      <form method="POST">
        <input type="hidden" name="edit_id" value="<?= $id ?>">
        <input type="text" name="edited_task" value="<?= htmlspecialchars($task) ?>" required>
        <button type="submit">Save</button>
      </form>
    </td>
    <td>
      <a href="?delete=<?= $id ?>" onclick="return confirm('Delete this task?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
</body>
</html>
