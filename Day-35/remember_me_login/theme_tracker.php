<?php
session_start();

// 🔹 1. Track Session Visits
if (isset($_SESSION['session_visits'])) {
    $_SESSION['session_visits']++;
} else {
    $_SESSION['session_visits'] = 1;
}

// 🔹 2. Handle Theme Selection from POST
if (isset($_POST['theme'])) {
    $theme = $_POST['theme'];
    setcookie('theme', $theme, time() + (7*24*60*60), '/'); // expires in 7 days
    header("Location: " . $_SERVER['PHP_SELF']); // reload page to apply theme
    exit;
}

// 🔹 3. Handle Reset Session Button
if (isset($_POST['reset_session'])) {
    unset($_SESSION['session_visits']);
    header("Location: " . $_SERVER['PHP_SELF']); // reload page after reset
    exit;
}

// 🔹 4. Get current theme from cookie or default to 'light'
if (isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
} else {
    $theme = 'light';
    setcookie('theme', $theme, time() + (7*24*60*60), '/');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personalized Theme & Visit Tracker</title>
</head>
<body style="background-color: <?php echo $theme=='dark'?'#333':'#fff'; ?>; 
             color: <?php echo $theme=='dark'?'#fff':'#000'; ?>;
             font-family: Arial, sans-serif;
             padding: 20px;
             text-align: center;">

    <h2>👋 Welcome, Aesha!</h2>

    <p>Current Theme: <strong><?php echo ucfirst($theme); ?></strong></p>
    <p>Session Visits: <strong><?php echo $_SESSION['session_visits']; ?></strong></p>

    <!-- 🔹 Change Theme Form -->
    <form method="POST" style="margin-bottom: 20px;">
        <label>Select Theme: </label>
        <select name="theme">
            <option value="light" <?php if($theme=='light') echo 'selected'; ?>>Light</option>
            <option value="dark" <?php if($theme=='dark') echo 'selected'; ?>>Dark</option>
        </select>
        <button type="submit">Change Theme</button>
    </form>

    <!-- 🔹 Reset Session Button -->
    <form method="POST">
        <button type="submit" name="reset_session">Reset Session Visits</button>
    </form>

</body>
</html>
