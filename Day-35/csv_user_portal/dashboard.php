<?php
session_start();
// echo "sfs";die();
// echo $_SESSION['username']; die();
if($_SESSION['username'] != 'admin'){
    header("Location: login.php");
}else{
    $csvFile = 'users.csv';
    if (($handle = fopen($csvFile, 'r')) !== FALSE) {
         while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) { 
            ?>
            <table border="1">
                 <tr><?php echo "Username: " . $data[0] . ", Password: " . $data[1]. "<br>"; ?></tr>
            </table>
        <?php }
    }else {
        echo "Error opening the CSV file.";
    }
}
?>
    <a href="logout.php">logout</a>
