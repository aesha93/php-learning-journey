<!DOCTYPE html>
<html>
<head><title>Contact Form</title></head>
<body>
<form method="post">
    Name: <input type ="text" name="name"><br><br>
    Email: <input type="text" name="email"><br><br>
    Message:<br>
    <textarea name="message"></textarea><br><br>
    <input type="submit" value="send">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (empty($name)) {
        $errors[] = "❌ Name is required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "❌ Invalid email format.";
    }

    if (strlen($message) < 10) {
        $errors[] = "❌ Message must be at least 10 characters.";
    }

    if (empty($errors)) {
        echo "<h3>✅ Contact Form Submitted</h3>";
        echo "Name: " . htmlspecialchars($name) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Message: " . htmlspecialchars($message);
    } else {
        foreach ($errors as $e) {
            echo $e . "<br>";
        }
    }
}
?>
</body>
</html>
