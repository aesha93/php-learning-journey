<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<pre>"; print_r($_POST);
    $title  = $_POST['title'];
    $director = $_POST['director'];
    $release_year = $_POST['release_year'];

    // 📂 Upload directory
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Create folder if not exists
    }

    // 🖼 Handle file upload
    $coverFileName = 'no_cover.png'; // Default placeholder

    if (!empty($_FILES['poster_image']['name'])) {
        $fileName    = basename($_FILES['poster_image']['name']);
        $fileTmp     = $_FILES['poster_image']['tmp_name'];
        $fileSize    = $_FILES['poster_image']['size'];
        $fileError   = $_FILES['poster_image']['error'];
        $fileExt     = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png'];

        if (in_array($fileExt, $allowedExts)) {
            if ($fileError === 0) {
                if ($fileSize <= 2 * 1024 * 1024) { // 2 MB limit
                    $newFileName   = uniqid('poster_image_', true) . '.' . $fileExt;
                    $destination   = $uploadDir . $newFileName;

                    if (move_uploaded_file($fileTmp, $destination)) {
                        $coverFileName = $newFileName;
                    } else {
                        echo "❌ Error: Failed to move uploaded file.";
                    }
                } else {
                    echo "❌ Error: File too large. Max 2MB.";
                }
            } else {
                echo "❌ Error: Upload error code $fileError.";
            }
        } else {
            echo "❌ Error: Invalid file type. Only JPG, JPEG, PNG allowed.";
        }
    }

    // 💾 Insert into database
    $sql = "INSERT INTO movies (title, director, release_year, poster_image)
            VALUES ('$title', '$director', $release_year, '$poster_image')";

    // if ($conn->query($sql)) {
    //     header('Location: index.php');
    //     exit;
    // } else {
    //     echo "❌ Database Error: " . $conn->error;
    // }
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Book</title></head>
<body>
<h2>Add New Movie</h2>
<form method="POST" enctype="multipart/form-data">
    Title: <input type="text" name="title" required><br><br>
    Director: <input type="text" name="director" required><br><br>
    Release Year: <input type="number" name="release_year" required><br><br>
    Poster Image: <input type="file" name="poster_image"><br><br>
    <button type="submit">Add</button>
</form>
</body>
</html>
