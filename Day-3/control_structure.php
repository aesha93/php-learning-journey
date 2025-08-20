<?php
//if, else, elseif, and the ternary operator
// $qty = 5;

// if($qty > 0){
//     echo "In stock";
// } elseif($qty === 0){
//     echo "Out of Stock";
// }else{
//     echo "Invalid qunatity";
// }

// $label = ($qty > 0) ? "Available" : "Unavailable";
// echo $label;


//for and foreach loops
// for($i = 0; $i < 3; $i++){
//     echo "Box #$i"."<br>";
// }

// $products = [
//     ['sku' => 'A', 'price' => 100],
//     ['sku' => 'B', 'price' => 200],
// ];

// foreach($products as $product){
//     echo $product['sku']. " costs  ". $product['price']. "<br>";
// }

// break and continue

// $products = [
//     ['sku' => 'A', 'status' => 'active'],
//     ['sku' => 'B', 'status' => 'discontinued'],
//     ['sku' => 'C', 'status' => 'active']
// ];

// foreach($products as $p){
//     if($p['status'] === 'discontinued') {
//        continue; // skip B
//     }
//     echo $p['sku']. '<br>';
//    break;//// stop after printing the first active product
// }

//switch

// $method = 'cod';

// switch($method){
//     case 'standard':
//         echo "Shipping: 80";
//         break;
//     case 'express':
//         echo "Shipping: 150";
//         break;
//     case 'cod':
//         echo "Shipping: 120";
//         break;
//     default:
//         echo "Shipping: not available";
//         break;
// }

//Nested loops

// $orderItems = [
//     ['sku' => 'P1', 'qty' => 7],
//     ['sku' => 'P2', 'qty' => 3],
// ];

// foreach ($orderItems as $item) {           // outer loop: each item
//     $boxes = 0;
//     $left = $item['qty'];
//     while ($left > 0) {                    // inner loop: pack boxes
//         $boxes++;
//         $left -= 5;
//     }
//     echo $item['sku'] . " needs $boxes boxes"."<br>";
// }

// Product Listing with Labels

// $products = [
//     ['sku' => 'A100', 'price' => 299,  'qty' => 10, 'status' => 'active'],
//     ['sku' => 'B200', 'price' => 1200, 'qty' => 0,  'status' => 'active'],
//     ['sku' => 'C300', 'price' => 750,  'qty' => 5,  'status' => 'discontinued'],
//     ['sku' => 'D400', 'price' => 499,  'qty' => 2,  'status' => 'active'],
//     ['sku' => 'E500', 'price' => 999,  'qty' => 1,  'status' => 'active'],
// ];

// $shown = 0;

// foreach($products as $p){
//     if($p['status'] == 'discontinued'){
//         continue;
//     }

//    $stockLabel = ($p['qty'] > 0) ? 'In Stock' : 'Out of Stock';
    
//    if($p['price'] < 500){
//               $band = "Budget";
//    }else if($p['price'] <= 1000){
//         $band = "Mid";
//    }else{
//         $band = "Premium";
//    }
//        echo $p['sku'] . " | " . $p['price'] . " | " . $stockLabel . " | " . $band . "<br>";

//            $shown++;
// if($shown === 3){
//     break;
// }
// //    echo "<pre>"; print_r($stockLabel);
// }

// $orderItems = [
//     ['sku' => 'X1', 'qty' => 7, 'price' => 100],
//     ['sku' => 'X2', 'qty' => 0, 'price' => 250],
//     ['sku' => 'X3', 'qty' => 3, 'price' => 200],
// ];

// $itemsCount = 3;

// $shippingMethod = 'express';

// $subtotal = 0;

// for($i = 0; $i < $itemsCount; $i++){
//     $item = $orderItems[$i];

//     if($item['qty'] === 0){
//         continue;
//     }

//      // nested loop: boxes of 5
//     $left = $item['qty'];
//     $boxes = 0;
//     while ($left > 0) {
//         $boxes++;
//         $left -= 5;
//     }
//         echo $item['sku'] . " needs " . $boxes . " boxes". "<br>";
//             $subtotal += ($item['qty'] * $item['price']);

//             // shipping via switch
//         $shipping = 0;
//         switch ($shippingMethod) {
//             case 'standard':
//                 $shipping = 80;
//                 break;
//             case 'express':
//                 $shipping = 150;
//                 break;
//             case 'cod':
//                 $shipping = 120;
//                 break;
//             default:
//                 $shipping = 0;
//                 break;
//         }
// $total = $subtotal + $shipping;

// echo "Subtotal: " . $subtotal . "<br>";
// echo "Shipping: " . $shipping . "<br>";
// echo "Order Total: " . $total . "<br>";


// }

// $packageWeight = 6; // kg

// $methods = [
//     ['code' => 'standard', 'max_weight' => 5], // too low for 6 kg
//     ['code' => 'express',  'max_weight' => 10],
//     ['code' => 'cod',      'max_weight' => 8],
// ];

// $methodsCount = count($methods);
// $i = 0;
// $chosen = null;
// $cost = 0;

// while ($i < $methodsCount){
//     $m = $methods[$i];

//     if($packageWeight <= $m['max_weight']){
//         $chosen = $m['code'];

//         switch($chosen){
//             case 'standard':
//                 $cost = 80;
//                 break;
//             case 'express':
//                 $cost = 150;
//                 break;
//             case 'cod':
//                 $cost = 120;
//                 break;
//             default:
//                 $cost = 0;
//                 break;
//         }
//         break; 
//     }
//      $i++;
// }

// if ($chosen === null) {
//     echo "No available method\n";
// } else {
//     echo "Chosen: " . $chosen . " | Cost: " . $cost . "\n";
// }

// Challenge 1: Cheapest Allowed Method (Products + Shipping)


// $cart = [
//      ['sku'=>'P1','price'=>400,'qty'=>2],
//      ['sku'=>'P2','price'=>300,'qty'=>1] 
// ];

// $methods = [
//      ['code'=>'standard','max_weight'=>5,'base'=>80],
//      ['code'=>'express','max_weight'=>8,'base'=>150] 
// ];
// $subtotal = 0;
// $computeWeight = 0;
// foreach($cart as $cartdata){
//     $qty = $cartdata['qty'];
//     $price = $cartdata['price'];
//     $subtotal += $price * $qty;
//     $computeWeight += $qty;

// }

//     foreach($methods as $method){
//         if($method['max_weight'] >= $computeWeight){
//             $ordertotal = $subtotal + $method['base'];
//             echo "Chosen Method: {$method['code']}"."<br>";
//             echo "Subtotal: {$subtotal}"."<br>";
//             echo "Shipping: {$method['base']}"."<br>";
//             echo "Order Total: {$ordertotal}"."<br>";
//             break;
//         }

//     }

// Challenge 2: Stop When Budget Hit (Orders)

// $budget = 1000;

// $items = [
//      ['sku'=>'A','qty'=>2,'price'=>350],
//      ['sku'=>'B','qty'=>1,'price'=>900],
//      ['sku'=>'C','qty'=>4,'price'=>150] 
// ];
// $total = 0;
// foreach($items as $item){
//     $sku = $item['sku'];
//     $qty = $item['qty'];
//     $price = $item['price'];

//     if($qty == 0){
//         continue;
//     }

//     $total += $qty * $price;


//     echo "Items added: {$sku}"."<br>";
//     echo "Final total:{$total}"."<br>";
//     if($total > $budget){
//            echo "Budget exceeded! Stopping purchase.<br>";
//         break;
//     }

//     echo "Final total: {$total}<br>";

  
// }

// Challenge 3: Pack Orders by Item, Then Choose Shipping

// Input:

// $order = [ ['sku'=>'K1','qty'=>11,'price'=>120], ['sku'=>'K2','qty'=>5,'price'=>200] ];

// $shippingMethod = 'cod' | 'express' | 'standard' (pick one to test).
// Expected outcome:

// For each item, compute number of boxes of 4 units using a nested loop.

// Print boxes per item.

// Compute subtotal and then decide shipping price with switch (pick prices you like).

// Print order total.

// $order = [
//     ['sku'=>'K1','qty'=>11,'price'=>120],
//     ['sku'=>'K2','qty'=>5,'price'=>200]
// ];

// $shippingMethod = 'cod';
// $shippingPrice = 100; // keeping this for now; we'll replace with switch later
// $subtotal = 0;

// foreach ($order as $item) {
//     $sku = $item['sku'];
//     $qty = $item['qty'];
//     $price = $item['price'];

//     // skip zero-quantity items
//     if ($qty == 0) {
//         echo "{$sku} has qty 0, skipped.<br>";
//         continue;
//     }

//     // accumulate subtotal
//     $subtotal += $qty * $price;

//     // --- INNER LOOP: pack into boxes of 4 ---
//     $left = $qty;
//     $boxes = 0;
//     while($left > 0){
//         $boxes++;
//         $left -= 4;
//     }
//     // --- end inner loop ---

//     echo "{$sku} (qty {$qty}) needs {$boxes} boxes.<br>";
// }

// // totals after processing all items
// $ordertotal = $subtotal + $shippingPrice;

// echo "Subtotal: {$subtotal}<br>";
// echo "Shipping ({$shippingMethod}): {$shippingPrice}<br>";
// echo "Order Total: {$ordertotal}<br>";

// $order = [
//       ['sku'=>'K1','qty'=>11,'price'=>120],
//       ['sku'=>'K2','qty'=>5,'price'=>200] 
// ];

// foreach($order as $data){
//     $qty = $data['qty'];
//     echo "Product: {$data['sku']} → Qty: $qty <br>";

//     while($qty > 0){
//         if($qty >= 4){
//             echo "Box of 4<br>";
//             $qty -= 4;
//         }else{
//             echo "Box of $qty (remaining) <br>";
//             $qty =0;
//         }
//     }
//     echo "<br>";
// }

    // echo "<pre>"; print_r($total);die();

// $order = [
//   ['sku' => 'A1', 'qty' => 9, 'price' => 150],
//   ['sku' => 'B2', 'qty' => 5, 'price' => 200],
// ];
// $subtotal = 0;
// $packgingcost = 20;
// $totalboxcost = 0;
// $totalpackgingcost = 0;
// $shipping = 100;
// echo "Boxes:"."<br>";
// foreach($order as $data){
//     $qty = $data['qty'];
//     $subtotal += $data['qty'] * $data['price'];
//     $left = $qty;
//     $boxes = 0;
//     while($left > 0){
//         $boxes++;
//         $left -= 4;
//     }
//      $totalpackgingcost += $packgingcost * $boxes;
//      echo "{$data['sku']}  →  {$boxes} boxes"."<br>";
// }

//      echo "Products Subtotal: {$subtotal}"."<br>";
//      echo "Packing Cost: {$totalpackgingcost}"."<br>";
//      $beforeDiscount  = $subtotal + $totalpackgingcost;
//      echo "Amount before discount: {$beforeDiscount}"."<br>";
//      if($subtotal > 2000){
//         $discount = 10;
//         $discount_amount = ($beforeDiscount * $discount) / 100;
//         echo "Discount (10%): {$discount_amount}"."<br>";
//         $afterDiscount = $beforeDiscount - $discount_amount;
//          echo "After discount: {$afterDiscount}"."<br>";
//      }

//      echo "Shipping: {$shipping}"."<br>";
//      $finaltotal = $afterDiscount + $shipping;
//      echo "Final Total: {$finaltotal}"."<br>";


// $amount = 3760;
// $notes = [2000, 500, 200, 100, 50, 10];
// $count = [];

// while ($amount > 0) {
//     if ($amount >= 2000) {
//         $amount -= 2000;
//         $count[2000] = ($count[2000] ?? 0) + 1;
//     } elseif ($amount >= 500) {
//         $amount -= 500;
//         $count[500] = ($count[500] ?? 0) + 1;
//     } elseif ($amount >= 200) {
//         $amount -= 200;
//         $count[200] = ($count[200] ?? 0) + 1;
//     } elseif ($amount >= 100) {
//         $amount -= 100;
//         $count[100] = ($count[100] ?? 0) + 1;
//     } elseif ($amount >= 50) {
//         $amount -= 50;
//         $count[50] = ($count[50] ?? 0) + 1;
//     } elseif ($amount >= 10) {
//         $amount -= 10;
//         $count[10] = ($count[10] ?? 0) + 1;
//     }
// }

// foreach ($count as $note => $num) {
//     echo "₹$note x $num\n";
// }

// $students = [
//     ["name" => "Avi", "marks" => [85, 72, 90]],
//     ["name" => "Meera", "marks" => [65, 70, 60]],
//     ["name" => "Riya", "marks" => [92, 88, 95]]
// ];
// $count = 0;
// foreach($students as $student){
//     echo "Student: {$student['name']}"."<br>";
//     echo "Marks: ";

//     foreach ($student['marks'] as $mark) {
//         echo $mark . " ";
//     }
//     echo "<br>";

// $i = 0;
// while($i < count($student['marks'])){
//     if($student['marks'][$i] >= 80){
//         $count++;
//     }
//     $i++;
// }
// }
// echo "Total marks > 80:{$count}"."<br>";

// $balance = 1000;
// do{
//     echo "ATM Menu"."<br>";
//     echo "1.Check Balance"."<br>";
//     echo "2.Deposit"."<br>";
//     echo "3.Withdraw"."<br>";
//     echo "4. Exit"."<br>";

//     $choice = (int)readline("Enter your choice: ");

//     switch($choice){
//         case 1: 
//             echo "Your Balance is: $balance\n";
//             break;
        
//         case 2:
//             $amount = (int)readline("Enter amount to deposit: ");
//             if($amount > 0){
//                 $balance += $amount;
//                 echo "Deposited: $amount. New Balance: $balance\n";
//             }else{
//                 echo "Invalid deposit amount!\n";
//             }
//             break;

//          case 3:
//             $amount = (int)readline("Enter amount to withdraw: ");
//             if($amount > 0 && $amount <= $balance){
//                 $balance -= $amount;
//                 echo "Withdrawn: $amount. New Balance: $balance\n";
//             }else{
//                 echo "Insufficient balance or invalid amount!\n";
//             }
//            break;      

//         case 4:
//             echo "Exiting... Thank you for using ATM.\n";
//             break;
        
//         default:
//             echo "Invalid choice. Please try again.\n";
//             break;
   

//     }


// }while($choice != 4);


// $secret = rand(1,10);
// $attempts = 0;

// do{
//     $guess =(int) readline("Guess a number (1-10): ");
//     if ($guess < 1 || $guess > 10) {
//         echo "Out of range. Please enter a number between 1 and 10.\n";
//         continue; // jump to the loop check and then start the next iteration
//     }
//      $attempts++;
//     if ($guess == $secret) {
//         echo "Correct!\n";
//     } elseif ($guess < $secret) {
//         echo "Too low. Try again.\n";
//     } else {
//         echo "Too high. Try again.\n";
//     }
// }while($guess !== $secret);

// echo "You got it in $attempts attempt(s)!\n";

// $choice = 0;

// do{
//     echo "Simple Calculator\n";
//     echo "1. Addition\n";
//     echo "2.Substraction\n";
//     echo "3.Multiplication\n";
//     echo "4.Divison\n";
//     echo "5.Exit\n";

//     $choice = (int)readline("Enter choice (1-5): ");

//     switch($choice){
//         case 1:
//             $a =(float) readline("Enter first number");
//             $b = (float) readline("Enter secound number");
//             $result = $a + $b;
//             echo "Result: $result\n";
//         break;

//         case 2: // Subtraction
//             $a = (float) readline("Enter first number: ");
//             $b = (float) readline("Enter second number: ");
//             $result = $a - $b;                              // subtraction
//             echo "Result: $a - $b = $result\n";
//         break;

//         case 3: // Multiplication
//             $a = (float) readline("Enter first number: ");
//             $b = (float) readline("Enter second number: ");
//             $result = $a * $b;                              // multiplication
//             echo "Result: $a * $b = $result\n";
//         break;

//         case 4: // Division
//             $a = (float) readline("Enter numerator: ");
//             $b = (float) readline("Enter denominator: ");

//             // guard against division by zero
//             if ($b == 0.0) {                                // use if to protect from invalid math
//                 echo "Error: Cannot divide by zero.\n";     // explain the issue to the user
//                 break;                                      // exit this case without calculating
//             }

//             $result = $a / $b;                              // safe division
//             echo "Result: $a / $b = $result\n";
//         break;

//         case 5: // Exit
//             echo "Goodbye! 👋\n";                           // friendly exit message
//             break;                                          // (not strictly needed, but consistent)

//         default: // any number not in 1..5
//             echo "Invalid choice. Please select 1-5.\n";  

//     }
// }while ($choice !== 5); 

// $secret = rand(1, 20); 
// $attempts = 5;
// $attemptsCount = 0;
// $guess = null;

// do{
//     $guess = (int)readline("Guess a number (1-20): ");

//      if ($guess < 1 || $guess > 20) {
//         echo "Out of range. Please enter a number between 1 and 20.\n";
//         continue;
//      }
//         $attemptsCount++;
//         if ($guess === $secret) {
//             echo "Correct!\n";
//         } elseif ($guess < $secret) {
//             echo "Too low. Try again.\n";
//         } else{
//             echo "Too high. Try again.\n";
//         }


// }while($guess !== $secret && $attemptsCount < $attempts);

// if ($guess === $secret) {
//     echo "You got it in {$attemptsCount} attempt(s)!" . PHP_EOL;
// } else {
//     echo "Game Over! The number was {$secret}." . PHP_EOL;
// }

// $students = [
//     ["name" => "Avi", "Maths" => 55, "Science" => 70, "English" => 40],
//     ["name" => "Tiya", "Maths" => 38, "Science" => 80, "English" => 75],
//     ["name" => "Meera", "Maths" => 90, "Science" => 60, "English" => 30],
// ];

// $subjects = [];
// foreach($students['0'] as $key => $student){

//     if($key != 'name'){
//         $subjects[] = $key;
//     }
// }

// foreach($students as $student){
//     $finalStatus = "Pass"; 
//     foreach($subjects as $subject){

//        $status = ($student[$subject] >= 40) ? 'Pass' : 'Fail';

//         if($student[$subject] == 'Maths' && $status == 'Fail'){
//             $finalStatus = "Fail ($subject failed)";
//            continue;
//         }

//        if($status == 'Fail'){
//          $finalStatus = "Fail ($subject failed)";

//             break;
//        }
//     }
//     echo "{$student['name']}: {$finalStatus}"."<br>";

// }

$students = [
    ['name' => 'Avi',   'Maths' => 55, 'Science' => 38, 'English' => 65],
    ['name' => 'Tiya',  'Maths' => 72, 'Science' => 49, 'English' => 80],
    ['name' => 'Meera', 'Maths' => 39, 'Science' => 41, 'English' => 20],
    ['name' => 'Karan', 'Maths' => 90, 'Science' => 92, 'English' => 20],
];

$subjects = [];
foreach ($students[0] as $key => $val) {
    if ($key != 'name') {
        $subjects[] = $key;
    }
}

foreach($students as $student){
     $result = "Pass"; 
        foreach ($subjects as $subject) {
        $result = ($student[$subject] >= 40) ? 'Pass' : 'Fail';

        // Special rule for Maths
        if ($subject == 'Maths' && $result == 'Fail') {
            $result = 'Skipped (Failed in Maths)';
            break; // stop checking other subjects
        }
         if ($subject == 'English' && $result == 'Fail') {
            $status = 'Needs Improvement in English';
            break; // stop checking other subjects
        }

    }
    echo $student['name']." : ".$result."<br>";
}

