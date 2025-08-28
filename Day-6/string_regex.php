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

// $sku = "BTR-L-0125";

// // 1. Use strpos() to find the hyphen in the SKU.
// $position = strpos($sku, "-");

// // 2. Display the result in a clear message.
// echo "The SKU is: $sku\n";
// echo "The hyphen '-' is at position: $position";


// --- The Data ---
// // A typical Magento category path
// $categoryPath = "Electronics/Computers/Laptops/Gaming Laptops";

// // --- The Solution ---

// // 1. Use strrpos() to find the LAST slash in the path.
// $lastSlashPosition = strrpos($categoryPath, "/");

// // 2. Display the result in a clear message.
// echo "The category path is: $categoryPath\n";
// echo "The last '/' is at position: $lastSlashPosition";

// Exercise 1 (Beginner – String Functions + Array)

// $products = [
//     "  Red Dress ",
//     "Blue  Jeans",
//     " White   Shirt "
// ];

// foreach($products as $product){
//     $trimmed_text = strtolower(trim($product));
//     $new_string = preg_replace("/\s+/", "-", $trimmed_text);

//     echo $new_string."<br>";
// }

// $emails = [
//     "john.doe@gmail.com",
//     "test_user@yahoo.com",
//     "alice123@gmail.com",
//     "invalid.email@",
//     "bob.smith@gmail.co"
// ];

// $valid_gmail = [];

// foreach($emails as $email){
//     if(preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)){
//         $valid_gmails[] = $email;
//     }
// }

// echo "<pre>"; print_r($valid_gmails);

// $posts = [
//     "Loving the #sunshine and #beach vibes",
//     "Working on #PHP and #Regex today",
//     "No hashtags here",
//     "Follow for more #webdev tips!"
// ];

// // Expected Output:
// // sunshine, beach
// // PHP, Regex
// // (empty)
// // webdev


// $matches = [];
// foreach($posts as $post){
//     preg_match_all('/#(\w+)/', $post, $matches);
//     if (!empty($matches[1])) {
//         // Join multiple hashtags with comma
//         echo implode(", ", $matches[1]) . "<br>";
//     } else {
//         echo "(empty)<br>";
//     }
// }

// Check if the string contains the word "PHP" (case-sensitive).

// $text = "I love PHP programming";

// if(preg_match("/PHP/", $text, $match)){
//     echo "Found: " . $match[0];
// }else{
//     echo "Not Found";
// }

// Exercise 2 – Case-Insensitive Match
// Check if the string contains "php" ignoring case.

// $text = "I love PHP programming";

// if(preg_match("/php/i", $text, $match)){
//     echo "Found: " .$match[0];
// }else{
//     echo "Not Found";
// }

// Exercise 3 – Digits Only

// $text = "My age is 25";
// if(preg_match("/\d/", $text, $match)){
//     echo "Digit found: " . $match[0];
// }else{
//     echo "No digits found";
// }

// Exercise 4 – Multiple Digits with preg_match_all

// Find all digits in a string.

// $text = "My phone is 123-456-78907891";

// preg_match_all("/\d/", $text, $matches);
// print_r($matches[0]);

// Exercise 5 – Extract Words Starting with Capital Letter

// Find all words starting with capital letters.

// $text = "I Love PHP And Regex";

// preg_match_all("/\b[A-Z][a-z]*\b/", $text, $matches);
// print_r($matches[0]);


// Exercise 6 – Validate Email (Simple)

// $email = "aesha123@gmail.com";

// if(preg_match("/^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,}$/", $email)){
//     echo "valid email";
// }else{
//     echo "Invalid email";
// }

// Exercise 7 – Extract Hashtags
// Find all hashtags from a sentence.
// $text = "Learning #PHP and #Regex is fun!";

// preg_match_all("/#(\w+)/", $text, $matches);
// print_r($matches[1]);

// Exercise 8 – Extract All Words

// Split a sentence into words using regex.

// $text = "I love PHP and Regex";

// preg_match_all("/\b\w+\b/", $text, $matches);
// print_r($matches[0]);

// Exercise 9 – Extract Numbers with Multiple Digits

// Task:
// Extract all numbers with multiple digits (like 123, 456) from string.

// $text = "My numbers are 12, 345, 6789";

// preg_match_all("/\d+/", $text, $matches);
// print_r($matches[0]);

// Exercise 10 – Extract All URLs

// Task:
// Extract all URLs from a string.

// $text = "Visit https://google.com or http://example.com";

// preg_match_all("/https?:\/\/[^\s]+/", $text, $matches);
// print_r($matches[0]);

// 🔹 Advanced Exercise 1 – Extract URLs from Text

// $posts = [
//     "Big thanks to @john for the help!",
//     "Collaboration with @alice and @bob",
//     "No mentions here",
//     "Follow @developer_now for updates"
// ];
// foreach ($posts as $post) {
//     preg_match_all("/@(\w+)/", $post, $matches);

//     echo "Post: $post"."<br>";
//         if (!empty($matches[1])) {
//         echo "Mentions: " . implode(", ", $matches[1]) . "<br><br>";
//     } else {
//         echo "Mentions: (none)"."<br><br>";
//     }

// }

// 🔹 Exercise 2 – Extract Domain Names

// $emails = [
//     "user1@gmail.com",
//     "contact@company.org",
//     "hello@yahoo.com",
//     "admin@mysite.net",
// ];

// foreach ($emails as $email){
//         preg_match("/@([a-zA-Z0-9.-]+)/", $email, $match);
//     echo "Email: $email -> Domain: " . ($match[1] ?? "Not Found") . "<br>";

// }

// 🔹 Exercise 3 – Extract Dates (dd-mm-yyyy)

// $texts = [
//     "The event is on 15-08-2025.",
//     "My birthday is 01-01-1992.",
//     "Invalid date: 2025-08-15",
//     "Holiday: 25-12-2025 and 01-01-2026."
// ];

// foreach ($texts as $text) {
//         preg_match_all("/\b\d{2}-\d{2}-\d{4}\b/", $text, $matches);

//             echo "Text: $text"."<br>";
//     if (!empty($matches[0])) {
//         echo "Dates Found: " . implode(", ", $matches[0]) . "<br><br>";
//     } else {
//         echo "Dates Found: (none)\n\n";
//     }

// }

// Capstone Project: Build a Mini Blog Text Analyzer
$tweets = [
    "Loving the #sunshine at the beach! Thanks @john for the company. Visit http://beach.com",
    "Working hard on #PHP #Regex with @mentor. Docs at https://php.net",
    "No hashtags here, but check out http://example.com and say hi to @aesha!",
    "Follow @webdev_guru for more #coding #webdev tips."
];


// Step 1: Extract Hashtags
function extractHashtags($tweets){
    $hashtags = [];
    foreach($tweets as $tweet){
        preg_match_all("/#(\w+)/", $tweet, $matches);
        $hashtags[] =  $matches[1];
    }
        return $hashtags;
}
//  Step 2: Extract Mentions

function extractMentions($tweets) {
    $mentions = [];
    foreach ($tweets as $tweet) {
        preg_match_all("/@(\w+)/", $tweet, $matches);
        $mentions[] = $matches[1]; 
    }
    return $mentions;
}

// Step 3: Extract Links

function extractLinks($tweets){
    $links = [];
    foreach($tweets as $tweet){
                preg_match_all("/https?:\/\/[^\s]+/", $tweet, $matches);
                 $links[] = $matches[0]; 
    }
        return $links;
}

// Step 4: Word Frequency (Ignoring #, @, Links)
// Remove hashtags, mentions, and links with preg_replace.

// Split into words using str_word_count.

// Count frequencies with array_count_values.

// function wordFrequency($tweets) {
//     $allWords = [];
//     foreach ($tweets as $tweet) {
//         // Remove hashtags, mentions, and links
//         $clean = preg_replace(["/#\w+/", "/@\w+/", "/https?:\/\/[^\s]+/"], "", $tweet);
        
//         // Extract words (only letters)
//         $words = str_word_count(strtolower($clean), 1);
        
//         $allWords = array_merge($allWords, $words);
//     }
//     return array_count_values($allWords);
// }

// // Step 5: Final Execution

// print_r(extractHashtags($tweets));
// print_r(extractMentions($tweets));
// print_r(extractLinks($tweets));
// print_r(wordFrequency($tweets));

// Extract Email Domains
//Given an array of emails, extract only the domain names (after @).
// Use explode() or substr() OR Regex.

// $emails = [
//     "alice@gmail.com",
//     "bob@yahoo.com",
//     "charlie@outlook.com"
// ];

// $data = [];
// foreach($emails as $email){
//     $domain = explode("@", $email);
//     echo $domain[1]."<br>";
// }

// 2. Count Words Starting with Capital Letters

// Given a sentence, count how many words start with capital letters.
// 👉 Use preg_match_all().

// $text = "PHP is Great and Regex is Powerful";
// $count = preg_match_all('/\b[A-Z][a-zA-Z]*\b/u', $text, $m);
// echo $count;


// // 3. Remove Extra Spaces

// // Write a function that removes extra spaces between words but keeps single space.
// // 👉 Use preg_replace().

// $text = "PHP     is   awesome    language";
// $out = trim(preg_replace('/\s+/', ' ', $text));
// echo $out;

// // 4. Extract Numbers from Mixed String

// // Given a string, extract all numbers using Regex.

// $text = "Order 234 shipped with 2 items at $45";

// preg_match_all('/\d+/', $text, $m);
// $numbers = $m; // list of numeric substrings
// print_r($numbers);

// 5. Mask Email Username
// Given an email, mask the username with * except first and last character.

// $email = "john.doe@example.com";
// Expected Output: j****e@example.com

// Complex Patterns (Nested parentheses, optional groups)

// Exercise 1 – Extract Text Inside Parentheses

// $text = "This is a (sample) text with (multiple (nested)) parentheses.";

// preg_match_all("/\(([^()]+)\)/", $text, $matches);
// print_r($matches[1]);
  //  echo "<pre>"; print_r($data);die();

 // Exercise 2 – Match Optional Country Code in Phone Numbers

//  $phones = ["+91-9876543210", "9876543210", "+1-1234567890"];

//  preg_match_all("/(\+\d{1,3}-)?\d{10}/",implode(" ", $phones),$matches);
//  print_r($matches[0]);

// Validation Tasks

// Exercise 3 – Validate Password
// Min 8 characters

// At least one uppercase, one lowercase, one digit, one special character

// $passwords = ["Abc123!", "Password1@", "weakpass"];

// foreach($passwords as $pwd){
//     if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/", $pwd)){
//         echo "$pwd  Valid"."<br>";
//     } else {
//         echo "$pwd  Invalid"."<br>";
//     }
// }


// Exercise 1 – Extract Text Inside Parentheses

// $text = "This is a (sample) text with (multiple (nested)) parentheses.";
// preg_match_all("/\(([^()]+)\)/", $text, $matches);
// echo "<pre>"; print_r($matches[1]);

// Exercise 2 – Match Optional Country Code in Phone Numbers

// $phones = ["+91-9876543210", "9876543210", "+1-1234567890"];
// preg_match_all("/(\+\d{1,3}-)?\d{10}/", implode(" ", $phones), $matches);
// print_r($matches[0]);

// $passwords = ["Abc123!", "Password1@", "weakpass"];

// foreach($passwords as $pwd){
//     if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/", $pwd)){
//         echo "$pwd Valid\n";
//     } else {
//         echo "$pwd Invalid\n";
//     }
// }

// $emails = ["john@example.com", "alice@mail.example.com", "invalid@.com"];

// foreach($emails as $email){
//     if(preg_match("/^[\w._%+-]+@([\w.-]+\.)+[a-zA-Z]{2,}$/", $email)){
//         echo "$email  Valid\n";
//     } else {
//         echo "$email  Invalid\n";
//     }
// }

// Exercise 6 – Clean & Slugify Multiple Titles

// $titles = ["PHP & Regex Mastery!", "Learn @Regex 100%"];
// $slugs = [];

// foreach($titles as $title){
//     $slug = strtolower($title); // lowercase
//     $slug = preg_replace("/[^a-z0-9\s]/", "", $slug); // remove special chars
//     $slug = preg_replace("/\s+/", "-", trim($slug)); // replace spaces with -
//     $slugs[] = $slug;
// }
// print_r($slugs);

// Ultimate Challenge 1 – Extract & Count Hashtags Across Multiple Posts

// Task:
// You have an array of social media posts. Extract all hashtags and count their frequency.


// $posts = [
//     "Learning #PHP and #Regex today",
//     "Advanced #PHP tutorials #Coding",
//     "No hashtags here",
//     "#Coding is fun #PHP"
// ];

// $allHashtags = [];

// foreach ($posts as $post) {
//     preg_match_all("/#(\w+)/", $post, $matches);
//     $allHashtags = array_merge($allHashtags, $matches[1]);
// }

// // Count frequency
// $hashtagCount = array_count_values($allHashtags);

// Ultimate Challenge 2 – Validate Mixed Emails & Mobile Numbers

// $contacts = ["john.doe@example.com", "9876543210", "alice@mail.org", "1234567890"];

// $validEmails = [];
// $validMobiles = [];

// foreach ($contacts as $contact) {
//      if (preg_match("/^[\w._%+-]+@([\w.-]+\.)+[a-zA-Z]{2,}$/", $contact)) {
//         $validEmails[] = $contact;
//     } elseif (preg_match("/^[6-9]\d{9}$/", $contact)) {
//         $validMobiles[] = $contact;
//     }
// }

// echo "<pre>";
// print_r([
//     "valid_emails" => $validEmails,
//     "valid_mobiles" => $validMobiles
// ]);

// $html = [
//     '<a href="https://example.com/page">Link</a>',
//     '<a href="http://test.org/about">About</a>'
// ];

// $results = [];
// foreach ($html as $line) {
//     preg_match('/href="(https?:\/\/[^"]+)"/', $line, $match);
//     if (!empty($match)) {
//         $url = $match[1];
//         $domain = parse_url($url, PHP_URL_HOST);
//         $results[] = ["url" => $url, "domain" => $domain];
//     }
// }
// print_r($results);

//    echo "<pre>"; print_r($hashtagCount);die();

// $texts = ["Event on 16-09-2025", "Birthday: 05/08/1992"];
// $dates = [];

// foreach ($texts as $text) {
//     preg_match_all("/\b(\d{2})[-\/](\d{2})[-\/](\d{4})\b/", $text, $matches, PREG_SET_ORDER);
//     foreach ($matches as $m) {
//         $dates[] = $m[3]."-".$m[2]."-".$m[1]; // yyyy-mm-dd
//     }
// }

// $posts = [
//     ["title"=>"PHP Tips","content"=>"Learn #PHP with @mentor. Docs at https://php.net"],
//     ["title"=>"Healthy Food","content"=>"Eat #Fruits and #Veggies. Contact: info@health.com"]
// ];

// $results = [];

// foreach ($posts as $post) {
//     $content = $post['content'];

//     // Extract hashtags
//     preg_match_all("/#(\w+)/", $content, $hashtags);

//     // Extract mentions
//     preg_match_all("/@(\w+)/", $content, $mentions);

//     // Extract emails
//     preg_match_all("/[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,}/", $content, $emails);

//     // Extract URLs
//     preg_match_all("/https?:\/\/[^\s]+/", $content, $urls);

//     $results[] = [
//         "title" => $post['title'],
//         "hashtags" => $hashtags[1],
//         "mentions" => $mentions[1],
//         "emails" => $emails[0],
//         "urls" => $urls[0]
//     ];
// }

// print_r($results);
// Section A: String Functions (Basics → Advanced)

// Given:

// $text = "  Hello World! PHP is awesome.  ";


// Remove extra spaces.

// Convert to uppercase.

// Replace "awesome" with "powerful".

// $text = "  Hello World! PHP is awesome.  ";
// // Remove extra spaces.
// $text_trim = trim($text);
// // Replace "awesome" with "powerful".
// $replace = str_replace("awesome", "powerful", $text_trim);
// // Convert to uppercase
// $uppercase = strtoupper($replace);

// Create a function wordCount($string) that returns the number of unique words in a sentence (case-insensitive).
// Example: "Hello hello PHP world" → 3.

//  $text = "Hello hello PHP world";
//  function wordCount($text){
//     // 1. Convert to lowercase for case-insensitive comparison
//     $string = strtolower($text);

//     // 2. Split into words (remove punctuation, split by spaces)
//     // Use preg_split to split on any non-word character
//     $words = preg_split('/\W+/', $text, -1, PREG_SPLIT_NO_EMPTY);

//     // 3. Remove duplicates using array_unique
//     $uniqueWords = array_unique($words);

//     // 4. Return the count
//     return count($uniqueWords);
// }
// // echo wordCount($text); // Output: 3
// echo wordCount("PHP php PHP is Powerful powerful POWERFUL!");
// Output: 3 (php, is, powerful)
// $text = "PHP is an awesome scripting language!";

// function longestWord($string) {
//     // 1. Remove punctuation using regex
//     $clean = preg_replace("/[^\w\s]/", "", $string);

//     // 2. Split into words (case-insensitive)
//     $words = explode(" ", strtolower($clean));

//     // 3. Find the max length
//     $maxLength = 0;
//     foreach ($words as $word) {
//         $len = strlen($word);
//         if ($len > $maxLength) {
//             $maxLength = $len;
//         }
//     }

//     // 4. Collect all words that match max length
//     $longest = [];
//     foreach ($words as $word) {
//         if (strlen($word) === $maxLength) {
//             $longest[] = $word;
//         }
//     }

//     // 5. If only one word, return string; else return array
//     return count($longest) === 1 ? $longest[0] : $longest;
// }

// echo longestWord($text);

// 1️⃣ String Splitting & Joining (10 mins)

// Functions: explode(), implode() (or join())

// $sentence = "PHP,is,fun,to,learn";
// // Convert into array
//     $array = explode(",", $sentence);
//     //  Then join with space instead of comma
//    $array1 =  implode(",", $array);
//    $joinedString = join(",", $array); 
// echo "<pre>"; print_r($joinedString);die();
// echo implode(",", $sentence);

// // 2️⃣ Substring Functions (10 mins)

// // Functions: substr(), substr_replace(), strstr(), strchr(), strrchr()

// // ✅ Exercise:

// $email = "aesha@example.com";
// //Get only domain part → "example.com"
// $array = explode("@", $email);
// echo $array[1];

// // Replace username with "user" → "user@example.com"
// $data = str_replace($array[0], "user", $email);


// 3️⃣ Searching Inside Strings (10 mins)

// Functions: strpos(), strrpos(), stripos(), strripos()

// ✅ Exercise:

// $text = "I love PHP and php frameworks.";
// $firstPos = strpos($text, "php"); // case-sensitive
// var_dump($firstPos); // false because "php" in lowercase first occurs at index 13
// $firstPosIgnoreCase = stripos($text, "php"); // case-insensitive
// echo $firstPosIgnoreCase;
// $lastPos = strrpos($text, "php"); // case-sensitive
// var_dump($lastPos); // false because lowercase "php" occurs last
// $lastPosIgnoreCase = strripos($text, "php"); // case-insensitive
// echo $lastPosIgnoreCase;

// echo "<pre>"; print_r($data);die();

// // 4️⃣ String Padding & Repeating (10 mins)

// // Functions: str_pad(), str_repeat()

// // ✅ Exercise:
// $word = "PHP";

// echo str_repeat($word, 10);

// // 5️⃣ String Comparison (10 mins)

// // Functions: strcmp(), strcasecmp(), strncmp(), strnatcmp()

// // ✅ Exercise:

// $a = "php";
// $b = "PHP";
// // echo strcmp($a, $b);
// echo strcasecmp($a, $b);

// // Hashing & Encoding (10 mins)
// // Functions: md5(), sha1(), base64_encode(), base64_decode()

// $password = "mySecret123";
// $md5_hash = md5($password);
// echo "MD5 hash of '{$password}': " . $md5_hash;

// Word Boundaries & Anchors (10 min)

// Concepts: \b (word boundary), ^ (start), $ (end)

// $text = "PHP is fun. I love PHP!";
// // Match only the full word "PHP" (case-insensitive)
// preg_match_all('/\bPHP\b/i', $text, $matches);
// print_r($matches[0]);

// Character Classes & Ranges (10 min)

// Concepts: [A-Z], [a-z], [0-9], [^0-9]

// $text = "User123 bought 45 items and paid $78";
// // Extract all digits
// preg_match_all('/[0-9]+/', $text, $numbers);
// print_r($numbers[0]);

// 3️⃣ Quantifiers (10 min)

// Concepts: +, *, ?, {n,m}

// $text = "a aa aaa aaaa aaaaa";
// // Match all words with 2–4 a's
// preg_match_all('/a{2,4}/', $text, $matches);
// print_r($matches[0]);

// 4️⃣ Groups & Alternation (10 min)

// Concepts: (abc|xyz) → match multiple options

// $text = "I have a cat, a dog, and a parrot";
// // Match "cat" or "dog"
// preg_match_all('/(cat|dog)/', $text, $matches);
// print_r($matches[0]);

// 5️⃣ Lookaheads & Lookbehinds (10 min)

// Concepts:

// Positive Lookahead (?=...) → match only if followed by …

// Negative Lookahead (?!...) → match only if NOT followed by …

// Positive Lookbehind (?<=...) → match only if preceded by …

// Exercise:

// $text = "Item1 ItemX Item2";
// // Extract words followed by a digit
// preg_match_all('/\b\w+(?=\d)/', $text, $matches);
// print_r($matches[0]);

// 6️⃣ Practical Mini Project (10 min)

// Mix everything learned:

// Extract all emails from a text

// Extract all hashtags #something

// Validate passwords (at least 1 uppercase, 1 number, min length 8)

// Exercise:

// Challenge 1: Password Validation (Lookahead + Quantifiers)

// Task:
// Create a regex that validates a password with these rules:

// Minimum 8 characters

// At least 1 uppercase letter

// At least 1 lowercase letter

// At least 1 number

// Optional special character

// $passwords = [
//     "Pass1234",
//     "password123",
//     "PASS1234",
//     "Pass123!",
// ];
// $minLength = 8;


// foreach($passwords as $password){
//     if (strlen($password) >= $minLength && preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password) && preg_match('/\d/', $password) && preg_match('/[^a-zA-Z0-9]/', $password) === 0) {
//         echo "Valid Password: {$password}<br>";
//     }else{
//         echo "Invalid Password: {$password}<br>";
//     }
// }

// 🔹 Challenge 2: Extract Dates (Anchors + Groups + Character Classes)

// Task:
// From a text, extract all dates in format DD/MM/YYYY or DD-MM-YYYY.
// $text = "The events are on 12/09/2025, 23-08-2024 and 5/5/2023.";

// $pattern = '/\b\d{1,2}[-\/]\d{1,2}[-\/]\d{4}\b/';
// preg_match_all($pattern, $text, $matches);
// print_r($matches[0]);

    // echo "<pre>"; print_r($password);die();

// Minimum 8 characters

$text = "Item1 ItemX Item2 ItemY";

// Regex explanation:
// \b      → word boundary
// \w+     → matches word characters (letters, digits, underscore)
// (?!\d)  → negative lookahead: ensures word is NOT followed by a digit
// \b      → word boundary
$pattern = '/\b\w+\b(?!\d)/';

preg_match_all($pattern, $text, $matches);

print_r($matches[0]);

