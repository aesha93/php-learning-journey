<?php
// $fp = fopen(__DIR__. '/var/products.csv', 'w');
// echo $fp;die();

// fputcsv($fp, ['sku','name','price']);
// fputcsv($fp, ['MB-01','Messenger Bag','45.00']);   
// fputcsv($fp, ['WS-03','Watch','99.00']);
// fclose($fp);

// Opening and Reading a File

// $handle = fopen("example.txt", "r");
// $content = fread($handle, filesize("example.txt"));
// fclose($handle);

// echo $content;

// Writing to a File

// $handle = fopen("example.txt", "w");
// fwrite($handle, "Hello PHP File Handling");
// fclose($handle);

// $content = file_get_contents("example.txt");
//  echo $content;

// Quick Reading with file_get_contents()
//  $content = file_get_contents("example.txt");
// echo $content;

// Quick Writing with file_put_contents()
// file_put_contents("example.txt", "New Content\n", FILE_APPEND);

// File Upload (Basic)

// if(isset($_FILES['file'])){
//     $target = "uploads/". basename($_FILES['file']['name']);
//     if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){
//         echo "File uploaded successfully";
//     }else{
//         echo "File upload failed!";
//     }
// }

//Exercise 1: Reading a File (Full Content)

// "r" → means read-only mode.

// filesize() → tells how many bytes to read.

// fread() → reads that many bytes.

// Always fclose() after finishing.

// $handle = fopen("example.txt", "r");
// $size = filesize("example.txt");
// $content = fread($handle, $size);
// fclose($handle);

// echo "<pre>$content</pre>";      

// Exercise 2: Writing to a File (Overwrite)

// $handle = fopen("notes.txt", "a");
// fwrite($handle, "New content here!\n");
// fclose($handle);

// echo "File Written successfully!";

// $handle = fopen("log.txt", "a");
// fwrite($handle, "New log entry at ". date("Y-m-d H:i:s") . "\n");
// fclose($handle);

// echo "Log updated!";

// Exercise 4: Reading Line by Line

// $handle = fopen("student.txt", "r");

// while(!feof($handle)){
//     $line = fgets($handle);
//     echo "Student: ". trim($line)."<br>";
// }

// fclose($handle);

// Session Management in PHP

session_start();

$_SESSION['username'] = "Aesha";

echo "welcome, ".$_SESSION['username'];

session_destroy();


?>

<!-- <form method = "POST" enctype="multipart/form-data" action="upload.php">
    <input type="file" name="myfile">
    <button type="submit">Upload</button>
</form> -->