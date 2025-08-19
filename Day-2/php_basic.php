<?php
// //php basic
// echo "Hello, World!"; // PHP code inside HTML

// //php variable
// $name = 'Tiya';
// $age = 5;
// echo "My child $name is $age years old.";

// //php_data_types
// $productName = "Shoes";
// $stock = 50;
// $price  = 1999.99;
// $isAvailable = true;
// $color = ["Red", "Blue"];
// var_dump($price);

// //php_data_types
// $productName = "Shoes";
// $stock = 50;
// $price  = 1999.99;
// $isAvailable = true;
// $color = ["Red", "Blue"];
// var_dump($price);

// //php_arithmetic

// $price = 100;
// $qty =  3;
// $total = $price * $qty;
// $discount = $total - 50;

// echo $total;
// echo "<br>";
// echo $discount;

// // Comparison Operators

// $stock = 0;
// if($stock == 0){
//     echo "Out of Stock";
// }

// // Logical Operators

// $loggedIn = true;
// $isAdmin = false;

// if($loggedIn && $isAdmin){
//     echo "Welcome Admin";
// }else{
//     echo "Access Denied";
// }

// // Assignment Operators

// $cartValue = 100;
// $cartValue += 50; // 150
// $cartValue -= 20; // 130

// echo $cartValue;

// // Operator Precedence

// $result = 10 + 5 * 2; // 20, because * runs before +
// $result2 = (10 + 5) * 2; // 30

// echo $result;
// echo "<br>";
// echo $result2;


// Exercise 1: Shopping Cart Calculation

// Problem:
// A product price is 200. Quantity is 2.
// Define a constant for TAX = 5%.
// Calculate:

// Total price

// Total price after adding TAX

// const TAX_RATE = 0.05;

// $price = 200;
// $qty = 2;

// $subtotal = $price * $qty; // 200 * 2 = 400

// $discount = 50;
// $subtotal -= $discount;    // shorthand for $subtotal = $subtotal - 50

// $finalAmount = $subtotal +($subtotal *TAX_RATE);

// echo "Subtotal after discount: ". $subtotal . "<br>";
// echo "Final amount (after ". (TAX_RATE * 100) . "% tax): ". $finalAmount ."<br>";

// var_dump($price, $qty, $discount, $subtotal, $finalAmount);

// Exercise 2 — Age Check & Equality Types (covers comparison, logical, data types, strict vs loose comparison)

// Problem:
// You receive input $age = "18" (string) and $isCitizen = true (boolean).

// Check if the person is eligible to vote: age >= 18 AND citizen must be true.

// Demonstrate the difference between == and === using $age.

// Code (solution):

// $ageString = "18";
// $isCitizen = true;

// if($ageString == 18){
//     echo "Loose comparison (==) says age equals 18.". "<br>";
// }else{
//         echo "Loose comparison (==) says age NOT equal to 18.". "<br>";
// }

// if ($ageString === 18) {
//     echo "Strict comparison (===) says age equals 18 and same type". "<br>";
// } else {
//     echo "Strict comparison (===) says NOT same type or value (so it's false)". "<br>";
// }

// // Now perform eligibility check: convert to integer or rely on comparison
// $age = (int)$ageString; // explicit cast to integer

// if ($age >= 18 && $isCitizen === true) {
//     echo "Eligible to vote.". "<br>";
// } else {
//     echo "Not eligible to vote.". "<br>";
// }

// // Show types for clarity
// var_dump($ageString, $age, $isCitizen);

// Exercise 3 — Simple Login Attempt Counter (covers constants via define, logical, assignment ++, arrays for types demo, null)

// Problem:
// Simulate a login check using stored credentials. Use define() to store the admin username/password. Track number of attempts with a variable and increment it. Also create a small array variable to demonstrate array data type and set a $note = null.

// Code (solution):

// Stored credentials with define()
// define("ADMIN_USER", "admin");
// define("ADMIN_PASS", "1234");

// // Simulated user input (variables)
// $inputUser = "admin";
// $inputPass = "wrongpass"; // try changing this to "1234" to see success

// // Attempts counter (integer)
// $attempts = 0;

// // Array to show another data type (list of roles)
// $roles = ["guest", "member", "admin"]; // array type

// // Null example
// $note = null;

// // Login check using logical AND and strict comparison
// if ($inputUser === ADMIN_USER && $inputPass === ADMIN_PASS) {
//     echo "Login Successful". "<br>";
// } else {
//     // increment attempts using ++ (assignment family)
//     $attempts++;
//     echo "Login Failed. Attempt number: " . $attempts . "<br>";

//     // boolean check example: lock after 3 tries (comparison + logical)
//     if ($attempts >= 3) {
//         echo "Account temporarily locked." ."<br>";
//     }
// }

// // Show types and values (helpful for beginners)
// var_dump($inputUser, $inputPass, $attempts, $roles, $note);

// Challenge 1 — Celsius ↔ Fahrenheit

// Given a variable $celsius = 25 (number), calculate Fahrenheit using the formula: F = C * 9/5 + 32.

// Use a constant for the 9 and 5 parts or for any fixed value you prefer.

// Print both Celsius and Fahrenheit and show the data types using var_dump.

// What to practice: arithmetic, assignment, constants, precedence (ensure 9/5 is grouped correctly).

// const NUMERATOR = 9;
// const DENOMINATOR = 5;

// $celsius = 25;

// $F = $celsius * (NUMERATOR/DENOMINATOR) + 32;

// var_dump($celsius ,$F);

// Challenge 2 — Even & Multiple Checker

// Given $n = 18, print:

// "Even" if $n is even, else "Odd".

// Additionally print "Multiple of 3" if $n is divisible by 3.

// Use the modulus operator %, comparison and logical operators.

// What to practice: arithmetic %, comparison ==/===, logical operators &&/||, integer data type.

// $n = 18;
// if($n % 2 == 0){
//     echo "Even";
// }else{
//      echo "Odd";
// }

// if($n % 3 == 0){
//     $n *= 3;
// }
// echo $n;

// Challenge 3 — Mini Grade Decision

// Student marks: $m1 = 70; $m2 = 55; $m3 = 80;

// Compute the average. Then:

// If average ≥ 75 → "A"

// Else if average ≥ 60 → "B"

// Else "C"

// Use assignment operators, arithmetic, comparison and logical flow. Print the average with one decimal place (hint: use number_format() or round).

// What to practice: arithmetic average, comparison chains, assignment operators, formatting output, data types (float average).

// $m1 = 70; $m2 = 55; $m3 = 80;

// $average = round(($m1 + $m2 + $m3) / 3);

// echo $average;

// if($average >= 75){
//     $grade = "A";
// }elseif($average >= 60){
//     $grade = "B";
// }else{
//     $grade = "C";
// }
// echo '<br>';
// echo $grade;

// // Write a PHP program to check if a number is divisible by 5.

// // If yes, print "Multiple of 5".

// // If not, print "Not a multiple of 5".

// $number = 25;

// if($number % 5 == 0){
//     echo "Multiple of 5";
// }else{
//     echo "Not a multiple of 5";
// }

// // A student scored 3 subjects:
// // Calculate the average.

// // If average ≥ 90 → "Grade A"
// // If average ≥ 70 and < 90 → "Grade B"
// // Otherwise → "Grade C".

// $maths = 88;  
// $science = 74;  
// $english = 92;  

// $average = round(($maths + $science + $english)/ 3);
// echo $average;
// if($average >= 90){
//     echo "Grade A";
// }elseif($average >= 70 && $average <= 90){
//     echo "Grade B";
// }else{
//     echo "Grade C";
// }

// // Take a number $num = 12;

// // If it’s even, multiply it by 2.

// // If it’s odd, multiply it by 3.
// // Print the final result.

//  $num = 19;

//  if($num % 2 == 0){
//     echo "it’s even";
//     $num *= 2;
//  }else{
//     echo "it’s odd";
//      $num *= 3;
//  }

//  echo $num;

// //🔹 Challenge 1: Age Eligibility with Constants
// // Check:
// // ✅ Eligible if age is between MIN_AGE and MAX_AGE (inclusive)
// // ❌ Otherwise print "Not Eligible"

// define("MIN_AGE", 18);
// define("MAX_AGE", 60);

// $age = 62;
// if($age >= MIN_AGE && $age <= MAX_AGE){
//     echo "Eligible";
// }else{
//     echo "Not Eligible";
// }

// // 🔹 Challenge 2: Discount Condition
// // Rules:
// // If totalPurchase > 1000 OR (totalPurchase > 500 AND isMember is true) → print "Discount Applied"
// // Otherwise → print "No Discount"


// $totalPurchase = 1200;
// $isMember = true;


// if($totalPurchase > 1000 || ($totalPurchase > 500 && $isMember == true)){
//     echo "Discount Applied";
// }else{
//     echo "No Discount";
// }

// // Rules:
// // If totalPurchase > 1000 OR (totalPurchase > 500 AND isMember is true) → print "Discount Applied"
// // Otherwise → print "No Discount"

// // 🔹 Challenge 3: Exam Result
// // Rules:
// // - Pass if (maths >= 35 AND science >= 35 AND english >= 35)
// // - Also pass if (maths + science + english >= 150)
// // - Otherwise → Fail

// $maths = 70;
// $science = 50;
// $english = 45;

// $total = $maths + $science + $english;
// if($maths >=35 && $science >= 35 && $english >= 35 || $total >= 150){
//     echo "Pass";
// }else{
//     echo "Fail";
// }

// 🔹 Challenge 1: Exam Eligibility (Attendance + Marks)
// Rules:

// Student must have attendance ≥ 75%

// OR, if attendance is between 65%–74%, they can still sit if marks ≥ 80

// Otherwise, Not Eligible

// 👉 Write PHP code using &&, ||, and parentheses to check this.

// $attendance = 50;
// $marks = 50;

// if(($attendance >= 75) || ($attendance >= 65 && $attendance <= 74) || ($marks >= 80)){
//     echo "Eligible";
// }else{
//      echo "Not Eligible";
// }

// // 🔹 Challenge 2: Weekend Discount with Exception

// // Rules:

// // Discount applies if it’s Saturday OR Sunday

// // BUT if it’s a holiday flag = true, then No Discount, even if weekend.

// // 👉 Use constants for days (SATURDAY, SUNDAY) and a ! operator for holiday.

// const DAY = 'SATURDAY';
// $holiday = false;

// if($holiday == true && (DAY == 'SATURDAY' || DAY == 'SUNDAY')){
//     echo "No Discount";
// }elseif(!$holiday && (DAY == 'SATURDAY' || DAY == 'SUNDAY')){
//     echo "Apply Discount";
// }else{
//     echo "No Discount";
// }

// // Challenge 3: Valid Login Attempt

// // Rules:

// // Login is valid if username is not empty AND password is not empty

// // OR, if is_guest = true, then login is allowed even if username/password empty

// // Otherwise, login invalid

// // 👉 Use empty(), &&, ||, and !.

// $username = '';
// $password = '';
// $is_guest = true;
// if(!$is_guest && !empty($username) && !empty($password)){
//     echo "Login is valid";
// }elseif($is_guest){
//     echo "Login is valid";
// }else{
//     echo "Login invalid";
// }


// 🔹 Mini Challenge 1: Shop Discount Eligibility

// A shop gives 10% discount if:

// The customer is a member ($isMember = true) OR the purchase amount is greater than or equal to 500.

// 👉 Write PHP code to check if a customer is eligible for discount or not eligible.

$isMember = true;
$amount = 900;

if($isMember === true || $amount >= 500){
    echo "eligible for discount 10%";
}else{
    echo "not eligible";
}

// 🔹 Mini Challenge 2: Exam Qualification

// A student qualifies for the final exam if:

// Attendance is at least 75%, AND

// Either the average marks are 50 or more, OR they have sports quota ($sportsQuota = true).

$attendance = 75;
$averagemark = 50;
$sportsQuota = true;

if($attendance >= 75 && ($averagemark >= 50 || $sportsQuota == true)){
    echo "qualifies";
}else{
    echo "not qualifies";
}
 ?>

