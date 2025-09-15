<?php
// upload_file.php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $file = $_FILES['profile'];
    if ($file['error'] === 0) {
        $target = "uploads/" . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $target);
        $_SESSION['profile_pic'] = $target;
        echo "Profile picture uploaded!";
    } else {
        echo "Upload error!";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="profile" required>
    <button type="submit">Upload</button>
</form>
<a href="profile.php">Go to Profile</a>
