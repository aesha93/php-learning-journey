<!DOCTYPE html>
<html>
<head><title>Quiz</title></head>
<body>
<form method="post">
    <p>1. Capital of India?</p>
    <input type="radio" name="q1" value="Delhi"> Delhi
    <input type="radio" name="q1" value="Mumbai"> Mumbai<br><br>

    <p>2. PHP is a ____ language?</p>
    <input type="radio" name="q2" value="Scripting"> Scripting
    <input type="radio" name="q2" value="Markup"> Markup<br><br>

    <p>3. 2 + 2 = ?</p>
    <input type="radio" name="q3" value="4"> 4
    <input type="radio" name="q3" value="5"> 5<br><br>

    <input type="submit" value="Submit Quiz">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = 0;
    if ($_POST['q1'] === "Delhi") $score++;
    if ($_POST['q2'] === "Scripting") $score++;
    if ($_POST['q3'] === "4") $score++;

    echo "✅ You scored $score / 3";
}
?>
</body>
</html>
