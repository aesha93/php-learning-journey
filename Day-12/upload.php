<?php
if(isset($_FILES['myfile'])){
    $filename = basename($_FILES['myfile']['name']);
    $target = "uploads/" . $filename;

    if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target)){
        echo "File uploaded successfully to " . $target;
    } else {
        echo "Upload failed!";
    }
}
?>
