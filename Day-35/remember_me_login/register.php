<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === '' || $password === '') {
        $error = "Both fields are required.";
    } else {
        // 🔹 Step 1: Check if username already exists
        $file = fopen('users.csv', 'r');
        $exists = false;
        while (($data = fgetcsv($file)) !== false) {
            if ($data[0] === $username) {
                $exists = true;
                break;
            }
        }
        fclose($file);

        if ($exists) {
            $error = "Username already taken.";
        } else {
            // 🔹 Step 2: Hash password before saving
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // 🔹 Step 3: Append new record to CSV
            $file = fopen('users.csv', 'a');
            fputcsv($file, [$username, $hashedPassword]);
            fclose($file);

            $success = "Registration successful! You can now <a href='login.php'>Login</a>.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register New User</h2>
    <?php
        if (isset($error)) echo "<p style='color:red;'>$error</p>";
        if (isset($success)) echo "<p style='color:green;'>$success</p>";
    ?>

    <form method="POST" action="">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>
