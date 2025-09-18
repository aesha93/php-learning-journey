<?php
// start session Authrentication

session_start();

$valid_username = 'admin';
$valid_password = '1234';

// If the form is submited
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username === $valid_username && $password === $valid_password){
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit;
    }else{
        $error = "Invalid username or password.";
    }
}

?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
    username : <input type="text"  name="username" required><br>
    Password : <input type="password" name="password" required><br>
     <button type="submit">Login</button>
</form>
</html>