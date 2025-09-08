<!DOCTYPE html>
<html>
<head><title>Password Strength Checker</title></head>
<body>
<form method="post">
    Enter Password: <input type="password" name="password"><br><br>
    <input type="submit" value="Check Strength">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pwd = $_POST['password'];
    $errors = [];

    if (strlen($pwd) < 8) $errors[] = "At least 8 characters";
    if (!preg_match("/[A-Z]/", $pwd)) $errors[] = "At least 1 uppercase letter";
    if (!preg_match("/[a-z]/", $pwd)) $errors[] = "At least 1 lowercase letter";
    if (!preg_match("/[0-9]/", $pwd)) $errors[] = "At least 1 number";
    if (!preg_match("/[\W]/", $pwd)) $errors[] = "At least 1 special character";

    if (empty($errors)) {
        echo "✅ Strong password!";
    } else {
        echo "❌ Weak password. Missing:<br>" . implode("<br>", $errors);
    }
}
?>
</body>
</html>
