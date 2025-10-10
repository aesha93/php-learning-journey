<?php
session_start();

// Simulated user data
$users = [
    'admin' => password_hash('1234', PASSWORD_DEFAULT)
];

// Auto-login if "remember_me" cookie exists
if (isset($_COOKIE['remember_user'])) {
    $_SESSION['username'] = $_COOKIE['remember_user'];
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION['username'] = $username;

        // Create last login cookie (1 hour)
        setcookie('last_login', date('Y-m-d H:i:s'), time() + 3600, '/');

        // Handle "Remember Me"
        if (!empty($_POST['remember_me'])) {
            setcookie('remember_user', $username, time() + (7 * 24 * 60 * 60), '/'); // 7 days
        } else {
            setcookie('remember_user', '', time() - 3600, '/'); // Delete cookie
        }

        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid username or password!";
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
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="checkbox" name="remember_me" value="1" id="remember_me">
    <label for="remember_me">Remember Me</label><br><br>
    <button type="submit">Login</button>
</form>
<p style="color:red;"><?php echo $error ?? ''; ?></p>
</body>
</html>
