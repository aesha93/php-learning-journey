<?php


function getStudentGrades($name, $marks){
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

$students = [
    "Ayesha" => 91,
    "Rina"   => 75,
    "Karan"  => 58,
    "Vikram" => 82,
    "Nina"   => 67
];

foreach($students as $studentname => $mark){
    echo getStudentGrades($studentname, $mark). '<br>';
}