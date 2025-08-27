<?php
// $products = [
//     ['name' => 'Gaming Laptop', 'price' => 1200],
//     ['name' => 'Wireless Mouse', 'price' => 50],
//     ['name' => 'Mechanical Keyboard', 'price' => 100]
// ];

// foreach($products as $product){
//     $preview = substr($product['name'], 0, 5)."...";
//     echo $preview. "<br>";
// }

// $products = [
//     ['name' => 'Gaming Laptop', 'price' => 1200],
//     ['name' => 'Wireless Mouse', 'price' => 50],
//     ['name' => 'Office Laptop', 'price' => 900]
// ];

// foreach($products as &$product){
//     if(strpos($product['name'], "Laptop") !== false){
//         $product['name'] = "[DISCOUNT] " . $product['name'];
//     }
// }
// unset($product);
// echo "<pre>"; print_r($products);


// $orders = [
//     ['id' => 101, 'shipping' => 'Standard'],
//     ['id' => 102, 'shipping' => 'Express'],
//     ['id' => 103, 'shipping' => 'Overnight']
// ];

// foreach ($orders as $order) {
//     if (strpos($order['shipping'], "Express") !== false) {
//         echo "Order " . $order['id'] . " uses Express shipping.\n";
//     }
// }

// $products = ['name' => 'Laptop Pro'];
// $products['name'] = str_replace("Pro" ,"Professional" ,$products['name']);
// echo "<pre>"; print_r($products);

// Challenge 2 Solution: Order IDs with "Priority" Shipping

// $orders = [
//     ['id' => 101, 'shipping' => 'Standard'],
//     ['id' => 102, 'shipping' => 'Priority Express'],
//     ['id' => 103, 'shipping' => 'Priority Overnight'],
//     ['id' => 104, 'shipping' => 'Standard']
// ];

// $orderIDs = "";

// foreach($orders as $order){
//     if(strpos($order['shipping'], "Priority") !== false){
//         if($orderIDs !== ''){
//                         $orderIDs .= ",";
//         }
//          $orderIDs .= $order['id']; // Add order ID
//     }
// }

// echo "Orders with Priority shipping: $orderIDs";

// $skus = ["VIP123", "REG456", "VIP789"];

// foreach($skus as $sku){
//     if(strpos($sku,"VIP") !== false){
//         echo "SKU $sku is special"."<br>";
//     }
// }

// Step 1: Basic String Handling (Beginner Level)
// Concepts Covered in Step 1

// String concatenation (.)

// String interpolation ("$var")

// strlen() → string length

// substr() → substring extraction

// strpos() → find a substring

// str_replace() → replace substring

// // Exercise 1: Product Name Preview
// Task:
// You have a list of products. Show only the first 4 letters of each product name followed by "...".

// $products = [
//     ['name' => 'Gaming Laptop', 'price' => 1200],
//     ['name' => 'Wireless Mouse', 'price' => 50],
//     ['name' => 'Mechanical Keyboard', 'price' => 100]
// ];

// foreach($products as $product){
//     $preview = substr($product['name'], 0,4). "...";
//     echo $preview. "<br>";
// }

// Exercise 2: Highlight Discount Products
    // Task:
    // Add "[DISCOUNT]" to product names that contain "Laptop".

// $products = [
//     ['name' => 'Gaming Laptop', 'price' => 1200],
//     ['name' => 'Wireless Mouse', 'price' => 50],
//     ['name' => 'Office Laptop', 'price' => 900]
// ];

// foreach ($products as &$product) {
//     if (strpos($product['name'], "Laptop") !== false) {
//         $product['name'] = "[DISCOUNT] " . $product['name'];
//     }
// }
// unset($product);

// echo "<pre>"; print_r($products);


// Exercise 3: Check Shipping Method

// Task:
// Print a message for all orders using "Express" shipping

// $orders = [
//     ['id' => 101, 'shipping' => 'Standard'],
//     ['id' => 102, 'shipping' => 'Express'],
//     ['id' => 103, 'shipping' => 'Overnight']
// ];

// foreach($orders as $order){
//     if(strpos($order['shipping'], "Express") !== false){
//         echo "order {$order['id']} uses Express shipping"."<br>";
//     }
// }

// $products = [
//     ['name' => 'Laptop Pro', 'price' => 1200],
//     ['name' => 'Camera Pro', 'price' => 500],
//     ['name' => 'Phone', 'price' => 700]
// ];


// foreach($products as &$product){
//     if(strpos($product['name'], "Pro") !== false){
//         $product['name'] = str_replace("Pro", "Professional", $product['name']);
//     }
// }
// unset($product);

// echo "<pre>"; print_r($products);

// Challenge 2: List of VIP SKUs (Comma-Separated String)

// $skus = ["VIP123", "REG456", "VIP789", "BASIC001"];

// $vipSkus = "";

// foreach ($skus as $sku) {
//         if (strpos($sku, "VIP") !== false) {
//             if ($vipSkus !== "") {
//             $vipSkus .= ","; // Add comma if not first SKU
//         }
//         $vipSkus .= $sku;
//         }
// }
// echo "VIP SKUs: $vipSkus";

// Challenge 3: Product Name Preview for "Mouse" Products

// $products = [
//     ['name' => 'Wireless Mouse', 'price' => 50],
//     ['name' => 'Gaming Laptop', 'price' => 1200],
//     ['name' => 'Mouse Pad', 'price' => 15]
// ];
// foreach ($products as $product) {
//     if (strpos($product['name'], "Mouse") !== false) {
//         echo substr($product['name'], 0, 3) . "...<br>";
//     }
// }

// $orders = [
//     ['id' => 101, 'shipping' => 'Standard'],
//     ['id' => 102, 'shipping' => 'Priority Express'],
//     ['id' => 103, 'shipping' => 'priority Overnight'],
//     ['id' => 104, 'shipping' => 'Standard']
// ];

// $name = [];
// foreach($orders as $order){
//     if(stripos($order['shipping'], "Priority")  !== false){
//         $name[] = $order['id'];
//     }
// }
//             $names = implode(",", $name);

//   echo "Priority Orders: {$names}";

$orders = [
    ['id' => 201, 'shipping' => 'Standard'],
    ['id' => 202, 'shipping' => 'VIP Express'],
    ['id' => 203, 'shipping' => 'vip Overnight'],
    ['id' => 204, 'shipping' => 'Standard']
];

// $name = "";
// foreach($orders as $order){
//     $orderId = $order['id'];
//     if(stripos($order['shipping'], "VIP")  !== false){
//         $name = "[VIP]".$order['shipping'];
//     }else{
//          $name = $order['shipping'];
//     }
//        echo "Order {$orderId}:  {$name}"."<br>";
// // }

// foreach ($orders as &$order) {
//     if (stripos($order['shipping'], "VIP") !== false) {
//         $order['shipping'] = "[VIP]" . $order['shipping'];
//     }
// }
// unset($order); // good practice after reference loop

// foreach ($orders as $order) {
//     echo "Order {$order['id']}: {$order['shipping']}<br>";
// }

// $orders = [
//     ['id' => 401, 'shipping' => 'Standard'],
//     ['id' => 402, 'shipping' => 'Priority Express'],
//     ['id' => 403, 'shipping' => 'Overnight'],
//     ['id' => 404, 'shipping' => 'Express Standard']
// ];

// foreach ($orders as $order) {
//     $shipping = $order['shipping'];
//     if (stripos($shipping, "Express") !== false) {
//         $shipping .= " (Express)";
//     }
//     echo "Order {$order['id']}: {$shipping}<br>";
// }

// $products = [
//     ['name' => 'Gaming Lapto', 'price' => 1200],
//     ['name' => 'Office Lapto', 'price' => 900],
//     ['name' => 'Mouse', 'price' => 50]
// ];

// foreach ($products as &$product) {
//     if (strpos($product['name'], "Lapto") !== false) {
//         $product['name'] = str_replace("Lapto", "Laptop", $product['name']);
//     }
// }
// unset($product);

// echo "<pre>"; print_r($products);

// $products = [
//     ['id' => 1, 'name' => 'Laptop'],
//     ['id' => 2, 'name' => 'Phone'],
//     ['id' => 3, 'name' => 'Keyboard']
// ];

// $i = 0;
// foreach($products as $product){
//     $i++;
//     $name = "ID {$i}: | Name: {$product['name']}"."<br>";
//     echo $name;
// }

// Exercise 3: Highlight every 2nd product with [FEATURED]

// $products = [
//     ['id' => 1, 'name' => 'Laptop'],
//     ['id' => 2, 'name' => 'Phone'],
//     ['id' => 3, 'name' => 'Keyboard']
// ];

// $i = 0;
// foreach($products as $product){
//     $i++;
//     if($i % 2 == 0){
//          $name = "Product {$i}: [FEATURED] {$product['name']}"."<br>";
//     }else{
//          $name = "Product {$i}: {$product['name']}"."<br>";
//     }
//     echo $name;
// }

// $products = [
//     ['id' => 1, 'name' => 'Laptop'],
//     ['id' => 2, 'name' => 'Phone'],
//     ['id' => 3, 'name' => 'Keyboard']
// ];

// foreach($products as $product){
//     $name = "ID {$product['id']}: | Name: {$product['name']}"."<br>";
//     echo $name;

// }

// $products = [
//     ['id' => 101, 'name' => 'Laptop', 'is_sale' => true,  'is_featured' => false],
//     ['id' => 102, 'name' => 'Phone',  'is_sale' => false, 'is_featured' => true],
//     ['id' => 103, 'name' => 'Keyboard', 'is_sale' => true, 'is_featured' => true],
// ];

// foreach($products as $product){
//     $tags = "";

//     if($product['is_sale']){
//         $tags .= "[SALE]";
//     }
//      if($product['is_featured']){
//         $tags .= " [FEATURED]";
//     }
//         echo "ID {$product['id']}: | Name: {$product['name']} {$tags}<br>";

// }

// $products = [
//     ['id' => 101, 'name' => 'Laptop', 'is_sale' => true,  'is_featured' => false],
//     ['id' => 102, 'name' => 'Phone',  'is_sale' => false, 'is_featured' => true],
//     ['id' => 103, 'name' => 'Keyboard', 'is_sale' => true, 'is_featured' => true],
// ];
// echo "<table border='1' cellpadding='5' cellspacing='0'>";
// echo "<tr><th>ID</th><th>Name</th><th>SALE</th><th>FEATURED</th></tr>";

// foreach($products as $product){
//     // Convert boolean to Yes/No for display
//     $sale = $product['is_sale'] ? 'Yes' : 'No';
//     $featured = $product['is_featured'] ? 'Yes' : 'No';
    
//     echo "<tr>";
//     echo "<td>{$product['id']}</td>";
//     echo "<td>{$product['name']}</td>";
//     echo "<td>{$sale}</td>";
//     echo "<td>{$featured}</td>";
//     echo "</tr>";
// }

// echo "</table>";
// $products = [
//     ['id' => 101, 'name' => 'Laptop', 'is_sale' => true,  'is_featured' => false],
//     ['id' => 102, 'name' => 'Phone',  'is_sale' => false, 'is_featured' => true],
//     ['id' => 103, 'name' => 'Keyboard', 'is_sale' => true, 'is_featured' => true],
//     ['id' => 104, 'name' => 'Monitor', 'is_sale' => false, 'is_featured' => true],
// ];
// // Step 1: Filter only featured products
// $featuredProducts = [];

// foreach($products as $product){
//     if($product['is_featured']){
//         $featuredProducts[] = $product;
//     }
// }

// // Step 2: Sort filtered products by name
// usort($featuredProducts, function($a, $b){
//     return strcmp($a['name'], $b['name']);
// });

// // Step 3: Print table
// echo "<table border='1' cellpadding='5' cellspacing='0'>";
// echo "<tr><th>ID</th><th>Name</th><th>SALE</th><th>FEATURED</th></tr>";

// foreach($featuredProducts as $product){
//     $sale = $product['is_sale'] ? 'Yes' : 'No';
//     $featured = $product['is_featured'] ? 'Yes' : 'No';
    
//     echo "<tr>";
//     echo "<td>{$product['id']}</td>";
//     echo "<td>{$product['name']}</td>";
//     echo "<td>{$sale}</td>";
//     echo "<td>{$featured}</td>";
//     echo "</tr>";
// }

// echo "</table>";

// ✅ Step 8: Advanced Magento-style Array Grouping & Multi-condition Filtering

// $products = [
//     ['id' => 101, 'name' => 'Laptop', 'is_sale' => true,  'is_featured' => true],
//     ['id' => 102, 'name' => 'Phone',  'is_sale' => false, 'is_featured' => true],
//     ['id' => 103, 'name' => 'Keyboard', 'is_sale' => true, 'is_featured' => true],
//     ['id' => 104, 'name' => 'Monitor', 'is_sale' => false, 'is_featured' => false],
//     ['id' => 105, 'name' => 'Tablet', 'is_sale' => true, 'is_featured' => false],
// ];

// $filtered = [];
// foreach ($products as $product) {
//     if ($product['is_sale'] && $product['is_featured']) {
//         $filtered[] = $product;
//     }
// }

// $grouped = [];
// foreach ($filtered as $product) {
//     $saleStatus = $product['is_sale'] ? 'Yes' : 'No';
//     $grouped[$saleStatus][] = $product;
// }

// foreach ($grouped as $saleStatus => $items) {
//     echo "<h3>SALE: {$saleStatus}</h3>";
//     echo "<table border='1' cellpadding='5' cellspacing='0'>";
//     echo "<tr><th>ID</th><th>Name</th><th>FEATURED</th></tr>";

//     foreach ($items as $product) {
//         $featured = $product['is_featured'] ? 'Yes' : 'No';
//         echo "<tr>";
//         echo "<td>{$product['id']}</td>";
//         echo "<td>{$product['name']}</td>";
//         echo "<td>{$featured}</td>";
//         echo "</tr>";
//     }

//     echo "</table><br>";
// }

// Sum of all numbers in an array
// You have an array of numbers. Find the sum of all numbers.

// $numbers = [5, 10, 15, 20];
// $sum = 0;

// foreach($numbers as $num){
//     $sum += $num;
// }
// echo "Total sum is: " . $sum;

// Exercise 2: Find the largest number in an array
// Problem:

// Find the largest number in this array:

// $numbers = [12, 45, 7, 90, 34];
// $max = $numbers[0];

// foreach($numbers as $num){
//     if($num > $max){
//         $max = $num;
//     }
// }

// echo "Largest number is: " . $max;

// Challenge 1: Count even and odd numbers

// $numbers = [4, 7, 10, 15, 22, 33, 40];

// $even = 0;
// $odd = 0;
// foreach($numbers as $num){
//     if($num % 2 == 0){
//         $even++;
//     }else{
//         $odd++;
//     }
// }

// echo "Even numbers: {$even}"."<br>";
// echo "Odd numbers: {$odd}"."<br>";

// Challenge 2: Count & Sum Even/Odd Numbers

// $numbers = [3, 6, 9, 12, 15, 18, 21, 24];

// $even = 0;
// $odd = 0;
// $sumeven = 0;
// $sumodd = 0;
// foreach($numbers as $num){
//     if($num % 2 == 0){
//         $even++;
//         $sumeven += $num;
//     }else{
//         $odd++;
//          $sumodd += $num;
//     }
// }
// echo "Even numbers: {$even}, Sum of even: {$sumeven}"."<br>";
// echo "Odd numbers: {$odd}, Sum of Odd: {$sumodd}"."<br>";

//preg_match("/pattern/", $string, $matches);
// Example 1: Check if string contains a number

// $text = "My age is 30";
// if(preg_match("/\d+/", $text, $matches)){
//     echo "Found a number: ". $matches[0];
// }else{
//     echo "No number found.";
// }

// preg_match_all – Find all matches

// preg_match_all("/pattern/", $string, $matches);

// Example 2: Find all numbers in a string

// $text = "I have 2 cats, 3 dogs, and 1 parrot";

// preg_match_all("/\d+/", $text, $matches);
// print_r($matches[0]);

// $text = "My phone numbers are 12345 and 67890";
// $newText = preg_replace("/\d+/", "#", $text);
// echo $newText;


// Exercise 1: Basic String Manipulation    
$text = "hello php world";
//Convert the string to uppercase.
// echo strtoupper($text);
// Convert the first letter of each word to uppercase.
// echo ucwords($text);
// Print the first 5 characters
$firstFiveChars = substr($text, 0, 5);
echo $firstFiveChars;
