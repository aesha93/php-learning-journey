<?php
session_start();
$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $entry = $_POST['entry'];

    // 1. Append entry to diary.txt
    $file = fopen("diary.txt", "a");  // open in append mode
    $date = date("Y-m-d H:i:s");
    fwrite($file, "[$date] $entry\n");
    fclose($file);

    // 2. Handle file upload (image only)
    if (!empty($_FILES['image']['name'])) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . time() . ".$ext");
            $message = "Entry saved with image!";
        } else {
            $message = "❌ Only JPG/PNG files allowed!";
        }
    } else {
        $message = "Entry saved!";
    }
}

// Read past entries
$entries = file_exists("diary.txt") ? file_get_contents("diary.txt") : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personal Diary</title>
</head>
<body>
    <h2>📓 My Personal Diary</h2>

    <?php if($message): ?>
        <p><b><?php echo htmlspecialchars($message); ?></b></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" action="diary.php">
        <textarea name="entry" rows="5" cols="40" placeholder="Write your diary..."></textarea><br><br>
        <input type="file" name="image"><br><br>
        <button type="submit">Save Entry</button>
    </form>

    <h3>🕒 Past Entries:</h3>
    <pre><?php echo htmlspecialchars($entries); ?></pre>
</body>
</html>
