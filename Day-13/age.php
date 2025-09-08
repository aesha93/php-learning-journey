<!DOCTYPE html>
<html>
<head><title>Age Calculator</title></head>
<body>
<form method="post">
    Enter Date of Birth: <input type="date" name="dob"><br><br>
    <input type="submit" value="Calculate Age">
</form>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $dob = $_POST['dob'];

    if(!empty($dob)){
        $birthDate = new DateTime($dob);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;

        echo "Your age is: $age years<br>";
        echo ($age < 18) ? "❌ You are a minor." : "✅ You are an adult.";

    }else{
                echo "❌ Please select your date of birth.";
    }
}
?>