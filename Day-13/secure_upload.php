<?php
// secure_upload.php
session_start();

if (!isset($_SESSION['logged_in'])) {
    die("Please <a href='login.php'>login</a> first!");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $file = $_FILES['doc'];
    $allowed = ['pdf', 'txt'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

    if (in_array(strtolower($ext), $allowed) && $file['error'] === 0) {
        move_uploaded_file($file['tmp_name'], "uploads/" . $file['name']);
        echo "File uploaded successfully!";
    } else {
        echo "Invalid file type!";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    Upload Document: <input type="file" name="doc" required>
    <button type="submit">Upload</button>
</form>
