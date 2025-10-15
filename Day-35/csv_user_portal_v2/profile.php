<?php
session_start();

// Protect page using session OR cookie fallback
if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$message = '';

// Handle password change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['current_password'], $_POST['new_password'])) {
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];

    // Read all users
    $rows = [];
    $updated = false;
    if (file_exists('users.csv')) {
        $fr = fopen('users.csv', 'r');
        while (($row = fgetcsv($fr)) !== false) {
            if (!isset($row[0], $row[1])) continue;
            // if this is our user, verify current password
            if ($row[0] === $username) {
                if (password_verify($current, $row[1])) {
                    // update hash
                    $row[1] = password_hash($new, PASSWORD_DEFAULT);
                    $updated = true;
                } else {
                    $message = "Current password is incorrect.";
                    // keep the old row unchanged
                }
            }
            $rows[] = $row;
        }
        fclose($fr);

        // If updated, overwrite users.csv with new rows
        if ($updated) {
            $fw = fopen('users.csv', 'w');
            foreach ($rows as $r) {
                fputcsv($fw, $r);
            }
            fclose($fw);
            $message = "Password updated successfully.";
        } elseif ($message === '') {
            $message = "No update performed.";
        }
    } else {
        $message = "User store not found.";
    }
}

?>

<h2>Profile — <?php echo htmlspecialchars($username); ?></h2>
<p>Welcome, <?php echo htmlspecialchars($username); ?>. You can change your password below.</p>

<form method="post">
  Current password: <input type="password" name="current_password" required><br><br>
  New password: <input type="password" name="new_password" required><br><br>
  <button type="submit">Change Password</button>
</form>

<p style="color:green;"><?php echo htmlspecialchars($message); ?></p>

<p><a href="export.php">Export usernames (CSV)</a> | <a href="logout.php">Logout</a></p>
