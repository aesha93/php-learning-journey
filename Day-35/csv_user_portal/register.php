<?php
// Think: Handle form POST
// 1. Check if form submitted
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  if($username && $password){
    // Step 1: Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Step 2: Open CSV in append mode
    $file = fopen('users.csv', 'a');

    // Step 3: Save username + hash as new row
    fputcsv($file, [$username, $hashedPassword]);
    
    fclose($file);

    echo "<p style='color:green;'>User registered successfully!</p>";

  } else {
    echo "<p style='color:red;'>Please fill both fields.</p>";
  }
}
// 2. Sanitize username
// 3. Hash password
// 4. Append to CSV
?>
<h2>Register User</h2>
<form method="post">
  Username: <input type="text" name="username" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <button type="submit">Register</button>
</form>

<p><a href="login.php">Already registered? Login here</a></p>
