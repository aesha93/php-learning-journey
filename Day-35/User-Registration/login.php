<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $file = fopen('users.csv', 'r');
    $valid = false;

    while (($data = fgetcsv($file)) !== false) {
        if ($data[0] === $email && password_verify($password, $data[1])) {
            $valid = true;
            break;
        }
    }
    fclose($file);

    if ($valid) {
        $_SESSION['user'] = $email;
        setcookie('last_login', date('Y-m-d H:i:s'), time() + 3600, '/');
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "❌ Invalid credentials!";
    }
}
?>

<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
<p style="color:red;"><?php echo $error ?? ''; ?></p>
