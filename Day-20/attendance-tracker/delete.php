<?php
require 'functions.php';
$filename = 'attendance.csv';
$records = readCSV($filename);

$id = $_GET['id'] ?? null;
if ($id === null || !isset($records[$id])) die("Invalid ID.");

// Remove and reindex
unset($records[$id]);
$records = array_values($records);
writeCSV($filename, $records);

header('Location: index.php');
exit;
