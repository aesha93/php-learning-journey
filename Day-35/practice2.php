<?php

$students = [
    "Ayesha" => 91,
    "Rina"   => 75,
    "Karan"  => 58,
    "Vikram" => 82,
    "Nina"   => 67
];

function classStatistics($name, $marks){
    if($marks >= 90 && $marks <= 100){
        $grade = 'A+';
        $mesage ='Excellent';
    }elseif($marks >= 80 && $marks <= 89){
        $grade = 'A';
         $mesage ='Excellent';
    }elseif($marks >= 70 && $marks <= 79){
        $grade = 'B';
        $mesage ='Good, keep improving.';
    }elseif($marks >= 60 && $marks <= 69){
        $grade = 'C';
        $mesage ='Good, keep improving.';
    }elseif($marks < 60){
        $grade = 'Fail';
        $mesage ='Work harder next time.';
    }
   return "Student: $name, Marks: $marks, Grade: $grade, Message: $mesage";
}


$total = 0;
$average = count($students);
$highest =  max($students);
$highestname = array_search($highest, $students);
$lowest =  min($students);
$lowestname = array_search($lowest, $students);
foreach($students as $name => $marks){
   echo classStatistics($name, $marks). "<br>";
    $total += $marks;
    $avg = $total/$average;
}

echo "Class Average: $avg". "<br>";
echo "Highest Marks: $highest (Student: $highestname)". "<br>";
echo "Lowest Marks : $lowest (Student: $lowestname)". "<br>";