<!DOCTYPE html>
<html>
<head><title>Guestbook</title></head>
<body>
<form method="post">
    Name: <input type="text" name="name"><br><br>
    Comment:<br>
    <textarea name="comment"></textarea><br><br>
    <input type="submit" value="Add Comment">
</form>
<hr>

<?php
$file = "guestbook.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);

    if (!empty($name) && !empty($comment)) {
        $entry = $name . ": " . $comment . "\n";
        file_put_contents($file, $entry, FILE_APPEND);
    } else {
        echo "❌ Both fields required.<br>";
    }
}

if (file_exists($file)) {
    echo "<h3>Guestbook Entries:</h3>";
    echo nl2br(file_get_contents($file));
}
?>
</body>
</html>
