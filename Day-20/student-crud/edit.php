<?php
require 'functions.php';

$filename = 'students.csv';
$error = "";

// Get ID from URL
$id = $_GET['id'] ?? null;
if($id === null){
    die("Invalid ID.");
}

// Read existing students
$students = readCSV($filename);

// Check if student exists
if (!isset($students[$id])) {
    die("Student not found.");
}

$student = $students[$id];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $age   = trim($_POST['age'] ?? '');
    $grade = trim($_POST['grade'] ?? '');


    if ($name === '' || $age === '' || $grade === '') {
        $error = "All fields are required.";
    }elseif(!is_numeric($age)){
        $error = "Age must be a number.";
    }else{
         // Update the student data
        $students[$id] = [$student[0], $name, $age, $grade];

        // Save back to CSV
        writeCSV($filename, $students);

        // Redirect to index
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
  <style>
    form { width: 300px; margin: 40px auto; display: flex; flex-direction: column; gap: 10px; }
    label { font-weight: bold; }
    input[type="text"], input[type="number"] { padding: 5px; }
    .btn { padding: 8px; background: #007bff; color: white; border: none; cursor: pointer; }
    .btn:hover { background: #0069d9; }
    .error { color: red; text-align: center; }
    a { text-align: center; display: block; margin-top: 10px; }
  </style>
</head>
<body>

<h2 style="text-align:center;">✏️ Edit Student</h2>

<?php if ($error): ?>
  <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?= htmlspecialchars($student[1]) ?>" required>

  <label for="age">Age:</label>
  <input type="number" name="age" id="age" value="<?= htmlspecialchars($student[2]) ?>" required>

  <label for="grade">Grade:</label>
  <input type="text" name="grade" id="grade" value="<?= htmlspecialchars($student[3]) ?>" required>

  <button type="submit" class="btn">Update Student</button>
</form>

<a href="index.php">⬅ Back to List</a>

</body>
</html>
