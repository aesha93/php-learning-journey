<?php
//php basic
echo "Hello, World!"; // PHP code inside HTML

//php variable
$name = 'Tiya';
$age = 5;
echo "My child $name is $age years old.";

//php_data_types
$productName = "Shoes";
$stock = 50;
$price  = 1999.99;
$isAvailable = true;
$color = ["Red", "Blue"];
var_dump($price);

//php_data_types
$productName = "Shoes";
$stock = 50;
$price  = 1999.99;
$isAvailable = true;
$color = ["Red", "Blue"];
var_dump($price);

//php_arithmetic

$price = 100;
$qty =  3;
$total = $price * $qty;
$discount = $total - 50;

echo $total;
echo "<br>";
echo $discount;

// Comparison Operators

$stock = 0;
if($stock == 0){
    echo "Out of Stock";
}

// Logical Operators

$loggedIn = true;
$isAdmin = false;

if($loggedIn && $isAdmin){
    echo "Welcome Admin";
}else{
    echo "Access Denied";
}

// Assignment Operators

$cartValue = 100;
$cartValue += 50; // 150
$cartValue -= 20; // 130

echo $cartValue;

// Operator Precedence

$result = 10 + 5 * 2; // 20, because * runs before +
$result2 = (10 + 5) * 2; // 30

echo $result;
echo "<br>";
echo $result2;



?>

