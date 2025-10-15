<?php
session_start();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if ($username === '' || $password === '') {
        $message = "Please fill all fields.";
    } else {
        if (!file_exists('users.csv')) {
            $message = "No users registered.";
        } else {
            $found = false;
            $fr = fopen('users.csv', 'r');
            while (($row = fgetcsv($fr)) !== false) {
                if (!isset($row[0], $row[1])) continue;
                if ($row[0] === $username) {
                    $found = true;
                    if (password_verify($password, $row[1])) {
                        $_SESSION['username'] = $username;
                        if ($remember) {
                            setcookie('username', $username, time() + 86400 * 7, "/");
                        }
                        fclose($fr);
                        header("Location: profile.php");
                        exit;
                    } else {
                        $message = "Invalid password.";
                    }
                }
            }
            fclose($fr);
            if (!$found) $message = "Username not found.";
        }
    }
}
?>

<h2>Login</h2>
<form method="post">
  Username: <input type="text" name="username" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <label><input type="checkbox" name="remember"> Remember Me</label><br><br>
  <button type="submit">Login</button>
</form>

<p style="color:red;"><?php echo htmlspecialchars($message); ?></p>
<p><a href="register.php">Register single user</a> | <a href="import.php">Bulk import</a></p>
