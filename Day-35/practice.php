<?php

function getMarks($marks){
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
    return "Grade: $grade, Message: $mesage";
}

echo getMarks(91). "<br>";
echo getMarks(75). "<br>";



?>