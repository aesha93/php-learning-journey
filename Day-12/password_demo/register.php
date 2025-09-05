<?php
// Path to user data file
$file = 'users.json';

// Load existing users (if file exists)
$users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// If form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ✅ Hash password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save user
    $users[$username] = $hashedPassword;

    file_put_contents($file, json_encode($users));

    echo "✅ User registered successfully!";
}
?>

<form method="POST">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Register</button>
</form>
