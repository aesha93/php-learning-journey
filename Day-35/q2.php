<?php
session_start();
$_SESSION['q1'] = $_POST['q1'] ?? '';

?>
<form action="result.php" method="post">
    <h3>2️⃣ What is capital of India?</h3>
    <input type="radio" name="q2" value="Delhi"> Delhi
    <input type="radio" name="q2" value="Mumbai"> Mumbai
    <br><br>
    <button type="submit">Submit</button>
</form>
