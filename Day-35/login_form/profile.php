<?php
session_start();
if(!isset($_SESSION['name'])){
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
      $targetDir = "uploads/";
      if(!is_dir($targetDir))  mkdir($targetDir);
      $targetFile = $targetDir . basename($_FILES['photo']['name']);
      move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile);
      $_SESSION['photo'] = $targetFile;
}  
?>
<h3>Welcome <?php echo $_SESSION['name']; ?>!</h3>
<form method="POST" enctype="multipart/form-data">
    Upload your photo: <input type="file" name="photo" required>
    <button type="submit">Upload</button>
</form>

<?php if (isset($_SESSION['photo'])): ?>
    <h4>Your Profile Picture:</h4>
    <img src="<?php echo $_SESSION['photo']; ?>" width="150">
<?php endif; ?>