<?php
session_start();

// 🔹 Step 1: Check if session exists
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
// 🔹 Step 2: If session expired, but cookie exists (Remember Me)
elseif (isset($_COOKIE['remember_me'])) {
    $username = $_COOKIE['remember_me'];
    $_SESSION['username'] = $username; // auto-login again
}
// 🔹 Step 3: If neither session nor cookie → redirect to login
else {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?> 👋</h2>

    <p>You have successfully logged in using 
        <?php 
            echo isset($_COOKIE['remember_me']) ? "Remember Me (cookie)" : "Session"; 
        ?>
    </p>

    <form method="POST" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
