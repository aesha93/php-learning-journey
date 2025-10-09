<?php
// Challenge 1: Student Result Evaluator (if/else, ternary, string functions)

// ⏱️ Time: 15 minutes

// Concepts tested: if/else, elseif, ternary, strlen(), substr(), strpos(), string concatenation/interpolation.

// Task:
// Write a PHP script that:

// Takes a student’s name and marks (out of 100).

// Prints:

// “Excellent” if marks ≥ 80

// “Good” if marks between 50–79

// “Fail” if marks < 50

// If the student name has less than 3 characters, print “Invalid name”.

// Show result using both if/else and ternary operator.

// Example output:

// Student: Aesha Patel
// Marks: 87
// Result: Excellent

$studentname = 'Aesha Patel';
$marks = 87;
    if(isset($studentname)){
        if(strlen($studentname < 3)){
            echo "Invalid name";
        }else{
            echo "Student: ". $studentname. "<br>";
        }
    }
    if(isset($marks)){
        if(isset($marks)){
            echo "Marks: ". $marks. "<br>";
        }
        if($marks >= 80){
            echo "Result: Excellent". "<br>";
        }elseif($marks >= 50 && $marks <= 79){
            echo "Result: Good". "<br>";
        }elseif($marks <= 50){
            echo "Result: Fail". "<br>";
        }
    }
    
//   Challenge 2: Multiplication Table with Skips (loops, break, continue, nested loops)

// Concepts tested: for, foreach, break, continue, nested loops.

// Task:
// Write a script that:

// Prints multiplication tables for numbers 1 to 5 using nested loops.

// Skip printing results for multiples of 5 using continue.

// Stop the loop entirely if the outer number reaches 4 using break.

// Output example:

// Table of 1:
// 1 x 1 = 1
// 1 x 2 = 2
// ...
// Table of 3:
// ...
// Stopped at table of 4

for($i=1; $i<=4; $i++){
    for($j=1; $j <=10; $j++){
        echo $i .'x'. $j .'='. ($i*$j). "<br>";
    }
}

// Challenge 3: Product Price Tracker (arrays + array functions)

// ⏱️ Time: 25 minutes

// Concepts tested:
// Indexed, Associative, Multidimensional, 2D arrays, foreach, array_push, array_merge, array_keys, array_values, array_search


// Task:

// Create a 2D associative array of products like this:

// $products = [
//     ['name' => 'Laptop', 'price' => 55000, 'category' => 'Electronics'],
//     ['name' => 'Shoes', 'price' => 2500, 'category' => 'Fashion'],
//     ['name' => 'Book', 'price' => 450, 'category' => 'Education']
// ];


// Add a new product using array_push().

// Create another array $newArrivals and merge it with $products.

// Print only the product names and prices using foreach.

// Use array_search() to find whether “Book” exists in the list.

// Print all keys and values separately using array_keys() and array_values().

$products = [
    ['name' => 'Laptop', 'price' => 55000, 'category' => 'Electronics'],
    ['name' => 'Shoes', 'price' => 2500, 'category' => 'Fashion'],
    ['name' => 'Book', 'price' => 450, 'category' => 'Education']
];

// Add a new product using array_push().

$products[3]['name'] = 'keyboard';
$products[3]['price'] = 1500;
$products[3]['category'] = 'Electronics';

// Create another array $newArrivals and merge it with $products.

$newArrivals = [4 =>[
    'name' => 'Mouse',
    'price' => 200,
    'category' => 'Electronics'
    ]
];


$products =  array_merge($products, $newArrivals);

echo "<pre>"; print_r($products);

// Print only the product names and prices using foreach.

foreach($products as $product){
    echo "Name:".$product['name'] .'<br>';
    echo "Price:".$product['price'] .'<br>';
    echo '<br>';
}

// Use array_search() to find whether “Book” exists in the list.

 $keydata = array_search("Book", array_column($products, 'name'));
 if ($keydata !== false) {
    echo "Found 'Book' at index: " . $keydata . "<br>";
 }else{
    echo "'Book' not found.". "<br>";
 }


// Challenge 4: Function Power ⚙️ (functions, parameters, return, default, reference)

// ⏱️ Time: 30 minutes

// Concepts tested:
// function, parameters, return, default, variable args, pass by reference

// Task:
// Create a set of PHP functions:

// calculateDiscount($price, $discount = 10) → returns price after discount.

// applyTax(&$price, $taxRate) → modifies original price by adding tax.

// sumAll(...$numbers) → takes variable number of arguments and returns the total.

// Call them in sequence:

// Apply 10% discount.

// Add 8% tax.

// Sum all final prices.

// Print formatted total bill:

// Final total: ₹XXXX.XX

// calculateDiscount($price, $discount = 10) → returns price after discount.

function calculateDiscount($price, $discount = 10){
    $finalprice = $price - $discount;
    return $finalprice;
}


// applyTax(&$price, $taxRate) → modifies original price by adding tax.


function applyTax(&$price, $taxRate){
    $taxamount = $price + $taxRate;
    return $taxamount;
}


// echo "applyTax(&price, taxRate) → modifies original price by adding tax===".applyTax($pricedata,$taxRate). "<br>";

// sumAll(...$numbers) → takes variable number of arguments and returns the total.

function sumAll(...$numbers){
    return array_sum($numbers);
}

// echo sumAll(1, 2, 3, 4,10)."<br>"; 

// Apply 10% discount.

echo calculateDiscount(100). "<br>"; // Defualt parameters

// Add 8% tax
$pricedata = 110;
$taxRate = 8;

echo applyTax($pricedata,$taxRate). "<br>";

// Sum all final prices.

echo sumAll(40, 20, 30, 40,10,25)."<br>"; 

echo "Final total: ₹".sumAll(40, 20, 30, 40,10,25);

// Challenge 5: Data Sanitizer (string, pattern matching, validation, replacement)

// ⏱️ Time: 30 minutes

// Concepts tested:
// strlen, substr, str_replace, preg_match, filter_var, string concatenation, input sanitization.

// Task:
// Write a script to validate and clean user data:

// Input:

// $userData = [
//     'name' => '  <b>Aesha</b> Patel ',
//     'email' => 'aesha@@gmail.com ',
//     'message' => 'Hello!!! I love PHP <script>alert("xss")</script>'
// ];


// Clean it:

// Remove HTML tags.

// Trim spaces.

// Replace multiple “!” with a single “!”.

// Validate email format (show “Invalid Email” if not valid).

// Output clean data:

// Name: Aesha Patel
// Email: Invalid Email
// Message: Hello! I love PHP

$userData = [
    'name' => '  <b>Aesha</b> Patel ',
    'email' => 'aesha@@gmail.com ',
    'message' => 'Hello!!! I love PHP <script>alert("xss")</script>'
];
//Remove HTML tags
$without_html = strip_tags($userData['name']);
echo $without_html. '<br>';

//Trim spaces
$trimmed_text = trim($userData['name']);
echo $trimmed_text. '<br>';

echo "Name: ".$without_html."<br>";
// Validate email format (show “Invalid Email” if not valid).

if (filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Email is valid.". '<br>';
} else {
    echo "Email: Invalid Email". '<br>';
}
// Replace multiple “!” with a single “!”.
$message = "Message: ".str_replace("!!!", "!", $userData['message']);
echo $message. '<br>';




?>