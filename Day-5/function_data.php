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

$subtotal = 3800;

function grand_total($subtotal, $shipping = 50 ,$taxRate = 0.18){
    $tax = $subtotal * $taxRate;
    return $subtotal + $shipping + $tax;
}

// echo "Grand Total (defaults): ". grand_total($subtotal). "<br>";
// echo "Grand Total (free ship, 5%): " . grand_total($subtotal, 0,0.5). "<br>";
// echo "Grand Total (free ship, 10%): " . grand_total($subtotal, 0,0.10). "<br>";
echo "Grand Total (free ship, 20%): " . grand_total(10);


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

?>