<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title  = $_POST['title'];
    $author = $_POST['author'];
    $year   = $_POST['year'];

    // 📂 Upload directory
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Create folder if not exists
    }

    // 🖼 Handle file upload
    $coverFileName = 'no_cover.png'; // Default placeholder

    if (!empty($_FILES['cover']['name'])) {
        $fileName    = basename($_FILES['cover']['name']);
        $fileTmp     = $_FILES['cover']['tmp_name'];
        $fileSize    = $_FILES['cover']['size'];
        $fileError   = $_FILES['cover']['error'];
        $fileExt     = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png'];

        if (in_array($fileExt, $allowedExts)) {
            if ($fileError === 0) {
                if ($fileSize <= 2 * 1024 * 1024) { // 2 MB limit
                    $newFileName   = uniqid('cover_', true) . '.' . $fileExt;
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
    $sql = "INSERT INTO books (title, author, published_year, cover_image)
            VALUES ('$title', '$author', $year, '$coverFileName')";

    if ($conn->query($sql)) {
        header('Location: index.php');
        exit;
    } else {
        echo "❌ Database Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Book</title></head>
<body>
<h2>Add New Book</h2>
<form method="POST" enctype="multipart/form-data">
    Title: <input type="text" name="title" required><br><br>
    Author: <input type="text" name="author" required><br><br>
    Year: <input type="number" name="year" required><br><br>
    Cover Image: <input type="file" name="cover"><br><br>
    <button type="submit">Add</button>
</form>
</body>
</html>
