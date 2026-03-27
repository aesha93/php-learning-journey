<?php
session_start();

// --- Simulated user data ---
$users = [
    'aesha@example.com' => password_hash('secret123', PASSWORD_DEFAULT)
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    if (isset($users[$email]) && password_verify($password, $users[$email])) {
        // Create session
        $_SESSION['user_email'] = $email;

        // Create cookie for last login
        setcookie('last_login', date('Y-m-d H:i:s'), time() + 3600, '/');

        // Redirect to dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login Form</h2>
<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
<p style="color:red;"><?php echo $error ?? ''; ?></p>
</body>
</html>
