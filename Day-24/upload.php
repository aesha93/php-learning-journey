<?php
if ($_FILES['myfile']['error'] === UPLOAD_ERR_OK) {
    $target = "uploads/" . basename($_FILES['myfile']['name']);
    move_uploaded_file($_FILES['myfile']['tmp_name'], $target);
    echo "File uploaded successfully!";
} else {
    echo "Upload failed!";
}
?>
