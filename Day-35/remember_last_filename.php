<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) mkdir($targetDir);
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);

    setcookie('last_uploaded', basename($_FILES['file']['name']), time() + 3600, '/');
}

$lastFile = $_COOKIE['last_uploaded'] ?? 'None';
?>
<h3>Last uploaded file: <?php echo $lastFile; ?></h3>

<form method="POST" enctype="multipart/form-data">
    Upload text file: <input type="file" name="file" accept=".txt" required>
    <button type="submit">Upload</button>
</form>
