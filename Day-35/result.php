<?php
session_start();

$_SESSION['q2'] = $_POST['q2'] ?? '';

$score = 0;
if ($_SESSION['q1'] === '4') $score++;
if ($_SESSION['q2'] === 'Delhi') $score++;

echo "<h2>🎉 Your Score: $score / 2</h2>";

// Clear session
session_destroy();
?>
