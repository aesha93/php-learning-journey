<?php
session_start();

if(!isset($_SESSION['username'])){
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $dir = "uploads/";
    if (!is_dir($dir)) mkdir($dir);
    $target = $dir . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], $target);
    $_SESSION['photo'] = $target;
}

?>
<h3>Welcome, <?php echo $_SESSION['username']; ?>!</h3>

<form method="POST" enctype="multipart/form-data">
    Upload Profile Picture: <input type="file" name="photo" accept="image/*" required>
    <button type="submit">Upload</button>
</form>
<?php if (!empty($_SESSION['photo'])): ?>
    <h4>Your Profile Picture:</h4>
    <img src="<?php echo $_SESSION['photo']; ?>" width="150">
<?php endif; ?>
