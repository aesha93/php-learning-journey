<?php
session_start();
$message = "";

$validUser = "aesha";
$validPass = "12345";

$savedUser = isset($_COOKIE['user']) ? $_COOKIE['user'] : "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if($username === $validUser && $password === $validPass){
        $_SESSION['user'] = $username;

        if ($remember) {
            setcookie("user", $username, time() + (86400 * 7), "/");
        }else{
            setcookie("user", "", time() - 3600, "/");
        }
        header("Location: dashboard.php");
        exit;

    }else{
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
        <!-- auto-fill username from cookie if available -->
        <input type="text" name="username" value="<?php echo htmlspecialchars($savedUser); ?>" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
