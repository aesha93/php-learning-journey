<!DOCTYPE html>
<html>
<head><title>Feedback</title></head>
<body>
<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Message:<br>
    <textarea name="message"></textarea><br><br>
    <input type="submit" value="Send Feedback">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $msg = htmlspecialchars($_POST['message']);

    echo "<h3>Your Feedback</h3>";
    echo "Name: $name <br>Email: $email <br>Message: $msg";
}
?>
</body>
</html>
