<!DOCTYPE html>
<html>
<head><title>Background Color</title></head>
<body style="background-color: <?php echo $_POST['color'] ?? 'white'; ?>;">
<form method="post">
    <p>Choose background color:</p>
    <input type="radio" name="color" value="red"> Red
    <input type="radio" name="color" value="green"> Green
    <input type="radio" name="color" value="blue"> Blue<br><br>
    <input type="submit" value="Apply">
</form>
</body>
</html>
