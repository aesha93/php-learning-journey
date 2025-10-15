<?php
session_start();  // ✅ Start the session first — always first line for session tracking

// 🔹 1. Track Session Visits
if (isset($_SESSION['session_visits'])) {
    $_SESSION['session_visits']++;
} else {
    $_SESSION['session_visits'] = 1;
}

// 🔹 2. Track Total Visits (Cookie)
if (isset($_COOKIE['total_visits'])) {
    $totalVisits = (int)$_COOKIE['total_visits'] + 1;
} else {
    $totalVisits = 1;
}

// Update cookie every time (expires in 7 days)
setcookie('total_visits', $totalVisits, time() + (7 * 24 * 60 * 60), '/');

// 🔹 3. Reset Button
if (isset($_POST['reset_session'])) {
    unset($_SESSION['session_visits']);
    header("Location: " . $_SERVER['PHP_SELF']); // reload page
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Smart Visit Tracker</title>
</head>
<body>
    <h2>👋 Welcome, Aesha!</h2>

    <p>Session Visits: <?php echo $_SESSION['session_visits']; ?></p>
    <p>Total Visits (All Time): <?php echo isset($_COOKIE['total_visits']) ? $_COOKIE['total_visits'] : 1; ?></p>

    <form method="POST">
        <button type="submit" name="reset_session">Reset Session Count</button>
    </form>
</body>
</html>
