<?php
require 'functions.php';

$filename = 'students.csv';
$error = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $age   = trim($_POST['age'] ?? '');
    $grade = trim($_POST['grade'] ?? '');

    if ($name === '' || $age === '' || $grade === '') {
        $error = "All fields are required.";
    } elseif (!is_numeric($age)) {
        $error = "Age must be a number.";
    } else {
        // Read existing students
        $students = readCSV($filename);

        // Generate a new ID (increment last ID or start at 1)
        $newId = empty($students) ? 1 : end($students)[0] + 1;

        // Add new student to array
        $students[] = [$newId, $name, $age, $grade];

        // Save to CSV
        writeCSV($filename, $students);

        // Redirect back to index
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <style>
    form { width: 300px; margin: 40px auto; display: flex; flex-direction: column; gap: 10px; }
    label { font-weight: bold; }
    input[type="text"], input[type="number"] { padding: 5px; }
    .btn { padding: 8px; background: #28a745; color: white; border: none; cursor: pointer; }
    .btn:hover { background: #218838; }
    .error { color: red; text-align: center; }
    a { text-align: center; display: block; margin-top: 10px; }
  </style>
</head>
<body>

<h2 style="text-align:center;">➕ Add New Student</h2>

<?php if ($error): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" required>

  <label for="age">Age:</label>
  <input type="number" name="age" id="age" required>

  <label for="grade">Grade:</label>
  <input type="text" name="grade" id="grade" required>

  <button type="submit" class="btn">Add Student</button>
</form>

<a href="index.php">⬅ Back to List</a>

</body>
</html>
