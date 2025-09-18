<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Save to DB with prepared statement
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Registration successful! Please log in.";
        header('Location: login.php');
        exit;
    } else {
        $error = "Username already exists or DB error.";
    }
}
?>
<form method="POST">
    <h2>Register</h2>
    <label>Username:</label>
    <input type="text" name="username" required>
    <br>
    <label>Password:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Register</button>
</form>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
