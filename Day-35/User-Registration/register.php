<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Write to CSV
    $file = fopen('users.csv', 'a');
    fputcsv($file, [$email, $hashedPassword]);
    fclose($file);

    echo "✅ Registered Successfully! <a href='login.php'>Login Now</a>";
}
?>

<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>
