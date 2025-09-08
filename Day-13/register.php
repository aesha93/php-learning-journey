<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
<form method="post">
    Name: <input type="text" name="name"><br><br>
    Age: <input type="number" name="age"><br><br>
    Gender:
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female<br><br>
    Hobbies:
    <input type="checkbox" name="hobbies[]" value="Reading"> Reading
    <input type="checkbox" name="hobbies[]" value="Music"> Music
    <input type="checkbox" name="hobbies[]" value="Sports"> Sports<br><br>
    <input type="submit" value="Register">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $age = (int) $_POST['age'];
    $gender = $_POST['gender'] ?? "Not selected";
    $hobbies = $_POST['hobbies'] ?? [];

    echo "<h3>Registration Details</h3>";
    echo "Name: $name <br>Age: $age <br>Gender: $gender <br>";
    echo "Hobbies: " . implode(", ", $hobbies);

    if ($age < 18) {
        echo "<br>❌ You must be 18 or older to register.";
    }
}
?>
</body>
</html>
