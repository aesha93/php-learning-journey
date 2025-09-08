<!DOCTYPE html>
<html>
<head><title>Calculator</title></head>
<body>
<form method="post">
    Number 1: <input type="number" name="x"><br><br>
    Number 2: <input type="number" name="y"><br><br>
    Operation:
    <select name="op">
        <option value="add">+</option>
        <option value="sub">-</option>
        <option value="mul">*</option>
        <option value="div">/</option>
    </select><br><br>
    <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = (float) $_POST['x'];
    $y = (float) $_POST['y'];
    $op = $_POST['op'];

    switch ($op) {
        case "add": echo "Result: " . ($x + $y); break;
        case "sub": echo "Result: " . ($x - $y); break;
        case "mul": echo "Result: " . ($x * $y); break;
        case "div": echo $y != 0 ? "Result: " . ($x / $y) : "❌ Division by zero"; break;
    }
}
?>
</body>
</html>
