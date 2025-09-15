<?php
session_start();

$users = [
    'aesha' => '1234',
    'raj' => 'abcd'
];

$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    //check if username exists and password matches

    if(isset($users[$username]) && $users[$username] === $password){
        $_SESSION['user'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!doctype html>
<html>
<head><title>Login</title></head>
<body>
<h1>Login</h1>
<?php if ($error): ?><p style="color:red;"><?php echo $error; ?></p><?php endif; ?>
<form method="post" action="login.php">
    <label>Username: <input type="text" name="username"></label><br><br>
    <label>Password: <input type="password" name="password"></label><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
