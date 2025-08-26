<?php
// $order = [
//     'items' => [
//         ['sku' => 'MH01', 'qty' => 2, 'price' => 1500],
//         ['sku' => 'MH02', 'qty' => 1, 'price' => 1000],
//     ]
// ];

// function order_subtotal($order){
//     $sum = 0;
//     foreach($order['items'] as $item){
//         $sum = $sum + ($item['qty'] * $item['price']);
//     }
//     return $sum;
// }

// $result = order_subtotal($order);
// echo "Subtotal: " . $result;

// $subtotal = 3800;

// function grand_total($subtotal, $shipping = 50 ,$taxRate = 0.18){
//     $tax = $subtotal * $taxRate;
//     return $subtotal + $shipping + $tax;
// }

// // echo "Grand Total (defaults): ". grand_total($subtotal). "<br>";
// // echo "Grand Total (free ship, 5%): " . grand_total($subtotal, 0,0.5). "<br>";
// // echo "Grand Total (free ship, 10%): " . grand_total($subtotal, 0,0.10). "<br>";
// echo "Grand Total (free ship, 20%): " . grand_total(10);


// $p1 = ['sku' => 'MUG01', 'price' => 200];
// $p2 = ['sku' => 'TSHIRT1', 'price' => 499];
// $p3 = ['sku' => 'CAP01', 'price' => 150];

// function sum_product_prices(...$products){
//     $sum = 0;
//     foreach($products as $p){
//         $sum = $sum + $p['price'];
//     }
//     return $sum;
// }

// echo "Sum of prices: " . sum_product_prices($p1, $p2, $p3); // Expected: 849

// $order = [
//     'items' => [
//         ['sku' => 'PRD01', 'qty' => 2, 'price' => 500],
//         ['sku' => 'PRD02', 'qty' => 1, 'price' => 1000],
//     ]
// ];

// function calculate_tax($order, $taxRate = 0.18){
//     $subtotal = 0;
//     foreach($order['items'] as $item){
//         $subtotal += $item['qty'] * $item['price'];
//     }
//     return $subtotal * $taxRate;

// }

// echo "Tax: " . calculate_tax($order); 

// $items = [
//     ['sku' => 'PRD01'],
//     ['sku' => 'PRD02'],
//     ['sku' => 'PRD03'],
// ];

// function process_item($item){
//     static $count = 0;
//     $count++;
//     echo "Processing item: ".$item['sku'] . " (Total processed: $count) "."<br>";
// }
// foreach ($items as $item) {
//     process_item($item);
// }

// $product = ['sku' => 'PRD100', 'price' => 500];

// $discountPercentage = function($price){
//     return $price * 0.90;
// };

// $disountFlat = function($price){
//     return $price - 50;
// }


// $priceAfterPercent = $discountPercent($product['price']);
// $finalPrice = $discountFlat($priceAfterPercent);

// echo "Final Price: " . $finalPrice; // Expected: 400

// $order = [
//     'items' => [
//         ['sku' => 'PRD01', 'qty' => 2, 'price' => 500],
//         ['sku' => 'PRD02', 'qty' => 1, 'price' => 1000],
//     ]
// ];

// function compute_grand_total($order, $shipping = 50, $taxRate = 0.18){
//     $subtotal = 0;
//     foreach($order['items'] as $item){
//         $subtotal += $item['qty'] * $item['price'];
//     }

//     $tax = $subtotal * $taxRate;

//     $grandTotal = $subtotal + $shipping + $tax;

//     return $grandTotal;

// }
// echo "Grand Total: " . compute_grand_total($order); // 1860

// Exercise 2 — Variadic Subtotal for Multiple Orders

// $order1 = ['items' => [['sku'=>'P1','qty'=>1,'price'=>500]]];
// $order2 = ['items' => [['sku'=>'P2','qty'=>2,'price'=>300]]];
// $order3 = ['items' => [['sku'=>'P3','qty'=>1,'price'=>200]]];

// function total_of_orders(...$orders) {
//     $total = 0;
//         foreach ($orders as $order) {
//             $subtotal = 0;
//              foreach ($order['items'] as $item) {
//                          $subtotal += $item['qty'] * $item['price']; // Subtotal for this order
//             }
//               $total += $subtotal;
//         }
//         return $total;
// }
// echo "Combined Subtotal: " . total_of_orders($order1, $order2, $order3); // 1300

// $orderA = ['items' => [['sku'=>'PRD01']]];
// $orderB = ['items' => [['sku'=>'PRD02']]];
// $orderC = ['items' => [['sku'=>'PRD03']]];

// function process_order($order) {
//     static $count = 0; // Remembers across function calls
//     $count++;

//     echo "Processing order: " . $order['items'][0]['sku'] . " (Total processed: $count)"."<br>";
// }

// process_order($orderA);
// process_order($orderB);
// process_order($orderC);

// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 65, "Science" => 72, "English" => 88],
//     ["name" => "Raj",   "Maths" => 45, "Science" => 55, "English" => 60]
// ];

// foreach($students as $student){
// 	$distiction = false;
	
// 	foreach($student as $key => $mark){
// 		if($key != 'name'){
// 			if($mark > 85){
// 			$distiction = true;
// 			}
// 		}
// 	}
// 	if($distiction == true){
// 		echo $student['name']."<br>";
// 	}

// }
// $students = [
//     ["name" => "Avi",   "Maths" => 85, "Science" => 92, "English" => 78],
//     ["name" => "Tiya",  "Maths" => 65, "Science" => 72, "English" => 88],
//     ["name" => "Raj",   "Maths" => 45, "Science" => 55, "English" => 60]
// ];
// $average = 0;
// $count = count($students);
// foreach($students as $student){
// $name = $student['name'];
// 	$total = 0;
// 	foreach($student as $key => $mark){
// 		if($key != 'name'){
// 			$total += $mark;
// 		}
// 	}
// $average = number_format($total/$count, 2);
// 	echo "{$name} average mark is: {$average}"."<br>";
// }

// function is resusable block of code 

// function greet(){
//     echo "Hello, world!";
// }
// greet();

// function sayHello($name = "Guest") {
//     echo "Hello, $name!";
// }

// sayHello();        // Hello, Guest!
// sayHello("Avi");   // Hello, Avi!

// You can pass parameters by name, not just by order.

// function introduce($name, $age, $city){
//     echo "$name is $age years old from $city";
// }

// introduce(age:25, name: "Avi", city:"Ahmedabad");

// Variable Arguments

// function addAll(...$numbers) {
//     $sum = 0;
//     foreach ($numbers as $n) {
//         $sum += $n;
//     }
//     return $sum;
// }

// echo addAll(2, 3, 5); // 10
// echo addAll(1, 2, 3, 4, 5); // 15

// Return Values

// function square($n) {
//     return $n * $n;
// }

// $result = square(5);
// echo $result; // 25



// function sayHello(){
//     echo "Hello, World!";
// }

// sayHello();
// sayHello();

// function greet($name) {
//     echo "Hello, $name!";
// }

// greet("Avi");
// greet("Tiya");

// function add($a, $b){
//     return $a + $b;
// }

// $result = add(5, 7);
// echo $result;

// function greet($name) {
//     echo "Hello, $name!";
// }

// greet("Avi");   // Output: Hello, Avi!
// greet("Tiya");  // Output: Hello, Tiya!


// Example 2: Multiple Parameters

// function add($a, $b) {
//     return $a + $b;
// }

// echo add(10, 20);  // Output: 30
// echo add(5, 7);    // Output: 12

// function greet($name = "Guest") {
//     echo "Welcome, $name!";
// }

// greet("Avi");   // Output: Welcome, Avi!
// greet();        // Output: Welcome, Guest!

// function intro($name, $age) {
//     echo "I am $name, and I am $age years old.";
// }

// intro(age: 25, name: "Avi");  
// Output: I am Avi, and I am 25 years old.

// Example 5: Variable-Length Parameters (…spread operator)

// function sumAll(...$numbers) {
//     return array_sum($numbers);
// }

// echo sumAll(1, 2, 3);        // Output: 6
// echo sumAll(10, 20, 30, 40); // Output: 100

// function add($a, $b){
//     return $a + $b;
// }

// $result = add(5,3);
// echo $result;

// Example 2: No Return (just echo)

// function greet() {
//     echo "Hello!";
// }

// $val = greet(); // This just prints "Hello!" but $val = NULL


// Example 3: Return Early (exit point)
// function checkNumber($num){
//     if($num > 0){
//         return "Positive";
//     }
//     return "Not Positive";
// }

// echo checkNumber(5);
// echo checkNumber(-3);

// Example 4: Returning Arrays

// function getUser(){
//     return["name" => "Avi", "age" => 25];
// }

// $user = getUser();
// echo $user["name"];

// Example 5: Returning Multiple Values (via array)

// function calculate($a, $b){
//     return[$a + $b, $a - $b, $a * $b];
// }

// list($sum, $diff, $prod) = calculate(10, 5);
// echo "Sum: $sum, Diff : $diff, Product: $prod";


// function increaseByValue($num){
//     $num = $num + 10;
//     echo "Inside function: $num <br>";
// }
// $a = 5;
// increaseByValue($a);

// echo "Outside function: $a <br>";


// function increaseByRefrence(&$num){
//     $num = $num + 10;
//     echo "Inside function: $num <br>";
// }

// $a = 5;
// increaseByRefrence($a);
// echo "Outside function: $a <br>";

// function orderCounter(){
//     static $count = 0;
//     $count++;
//     return $count;
// }

// echo orderCounter();
// echo "<br>";
// echo orderCounter(); // 2
// echo "<br>";
// echo orderCounter(); // 3
// echo "<br>";

// $tax = 15;

// $products = [
//     ["name" => "shoes", "price" => 2000],
//     ["name" => "Bag", "price" => 1500],
// ];

// function calculateTotalWithTax($products) {
//     global $tax; // bring global variable into function
//     $total = 0;

//     foreach ($products as $product) {
//         $total += $product['price'];
//     }

//     $totalWithTax = $total + ($total * $tax / 100);
//     return $totalWithTax;
// }

// echo calculateTotalWithTax($products); // 4025

// --- Global tax percentage (global scope) ---

// $tax = 15;

// // --- 1) Static counter: tracks how many orders we've processed ---

// function orderCounter(){
//     static $count = 0;
//     $count++;
//     return $count;
// }

// // --- 2) Calculate subtotal of an order (array of items) ---

// function calculateOrderSubtotal($items){
//     $subtotal = 0;
//     foreach($items as $item){
//             $subtotal += $item['price'] * $item['qty'];
//     }
//     return $subtotal;
// }

// // --- 3) Calculate total including global tax ---

// function calculateTotalWithTax($items){
//     global $tax;
//     $subtotal = calculateOrderSubtotal($items);
//     $totalWithTax = $subtotal + ($subtotal * $tax / 100);
//     return $totalWithTax;
// }

// // --- 4) Greet single customer with default parameter ---
// function greetCustomer($name = "Guest"){
//         return "Welcome, $name!";
// }

// // --- 5) Greet multiple customers (variadic) ---

// function greetCustomers(...$names){
//     foreach($names as $name){
//         if($name === ""){
//             $name = "Guest";
//         }
//         echo greetCustomer($name).PHP_EOL;
//     }
// }

// // --- Sample order data (arrays used as data containers) ---
// $order1 = [
//     ["name" => "T-Shirt", "price" => 500,  "qty" => 2],
//     ["name" => "Jeans",   "price" => 1200, "qty" => 1],
// ];

// $order2 = [
//     ["name" => "Shoes", "price" => 2000, "qty" => 1],
//     ["name" => "Cap",   "price" => 300,  "qty" => 2],
// ];

// // --- Process Order 1 ---
// echo "Processing Order 1" . "<br>";
// echo "Order count: " . orderCounter() . "<br>";
// echo "Subtotal: " . calculateOrderSubtotal($order1) . "<br>";
// echo "Total with tax: " . calculateTotalWithTax($order1) . "<br><br>";
// greetCustomers("John"); // single name via variadic function

// echo PHP_EOL; // blank line

// // --- Process Order 2 ---
// echo "Processing Order 2" . "<br>";
// echo "Order count: " . orderCounter() . "<br>";
// echo "Subtotal: " . calculateOrderSubtotal($order2) . "<br>";
// echo "Total with tax: " . calculateTotalWithTax($order2) . "<br><br>";
// greetCustomers(""); // empty string -> should greet Guest


// Exercise 1 – Filter Products Above a Minimum Price
// Task:Write a function filterByPrice($products, $minPrice)

// $products = [
//     ["sku" => "P100", "name" => "Shirt", "price" => 500],
//     ["sku" => "P200", "name" => "Jeans", "price" => 1200],
//     ["sku" => "P300", "name" => "Cap",   "price" => 200],
// ];

// function filterByPrice($products, $minPrice){
//     $result = [];
//     foreach($products as $product){
//         if($product['price'] >= $minPrice){
//             $result[] = $product;
//         }
//     }
//     return $result;
// }

// $filtered = filterByPrice($products, 500);
// echo "<pre>"; print_r($filtered);

// Exercise 2 – Order Subtotal & Tax (Functions Calling Each Other)
// Write calculateSubtotal($items) that returns subtotal.
// Write calculateTotalWithTax($items, $taxPercent) that calls calculateSubtotal() and adds tax.

// $orderItems = [
//     ["name" => "Bag", "price" => 1500, "qty" => 1],
//     ["name" => "Shoes", "price" => 2000, "qty" => 2],
// ];

// function calculateSubtotal($items){
//     $subtotal = 0;
//     foreach($items as $item){
//         $subtotal += $item['price'] * $item['qty'];
//     }
//     return $subtotal;
// }

// function calculateTotalWithTax($items, $taxPercent){
//     $subtotal = calculateSubtotal($items); // function calls another
//     $taxAmount = $subtotal * $taxPercent / 100;
//     return $subtotal + $taxAmount;

// }

// echo "Subtotal: " . calculateSubtotal($orderItems) . PHP_EOL;
// echo "Total with Tax: " . calculateTotalWithTax($orderItems, 10) . PHP_EOL;

// $shippingMethods = [
//     ["code" => "flatrate", "title" => "Flat Rate", "cost" => 50],
//     ["code" => "freeship", "title" => "Free Shipping", "cost" => 0],
//     ["code" => "express",  "title" => "Express", "cost" => 150],
// ];

// function getFreeShippingMethods($methods){
//     $free = [];
//     foreach($methods as $method){
//         if($method['cost'] == 0){
//             $free[] = $method;
//         }
//     }
//     return $free;
// }

// $freeMethods = getFreeShippingMethods($shippingMethods);
// print_r($freeMethods);

// $productsdata = [
//     ["name" => "Bag", "sku" => "bag", "price" => 100.00],
//     ["name" => "Pencil", "sku" => "Pencil", "price" => 5.00],
//     ["name" => "Eraser", "sku" => "eraser", "price" => 3.00],
// ];

// function getExpensiveProducts($products, $limit){
//      $newproduct = [];
//     foreach($products as $product){
//         if($product['price'] > $limit){  // <-- use '>'
//              $newproduct[] = $product;
//         }
//     }
//        return $newproduct;
// }
// $limitdata = 10;
// $limitprice = getExpensiveProducts($productsdata, $limitdata);
// echo "<pre>"; print_r($limitprice);

// // Challenge 2 – Orders With Free Shipping

// // Input: Array of orders, each with id, items, and shipping_cost.

// // Task: Write getOrdersWithFreeShipping($orders) that returns all orders where shipping_cost = 0.

// $orders = [
//     ["id" => "0001", "item" => "bag", "shipping_cost" => "10"],
//     ["id" => "0002", "item" => "lunch-box", "shipping_cost" => "0"],
//     ["id" => "0003", "item" => "water-bottlle", "shipping_cost" => "0"]
// ];


// function getOrdersWithFreeShipping($orders){
//     $shipping = [];
//     foreach($orders as $order){
//         if($order['shipping_cost'] == "0"){
//             $shipping[] = $order;
//         }
//     }
//     return $shipping;
// }

// $shipping_cost = getOrdersWithFreeShipping($orders);
//                     echo "<pre>"; print_r($shipping_cost);

// Challenge 3 – Order Summary Function

// Input: Array of order items (with price & qty).

// Task: Write a function getOrderSummary($items, $taxPercent) that returns an array:

// [
//   "subtotal" => X,
//   "tax" => Y,
//   "grand_total" => Z
// ]


// Expected: One associative array containing all three values.

// $orders = [
//     ["price" => 100, "item" => "bag", "qty" => 2],
//     ["price" => 200, "item" => "lunch-box", "qty" => 2],
//     ["price" => 150, "item" => "water-bottlle", "qty" => 4]
// ];
// $taxPercent = 10;

// function getOrderSummary($orders, $taxPercent){
//     $subtotal = 0;

//     // 1) Calculate subtotal for all items
//     foreach($orders as $item){
//         $subtotal += $item['price'] * $item['qty'];
//     }

//     // 2) Calculate tax
//     $tax = ($subtotal * $taxPercent) / 100;

//     // 3) Calculate grand total
//     $grand_total = $subtotal + $tax;

//     // 4) Return as one associative array
//     return [
//         "subtotal" => $subtotal,
//         "tax" => $tax,
//         "grand_total" => $grand_total
//     ];
// }

// // Test
// $summary = getOrderSummary($orders, $taxPercent);
// echo "<pre>"; print_r($summary);


// Higher-Order Functions (Functions as Arguments)

// $products = [
//     ["name" => "Bag", "price" => 100],
//     ["name" => "Shoes", "price" => 200],
// ];

// function processItems($items, $callback){
//     $result = [];
//     foreach($items as $item){
//         $result[] = $callback($item); 
//     }
//     return $result;
// }

// // Callback function to apply a discount
// function applyDiscount($product){
//     $product['price'] = $product['price'] * 0.9;
//     return $product;
// }

// $discountedProducts = processItems($products, 'applyDiscount');
// echo "<pre>"; print_r($discountedProducts);


// Complex Data Transformations

// Operations like filtering, mapping, and sorting using functions, instead of writing repetitive loops.

// Examples in beginner-friendly steps:

// a) Filtering Products > 150

$products = [
    ["name" => "Bag", "price" => 100],
    ["name" => "Shoes", "price" => 200],
];

// // Complex Data Transformations

// a) Filtering Products > 150
function filterExpensive($product){
    return $product['price'] > 150;
}

$expensive = array_filter($products, 'filterExpensive');
print_r($expensive);

// b) Mapping to Apply Discount

$discounted = array_map('applyDiscount', $products);
print_r($discounted);

?>