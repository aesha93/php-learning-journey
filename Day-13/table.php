<!DOCTYPE html>
<html>
<head><title>Multiplication Table</title></head>
<body>
<form method="post">
    Enter a number: <input type="number" name="num"><br><br>
    <input type="submit" value="Generate Table">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = (int) $_POST['num'];

    if ($num > 0) {
        echo "<h3>Multiplication Table of $num</h3>";
        for ($i = 1; $i <= 10; $i++) {
            echo "$num × $i = " . ($num * $i) . "<br>";
        }
    } else {
        echo "❌ Please enter a positive number.";
    }
}
?>
</body>
</html>
