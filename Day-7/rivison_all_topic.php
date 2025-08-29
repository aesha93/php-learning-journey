<?php

// =================================================================================
// Part 1: PHP Tags, Variables, Data Types, Constants, and Operators
// =================================================================================
echo "<h1>Part 1: PHP Basics</h1>";

// --- PHP Tags ---

// --- Variables & Data Types ---
$schoolName = "PHP High School"; // String
$classYear = 2024;              // Integer
$averageScore = 85.5;           // Float
$isPassing = true;              // Boolean
$students = [];                 // Array (initialized)
$teacher = null;                // Null

// --- Constants ---
// Constants are defined once and cannot be changed. Good for values that never change, like a passing score.
define("PASSING_SCORE", 60);
define("SCHOOL_MOTTO", "Code, Learn, Repeat!");

echo "<p>Welcome to <strong>$schoolName</strong> (Class of $classYear). Our motto is: " . SCHOOL_MOTTO . "</p>";
echo "<p>The required passing score is: " . PASSING_SCORE . "</p>";

// --- Operators ---
echo "<h3>Operators Showcase</h3>";

$score1 = 80;
$score2 = 95;

// Arithmetic Operators
$totalScore = $score1 + $score2;
$difference = $score2 - $score1;
$product = $score1 * 2;
$division = $score2 / 2;
$modulus = $score2 % $score1; // Remainder of 95 / 80 is 15
echo "<p>Arithmetic: Total of $score1 and $score2 is $totalScore. Modulus is $modulus.</p>";

// Assignment Operators
$currentScore = 70;
$currentScore += 10; // Same as $currentScore = $currentScore + 10; Now it's 80
echo "<p>Assignment: Initial score 70, after adding 10 is now $currentScore.</p>";

// Comparison Operators
$hasPassed = $currentScore >= PASSING_SCORE; // true (80 >= 60)
echo "<p>Comparison: Did the student with score $currentScore pass? " . ($hasPassed ? 'Yes' : 'No') . ".</p>";

// Logical Operators
$hasPerfectAttendance = true;
$isHonorsStudent = $hasPassed && $currentScore > 90; // false (true && false)
$canGoOnTrip = $hasPassed || $hasPerfectAttendance;   // true (true || true)
echo "<p>Logical: Is honors student? " . ($isHonorsStudent ? 'Yes' : 'No') . ". Can go on trip? " . ($canGoOnTrip ? 'Yes' : 'No') . ".</p>";

// Operator Precedence
// Multiplication/Division happens before Addition/Subtraction. Use parentheses () to control the order.
$finalCalc = 10 + 5 * 2; // Result is 20 (5*2 first, then +10)
$finalCalcForced = (10 + 5) * 2; // Result is 30 (10+5 first, then *2)
echo "<p>Precedence: 10 + 5 * 2 = $finalCalc. (10 + 5) * 2 = $finalCalcForced.</p>";


// =================================================================================
// Part 2: Control Structures
// =================================================================================
echo "<h1>Part 2: Control Structures</h1>";

$studentScore = 88;
$grade = '';

// --- If/Else/ElseIf/Ternary ---
if ($studentScore >= 90) {
    $grade = 'A';
} elseif ($studentScore >= 80) {
    $grade = 'B';
} elseif ($studentScore >= 70) {
    $grade = 'C';
} elseif ($studentScore >= 60) {
    $grade = 'D';
} else {
    $grade = 'F';
}
echo "<p>A score of $studentScore gets a grade of: $grade</p>";

// Ternary operator for a quick if/else check
$passStatus = ($studentScore >= PASSING_SCORE) ? "Passed" : "Failed";
echo "<p>The student's status is: <strong>$passStatus</strong>.</p>";

// --- Switch Statement ---
$studentComment = '';
switch ($grade) {
    case 'A':
        $studentComment = "Excellent work!";
        break;
    case 'B':
        $studentComment = "Great job!";
        break;
    case 'C':
        $studentComment = "Good effort, keep it up.";
        break;
    case 'D':
        $studentComment = "Passed, but can improve.";
        break;
    default:
        $studentComment = "Needs significant improvement.";
        break;
}
echo "<p>Teacher's comment: $studentComment</p>";

// --- Loops (For, While, Do-While, ForEach) with Break/Continue ---
echo "<h3>Looping Examples</h3>";

// For Loop: Print numbers 1 to 5
echo "<p>For loop (1-5): ";
for ($i = 1; $i <= 5; $i++) {
    echo "$i ";
}
echo "</p>";

// While Loop: Countdown from 5
$countdown = 5;
echo "<p>While loop (countdown from 5): ";
while ($countdown > 0) {
    echo "$countdown ";
    $countdown--;
}
echo "</p>";

// Do-While Loop: Always executes at least once
$runOnce = 0;
echo "<p>Do-While loop: ";
do {
    echo "This will always run at least once. ";
    $runOnce++;
} while ($runOnce < 1);
echo "</p>";

// Nested Loops & Break/Continue
echo "<p>Nested loop with break/continue:</p>";
for ($i = 1; $i <= 3; $i++) {
    echo "<strong>Outer loop iteration $i:</strong> ";
    for ($j = 1; $j <= 5; $j++) {
        if ($j == 3) {
            continue; // Skip printing '3'
        }
        if ($j == 5) {
            break; // Stop the inner loop at 5
        }
        echo "$j ";
    }
    echo "<br>";
}

// =================================================================================
// Part 3: Arrays
// =================================================================================
echo "<h1>Part 3: Arrays</h1>";

// --- Indexed Array ---
$subjects = ["Math", "Science", "History", "English"];
echo "<p>Indexed Array (Subjects): " . $subjects[0] . ", " . $subjects[2] . "</p>";

// --- Associative Array ---
$studentA = [
    "name" => "Alice",
    "score" => 92,
    "major" => "Computer Science"
];
echo "<p>Associative Array: Student " . $studentA['name'] . " scored " . $studentA['score'] . ".</p>";

// --- Multidimensional Array (Array of Associative Arrays) ---
$students = [
    ["id" => 101, "name" => "Alice", "score" => 92],
    ["id" => 102, "name" => "Bob", "score" => 78],
    ["id" => 103, "name" => "Charlie", "score" => 55],
];

// --- 2D Associative Array ---
// This is another way to structure a multidimensional array, using keys for the outer array.
$studentGrades = [
    "Alice" => ["math" => 95, "science" => 88],
    "Bob" => ["math" => 82, "science" => 91],
];
echo "<p>2D Associative Array: Bob's science grade is " . $studentGrades['Bob']['science'] . ".</p>";

// --- ForEach Loop (perfect for arrays) ---
echo "<h3>Student Roster:</h3><ul>";
foreach ($students as $student) {
    echo "<li>ID: {$student['id']}, Name: {$student['name']}, Score: {$student['score']}</li>";
}
echo "</ul>";

// --- Array Functions ---
echo "<h3>Array Functions</h3>";

// array_push: Add a new student
array_push($students, ["id" => 104, "name" => "Diana", "score" => 89]);
echo "<p>After pushing Diana:</p><pre>" . print_r($students, true) . "</pre>";

// array_pop: Remove the last student (Diana)
$removedStudent = array_pop($students);
echo "<p>After popping " . $removedStudent['name'] . ":</p><pre>" . print_r($students, true) . "</pre>";

// array_merge: Combine two lists of students
$newStudents = [
    ["id" => 105, "name" => "Eve", "score" => 99]
];
$allStudents = array_merge($students, $newStudents);
echo "<p>After merging new students:</p><pre>" . print_r($allStudents, true) . "</pre>";

// array_keys and array_values
$aliceData = $allStudents[0];
$aliceKeys = array_keys($aliceData);
$aliceValues = array_values($aliceData);
echo "<p>Keys for Alice's data: " . implode(", ", $aliceKeys) . "</p>";
echo "<p>Values for Alice's data: " . implode(", ", $aliceValues) . "</p>";

// array_search: Find the key of a value. Let's find Bob.
// Note: This is tricky in multidimensional arrays. We'll search for a name.
$studentNames = array_column($allStudents, 'name'); // Get a simple array of names
$bobKey = array_search('Bob', $studentNames); // Returns the index: 1
echo "<p>The index for 'Bob' in the student list is: $bobKey.</p>";


// =================================================================================
// Part 4: Functions
// =================================================================================
echo "<h1>Part 4: Functions</h1>";

// --- Function Declaration, Parameters, Return ---
function calculateGrade($score) {
    if ($score >= 90) return 'A';
    if ($score >= 80) return 'B';
    if ($score >= 70) return 'C';
    if ($score >= 60) return 'D';
    return 'F';
}
echo "<p>Function Call: A score of 78 gets grade: " . calculateGrade(78) . "</p>";

// --- Default Parameters ---
function printStudentInfo($student, $withMajor = false) {
    $output = "Student: {$student['name']}, Score: {$student['score']}";
    if ($withMajor && isset($student['major'])) {
        $output .= ", Major: {$student['major']}";
    }
    return $output . ".";
}
echo "<p>Default Param: " . printStudentInfo($studentA) . "</p>";
echo "<p>Default Param (Overridden): " . printStudentInfo($studentA, true) . "</p>";

// --- Variable Arguments (using the spread operator ...) ---
function getAverageScore(...$scores) {
    $total = array_sum($scores);
    $count = count($scores);
    return $count > 0 ? $total / $count : 0;
}
echo "<p>Variable Args: The average of 90, 85, 92, 78 is " . getAverageScore(90, 85, 92, 78) . ".</p>";

// --- Scope (Global, Local, Static) ---
$globalVar = "I am global.";

function testScope() {
    // To use a global variable inside a function, you must declare it with 'global'
    global $globalVar;
    echo "<p>Scope Test (Inside): Accessing global var: '$globalVar'</p>";

    $localVar = "I am local."; // This only exists inside this function
    echo "<p>Scope Test (Inside): Accessing local var: '$localVar'</p>";

    // A static variable persists its value between function calls
    static $staticCounter = 0;
    $staticCounter++;
    echo "<p>Scope Test (Static): This function has been called $staticCounter time(s).</p>";
}
echo "<p>Scope Test (Outside): Accessing global var: '$globalVar'</p>";
testScope();
testScope(); // Call again to see the static counter increment

// --- Anonymous Functions (Closures) ---
// Useful for short, one-time operations, often as callbacks.
$curveAmount = 5;
// The 'use' keyword allows the anonymous function to "close over" and use an external variable.
$curvedScores = array_map(function($student) use ($curveAmount) {
    $student['score'] += $curveAmount;
    return $student;
}, $allStudents);

echo "<p>Anonymous Function: Student scores after a $curveAmount point curve:</p><pre>" . print_r($curvedScores, true) . "</pre>";

// --- Arrow Functions (shorter syntax for anonymous functions) ---
// Find all students who passed using an arrow function with array_filter
$passingStudents = array_filter(
    $allStudents,
    fn($student) => $student['score'] >= PASSING_SCORE
);
echo "<p>Arrow Function: Students who passed:</p><pre>" . print_r($passingStudents, true) . "</pre>";


// =================================================================================
// Part 5: Strings
// =================================================================================
echo "<h1>Part 5: Strings</h1>";

$longString = "Welcome to the PHP programming course!";

// --- String Functions ---
echo "<p>Original String: '$longString'</p>";
echo "<p>strlen (Length): " . strlen($longString) . "</p>";
echo "<p>substr (Substring from index 15): '" . substr($longString, 15) . "'</p>";
echo "<p>strpos (Position of 'PHP'): " . strpos($longString, 'PHP') . "</p>";
echo "<p>str_replace ('PHP' with 'Awesome PHP'): '" . str_replace('PHP', 'Awesome PHP', $longString) . "'</p>";

// --- Concatenation and Interpolation ---
$lang = "PHP";
// Concatenation using the dot (.) operator
$message1 = "We are learning " . $lang . "!";
// Interpolation (only works with double quotes "")
$message2 = "We are learning $lang!";
echo "<p>Concatenation: $message1</p>";
echo "<p>Interpolation: $message2</p>";

// --- Pattern Matching and Validation (Regex) ---
$studentId = "STU-12345";
// Regex to check if ID starts with 'STU-', followed by 5 digits.
$pattern = "/^STU-\d{5}$/";
if (preg_match($pattern, $studentId)) {
    echo "<p>Pattern Matching: Student ID '$studentId' is valid.</p>";
} else {
    echo "<p>Pattern Matching: Student ID '$studentId' is invalid.</p>";
}

// --- Replacement with Regex ---
$comment = "This course is boring and dumb.";
// Replace negative words with 'amazing'
$positiveComment = preg_replace("/boring|dumb/", "amazing", $comment);
echo "<p>Regex Replace: Original comment was '$comment'. New comment is '$positiveComment'.</p>";

// =================================================================================
// Part 6: Challenge
// =================================================================================
echo "<h1>Part 6: Rivison</h1>";

function getTopStudent($students){
    $highscore = 0;
    foreach($students as $student){
        $score = $student['score'];
        if($score > $highscore){
            $highscore = $score;
        }
    }
    $result =  "The top student is {$student['name']} with a score of {$highscore}!";
    return $result;
}

      //  echo "<pre>"; print_r(getTopStudent($students));


function addStudentRemarks($students){
  foreach($students as &$student){
    if($student['score'] > 90){
        $student['remark'] = "Honor Roll";
    }elseif($student['score'] <= PASSING_SCORE){
         $student['remark'] = "Needs Improvement";
    }else{
        $student['remark'] = "Satisfactory";
    }
  }
  return $students;
}

// echo "<pre>";  print_r(addStudentRemarks($students));

// Manually edit the $students array from the solution. Add a new key-value pair, 'status' => 'withdrawn', to one of the students (e.g., Charlie). For the other students, add 'status' => 'active'.

foreach($students as &$student){
    if($student['name'] == 'Charlie'){
        $student['status'] = "withdrawn";
    }else{
        $student['status'] = "active";
    }
}

$newarray = [];
foreach($students as &$student){
    if($student['status'] == 'withdrawn'){
        continue;
    }else{
        $newarray[] = $student;
    }
}

echo "<pre>"; print_r($newarray); 
?>
