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

// session_start();

// $_SESSION['username'] = "Aesha";

// echo "welcome, ".$_SESSION['username'];

// session_destroy();

// $content = file_get_contents('note.txt');
// echo $content;

// Example 2: fopen(), fgets(), and fclose()

// $file = fopen("note.txt", "r");
// if ($file) {
//      while (($line = fgets($file)) !== false) {
//         echo $line . "<br>";
//     }
//     fclose($file);
// }

// $content = file_put_contents("note.txt", "Another line\n", FILE_APPEND);
// echo $content;

// $file = fopen("note.txt", "w"); // "w" = write, overwrites file
// fwrite($file, "This is a new content!");
// fclose($file);

// $file = fopen("note.txt", "w"); // "w" = write, overwrites file
// fwrite($file, "This is a new content!");
// fclose($file);

// session_start(); // must be first thing in the script

// $_SESSION["username"] = "Aesha";
// $_SESSION["role"] = "Admin";

// // echo "Session variables are set.";

// // session_start();
// echo "Username is ". $_SESSION["username"];
// echo "Role is ". $_SESSION["role"];
// $_SESSION["role"] = "Editor"; // change role

// echo "Role is ". $_SESSION["role"];
// // 5. Deleting Session Variables
// // Remove a single variable:


// session_destroy(); // deletes session data from server

// setcookie(name, value, expire, path, domain, secure, httponly);
// setcookie("username", "Aesha", time() + 3600, "/"); 
// // expires in 1 hour
// echo "Cookie is set!";


// if (isset($_COOKIE["username"])) {
//     echo "Welcome back, " . $_COOKIE["username"];
// } else {
//     echo "Hello, Guest!";
// }

// 4. Updating a Cookie

// setcookie("username", "Admin", time() + 3600, "/");

// setcookie("username", "", time() - 3600, "/");
// echo "Cookie deleted!";


// if (isset($_POST["theme"])) {
//     setcookie("theme", $_POST["theme"], time() + (86400 * 30), "/"); // 30 days
// }

// if (isset($_COOKIE["theme"])) {
//     echo "Theme: " . $_COOKIE["theme"];
// } else {
//     echo "Theme: Default";
// }

// $password = "mypassword123";

// $hash = password_hash($password, PASSWORD_DEFAULT);
// echo $hash;

// $input = "mypassword123";
// $hashFromDB = '$2y$10$7hvRY3/0mQ7UQ1Ih0LHrW.n8Q9Lp3rCrk65N7yUtFnPjYd8aVTh3y';

// // if(password_verify($input, $hashFromDB)){
// //     echo "Password is correct!";
// // }else{
// //     echo "Invalid Password!";
// // }

// if (password_needs_rehash($hashFromDB, PASSWORD_DEFAULT)) {
//     $newHash = password_hash($input, PASSWORD_DEFAULT);
//     // store $newHash in DB
// }

// 1. Validate & Sanitize User Input
// $age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
// $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

// $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
// $stmt->execute(['email' => $_POST['email']]);
// $user = $stmt->fetch();

// $hash = password_hash($password, PASSWORD_DEFAULT);
// if (password_verify($password, $hash)) {
//     echo "Valid login";
// }

// Generate token
// $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// // Hidden field

// // Verify
// if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
//     die("CSRF Attack detected!");
// }

// Step 1: Generate CSRF Tokensession_start();

// If token not set, create one
// if (empty($_SESSION['csrf_token'])) {
//     $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
// }
session_start();
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

?>
<form method="post" action="submit_comment.php">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <textarea name="comment"></textarea>
    <button type="submit">Post Comment</button>
</form>

<!-- <form method="post" action="transfer.php">
    <input type="hidden" name="csrf_token" value="<?php //echo $_SESSION['csrf_token']; ?>">
    Amount: <input type="text" name="amount">
    <button type="submit">Transfer</button>
</form> -->


<!-- <form method="post">
  <select name="theme">
    <option value="light">Light</option>
    <option value="dark">Dark</option>
  </select>
  <button type="submit">Save</button>
</form> -->

<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <input type="submit" value="Upload">
</form> -->


<!-- <form method = "POST" enctype="multipart/form-data" action="upload.php">
    <input type="file" name="myfile">
    <button type="submit">Upload</button>
</form> -->

