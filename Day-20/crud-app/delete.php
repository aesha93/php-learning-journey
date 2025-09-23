<?php
require 'functions.php';
$filename = 'data.csv';
$rows = readCSV($filename);

$id = $_GET['id'] ?? null;
$newRows = array_filter($rows, fn($r) => $r[0] != $id);

writeCSV($filename, $newRows);
header('Location: index.php');
exit;
?>
