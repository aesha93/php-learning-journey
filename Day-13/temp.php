<!DOCTYPE html>
<html>
<head><title>Temperature Converter</title></head>
<body>
<form method="post">
    Enter Temperature: <input type="number" name="temp" step="0.1"><br><br>
    Convert:
    <select name="scale">
        <option value="CtoF">Celsius → Fahrenheit</option>
        <option value="FtoC">Fahrenheit → Celsius</option>
    </select><br><br>
    <input type="submit" value="Convert">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temp = (float) $_POST['temp'];
    $scale = $_POST['scale'];

    if ($scale === "CtoF") {
        $result = ($temp * 9/5) + 32;
        echo "$temp °C = $result °F";
    } else {
        $result = ($temp - 32) * 5/9;
        echo "$temp °F = $result °C";
    }
}
?>
</body>
</html>
