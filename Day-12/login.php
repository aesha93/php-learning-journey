<?php
session_start();
$message = "";

// Hardcoded credentials for demo
$validUser = "aesha";
$validPass = "12345";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $validUser && $password === $validPass) {
        $_SESSION['user'] = $username;   // store in session
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "❌ Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>🔐 Login Page</h2>
    <?php if($message): ?>
        <p style="color:red;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
