<?php
session_start();

if(isset($_SESSION['username'])){
    header('Location: welcome.php');
    exit;
}

// Check if form submitted
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $file = fopen('users.csv', 'r');
    $isValid = false;

    while (($data = fgetcsv($file)) !== false) {
        if ($data[0] === $username && password_verify($password, $data[1])) {
            $isValid = true;
            break;
        }

    }
    fclose($file);

    if ($isValid) {
        $_SESSION['username'] = $username;

        if($remember){
            setcookie('remember_me', $username, time() + 86400, '/');
        }

        header('Location: welcome.php');
        exit;
    }else{
        $error = "Invalid username and password.";
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    
    <form method="POST" action="">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        Remember Me: <input type="checkbox" name="remember"><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
