<?php
session_start();

$message = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    if($username && $password){
      if($username == 'admin'){
          $_SESSION['role'] = 'admin';
      }
        $file = fopen('users.csv', 'r');
        $found = false;

        while(($data = fgetcsv($file)) !== false){
            if($data[0] === $username){
                $found = true;
                if(password_verify($password, $data[1])){
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = 'user';
                    if($remember){
                        setcookie('username', $username, time() + (86400 * 7), "/");
                    }

                    fclose($file);
                    header("Location: welcome.php");
                    exit;
                }else{
                    $message = "Invalid password!";
                }
            }
        }
        fclose($file);

        if (!$found) {
            $message = "Username not found!";
        }
    }else{
        $message = "Please fill all fields!";
    }
}
// Think: Read from CSV → Match username → Verify password → Start session
?>
<h2>Login</h2>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
<label><input type="checkbox" name="remember"> Remember Me</label><br>
<button type="submit">Login</button>
</form>
<p style="color:red;"><?php echo $message; ?></p>

<p><a href="register.php">New user? Register here</a></p>
