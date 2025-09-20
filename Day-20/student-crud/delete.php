<?php
require 'functions.php';

$filename = 'students.csv';

// Get the ID from URL
$id = $_GET['id'] ?? null;
if ($id === null) {
    die("Invalid ID.");
}

// Read existing students
$students = readCSV($filename);

// Check if the student exists
if (!isset($students[$id])) {
    die("Student not found.");
}

// Remove the student from the array
unset($students[$id]);

// Reindex the array to avoid gaps in keys
$students = array_values($students);

// Save the updated array back to CSV
writeCSV($filename, $students);

// Redirect back to the main list
header("Location: index.php");
exit;

?>