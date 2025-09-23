<?php
require 'functions.php';
$filename = 'data.csv';
$rows = readCSV($filename);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $date = $_POST['date'];
    $status = $_POST['status'];

    if ($name === '' || $date === '' || !in_array($status, ['Present','Absent'])) {
        $error = "All fields required. Status must be Present or Absent.";
    } else {
        $ids = array_column($rows, 0);
        $id = $ids ? max($ids)+1 : 1;
        $rows[] = [$id, $name, $date, $status];
        writeCSV($filename, $rows);
        header('Location: index.php');
        exit;
    }
}
?>
<h2>Add Attendance</h2>
<?php if(!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
<form method="post">
    Name: <input type="text" name="name"><br>
    Date: <input type="date" name="date"><br>
    Status:
    <select name="status">
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
    </select><br>
    <button type="submit">Save</button>
</form>
<a href="index.php">⬅ Back</a>
