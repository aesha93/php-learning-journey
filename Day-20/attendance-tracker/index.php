<?php
require 'functions.php';
$filename = 'attendance.csv';
$records = readCSV($filename);

$filterDate = $_GET['filter_date'] ?? '';
$searchName = $_GET['search_name'] ?? '';

if (!empty($filterDate)) {
    $records = array_filter($records, fn($r) => $r[2] === $filterDate);
}

if (!empty($searchName)) {
    $records = array_filter($records, fn($r) => stripos($r[1], $searchName) !== false);
}

$presentCount = $absentCount = 0;
foreach ($records as $row) {
    if (strtolower($row[3]) === 'present') $presentCount++;
    elseif (strtolower($row[3]) === 'absent') $absentCount++;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance Tracker</title>
    <style>
        table { border-collapse: collapse; width: 70%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background: #f2f2f2; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
<h2>Attendance Tracker</h2>

<form method="get">
    <label>Date:</label>
    <input type="date" name="filter_date" value="<?= htmlspecialchars($filterDate) ?>">
    <label>Student:</label>
    <input type="text" name="search_name" placeholder="Search by name" value="<?= htmlspecialchars($searchName) ?>">
    <button type="submit">Filter</button>
    <a href="index.php">Clear</a>
</form>

<a href="add.php">➕ Add Attendance</a>

<table>
<tr><th>ID</th><th>Name</th><th>Date</th><th>Status</th><th>Actions</th></tr>
<?php if ($records): foreach ($records as $i => $row): ?>
<tr>
    <td><?= htmlspecialchars($row[0]) ?></td>
    <td><?= htmlspecialchars($row[1]) ?></td>
    <td><?= htmlspecialchars($row[2]) ?></td>
    <td><?= htmlspecialchars($row[3]) ?></td>
    <td>
        <a href="edit.php?id=<?= $i ?>">Edit</a> |
        <a href="delete.php?id=<?= $i ?>" onclick="return confirm('Delete this record?')">Delete</a>
    </td>
</tr>
<?php endforeach; else: ?>
<tr><td colspan="5">No records found.</td></tr>
<?php endif; ?>
</table>

<?php if (!empty($filterDate)): ?>
<p><b>Summary for <?= htmlspecialchars($filterDate) ?>:</b> Present: <?= $presentCount ?>, Absent: <?= $absentCount ?></p>
<?php endif; ?>
</body>
</html>
