<?php
// Opening and Closing Files

// $file = fopen("example2.txt", "w");
// if($file){
//     echo "File opened successfully!";
//     fclose($file);
// }else{
//     echo "Unable to open file!";
// }

// Read Entire File at Once
// echo file_get_contents("example.txt");

// Read Line by Line
// $file = fopen("example.txt", "r");
// while(!feof($file)){
//     echo fgets($file). "<br>";
// }
// fclose($file);

// Read Character by Character
// $file = fopen("example.txt", "r");
// while(!feof($file)){
//     echo fgetc($file);
// }
// fclose($file);

// Read CSV

// $file = fopen("data.csv", "r");
// while(($row = fgetcsv($file)) != false){
//     print_r($row);
// }
// fclose($file);

// Overwrite Content
// file_put_contents("example.txt", "Hello World!");

// Append Content
// file_put_contents("example.txt", " New Line", FILE_APPEND);

// Using fwrite()
// $file = fopen("example.txt", "w");
// fwrite($file, "This overwrites content.\n");
// fclose($file);

// Write CSV
// $data = [
//     ['Name', 'Email'],
//     ['Aesha', 'aesha@example.com'],
// ];
// $file = fopen("users.csv", "w");
// foreach ($data as $row) {
//     fputcsv($file, $row);
// }
// fclose($file);

// Checking, Deleting, and Copying Files
// if(file_exists("example.txt")){
//     echo "File exists.<br>";
//     echo 
// }else{
//     echo "file not found";
// }

// Directory Operations

// mkdir("my_folder");          // Create directory
// $files = scandir(".");       // List files in current directory
// print_r($files);
// rmdir("my_folder");          

// File Metadata
// echo "Last modified: " . date("F d Y H:i:s.", filemtime("example.txt")) . "<br>";
// echo "Absolute path: " . realpath("example.txt");

// File Upload Example
?>