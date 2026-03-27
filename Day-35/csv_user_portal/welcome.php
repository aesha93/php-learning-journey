<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
$photo = "";

// Step 1: Handle File Upload
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $uploadDir = 'uploads/';
    $filename = basename($_FILES['photo']['name']);
    $targetFile = $uploadDir . $filename;

    // Move uploaded file
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
        // Step 2: Update CSV
        $rows = [];
        $file = fopen("users.csv", "r");

        while (($data = fgetcsv($file)) !== false) {
            if ($data[1] == $email) {
                $data[3] = $filename; // update photo column
            }
            $rows[] = $data;
        }

        fclose($file);

        // Step 3: Rewrite CSV
        $file = fopen("users.csv", "w");
        foreach ($rows as $row) {
            fputcsv($file, $row);
        }
        fclose($file);

        echo "<p>Profile picture uploaded successfully!</p>";
    }
}

// Step 4: Display user photo
$file = fopen("users.csv", "r");
while (($data = fgetcsv($file)) !== false) {
    if ($data[1] == $email && isset($data[3])) {
        $photo = $data[3];
        break;
    }
}
fclose($file);
?>

<h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>

<?php if ($photo): ?>
    <img src="uploads/<?php echo htmlspecialchars($photo); ?>" width="100" height="100" alt="Profile Photo"><br>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
    <label>Upload Profile Picture:</label>
    <input type="file" name="photo" accept="image/*" required>
    <button type="submit">Upload</button>
</form>

<br><a href="logout.php">Logout</a>
