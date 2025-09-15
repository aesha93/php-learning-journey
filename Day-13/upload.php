<!DOCTYPE html>
<html>
<head><title>File Upload</title></head>
<body>
 <form method="post" enctype="multipart/form-data">
    Select file: <input type="file" name="myfile"><br><br>
    <input type="submit" value="Upload">
</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
      if (isset($_FILES['myfile'])) {
         $fileName = $_FILES['myfile']['name'];
        $fileSize = $_FILES['myfile']['size'];
        $tmpName = $_FILES['myfile']['tmp_name'];

        if (!is_dir("uploads")) {
            mkdir("uploads");
        }
         $destination = "uploads/" . basename($fileName);
        if (move_uploaded_file($tmpName, $destination)) {
            echo "✅ File uploaded successfully!<br>";
            echo "File Name: $fileName <br>";
            echo "File Size: $fileSize bytes";
        } else {
            echo "❌ File upload failed.";
        }
      }
}
?>   
</body>
</html>