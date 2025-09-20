<?php
require 'functions.php';
$filename = 'data.csv';
$rows = readCSV($filename);

// Filter by date or student name
$filterDate = $_GET['date'] ?? '';
$filterStudent = $_GET['student'] ?? '';
if ($filterDate || $filterStudent) {
    $rows = array_filter($rows, function($row) use($filterDate, $filterStudent){
        return (!$filterDate || $row[2] == $filterDate) &&
               (!$filterStudent || stripos($row[1], $filterStudent) !== false);
    });
}

// Summary counts
$present = count(array_filter($rows, fn($r)=>$r[3]==='Present'));
$absent = count(array_filter($rows, fn($r)=>$r[3]==='Absent'));
?>
<h2>Attendance</h2>
<form method="get">
    Filter Date: <input type="date" name="date" value="<?=htmlspecialchars($filterDate)?>">
    Search Student: <input type="text" name="student" value="<?=htmlspecialchars($filterStudent)?>">
    <button type="submit">Filter</button>
</form>

<p>Summary: ✅ Present = <?=$present?> | ❌ Absent = <?=$absent?></p>

<a href="add.php">➕ Add Attendance</a>
<table border="1" cellpadding="5">
<tr><th>ID</th><th>Name</th><th>Date</th><th>Status</th><th>Actions</th></tr>
<?php foreach ($rows as $row): ?>
<tr>
<td><?=$row[0]?></td>
<td><?=$row[1]?></td>
<td><?=$row[2]?></td>
<td><?=$row[3]?></td>
<td>
    <a href="edit.php?id=<?=$row[0]?>">Edit</a> | 
    <a href="delete.php?id=<?=$row[0]?>" onclick="return confirm('Delete this record?');">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</table>
