<?php
session_start();
$users = include 'users.php';

$rememberedEmail = $_COOKIE['remember_email'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if(isset($user[$email]) && password_verify($password, $users[$email]['password'])){
        $_SESSSION['user_email'] = $email;
        $_SESSSION['role'] = $users[$email]['role'];
        $_SESSION['last_activity'] = time();

        if($remember){
            setcookie('remember_email', $email, time() + (7 * 24 * 3600 ), '/');
        }

        header('Location: dashboard.php');
        exit;
    }else{
        $error = "Invalid credencials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>🔐 Secure Portal Login</h2>
<form method="POST">
    Email: <input type="email" name="email" value="<?php echo htmlspecialchars($rememberedEmail); ?>" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <label><input type="checkbox" name="remember"> Remember Me</label><br><br>
    <button type="submit">Login</button>
</form>
<p style="color:red;"><?php echo $error ?? ''; ?></p>
</body>
</html>
