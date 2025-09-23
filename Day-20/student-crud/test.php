<?php
require 'functions.php';

$rows = [
    [1, 'Alice', 20, 'A'],
    [2, 'Bob', 22, 'B'],
    [2, 'Max', 20, 'C']
];

// Write
writeCSV('students.csv', $rows);

// Read
$students = readCSV('students.csv');
print_r($students);
?>
