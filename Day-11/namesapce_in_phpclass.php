<?php
// Namespace Declaration
// namespace MyApp;
// use Magento\Catalog\Product;
// class OrderManager{

// }

// use Keyword

// namespace MyApp;
// use Magento\Catalog\Product;

// $p = new Product();

// Autoloading

// require 'vendor/autoload.php'; // Composer’s autoloader

// Try-Catch Blocks
// try{
//     $price = -10;
//     if($price < 0){
//         throw new Exception("Invalid product price");
//     }
// }catch(Exception $e){
//     echo "Error: " . $e->getMessage();
// }

// Custom Exceptions
// class ProductException extends Exception {}

// try{
//     throw new ProductException("Product mnot found");
// }catch(ProductException $e){
//     echo $e->getMessage();
// }

// Logging

// error_log("Order failed: invalid payment", 3, "app.log");

// $product = [
//     "id" => 101,
//     "name" => "T-shirt",
//     "price" => -250
// ];

// try{
//     if($product["price"] < 0){
//         throw new Exception ("Invalid price for product Id" . $product["id"]);
//     }

//     echo "Product is valid.";
// }catch(Exception $e){
//     error_log($e->getMessage(), 3, "app.log");
//     echo "Error handled check log";
// }

// Custom Exception for Orders
// class OrderException extends Exception {}

// $order = [
//     'id' => 5001,
//     'status' => 'pending_payment'
// ];

// try{
//     if($order['status'] === 'pending_payment'){
//         throw new orderException("order #" .$order['id']. "is not paid yet");
//     }
//     echo "Order is confirmed.";
// }catch(OrderException $e){
//     echo "Custom Exception Caught: ". $e->getMessage();
// }

// 3.Shipping Method Validation with Namespace + Logging

// namespace MyApp\Shipping;

// class ShippingException extends \Exception {}

// $shipping = [
//     "id" => 201,
//     "method" => ""
// ];

// try{
//     if(empty($shipping['method'])){
//         throw new shippingException("Shipping method missing for shipment #". $shipping["id"]);

//     }
//      echo "Shipping method is valid.";
// }catch (ShippingException $e) {
//     error_log($e->getMessage(), 3, "shipping.log");
//     echo "Error handled. Check shipping.log.";
// }

// Product Stock Validation

// class ProductException extends \Exception {}


// $product = ["id" => 105, "name" => "Shoes", "stock" => -2];
// try{
//       if($product['stock'] < 0){
//         throw new ProductException("stock not valid of Id". $product["id"]);
//       }
//        echo "stock is valid.";
// }catch(ProductException $e){
//     error_log($e->getMessage(), 3, "product.log");
//     echo "Error handled. Check product.log.";
// }

// Challenge 2: Order Total Validation with Namespace

// Array:

// $order = ["id" => 7001, "total" => 0];


// Inside namespace MyApp\Order, throw OrderException if total = 0.

// Log error and catch exception.

// namespace MyApp\Order;

// class OrderException extends \Exception {}

// $order = ["id" => 7001, "total" => 0];

// try {
//     if ($order['total'] <= 0) {
//         throw new OrderException("Invalid total for Order ID {$order['id']}");
//     }
//     echo "Order total is valid.";
// } catch (OrderException $e) {
//     error_log($e->getMessage(), 3, "order.log");
//     echo "Error handled. Check order.log.";
// }

// Challenge 3: Shipping Address Validation

// Array:

// $shipping = ["id" => 301, "address" => ""];


// If address is empty → throw ShippingException.

// Catch exception and log to "address.log" file.

// class ShippingAddress extends \Exception {}

// $shipping = ["id" => 301, "address" => ""];

// try {
//     if ($shipping['address'] == "") {
//         throw new ShippingAddress("Invalid total for Order ID {$shipping['id']}");
//     }
//     echo "Order total is valid.";
// } catch (ShippingAddress $e) {
//     error_log($e->getMessage(), 3, "order.log");
//     echo "Error handled. Check order.log.";
// }

// Multiple Catch Blocks


// try{
//     throw new InvalidArgumentException("Bad input");
// }catch(InvalidArgumentException $e){
//     echo "Invalid argument: " . $e->getMessage();
// }catch (Exception $e) {
//     echo "General error: " . $e->getMessage();
// }

// Exception Hierarchies & Specific Catching

// try{

// }catch(\Magento\Framework\Exception\LocalizedException $e){

// }

// Structured Logging (Beyond error_log)

// $logger->error("Order failed", ['order_id' => 123]);

// try{

// }catch(Exception $e){
    
// }finally {

// }
// Exercise 1 — Order line total with validation

// $orderItem = [
//     'sku'   => 'MUG-001',
//     'name'  => 'Coffee Mug',
//     'price' => 199.99,
//     'qty'   => 3
// ];

// try{
//     if(!isset($orderItem['price']) || !is_numeric($orderItem['price'])){
//         throw new Exception('Order item missiing valid price.');
//     }
//     if(!isset($orderItem['qty']) || !is_numeric($orderItem['qty'])){
//         throw new Exception('Order item missiing valid quantity.');
//     }
//     if ($orderItem['qty'] <= 0) {
//         throw new Exception('Quantity must be greater than zero.');
//     }

//     // compute line total
//     $lineTotal = $orderItem['price'] * $orderItem['qty'];

//     echo "Line total for SKU {$orderItem['sku']}: {$lineTotal}"."<br>";

// }catch(Exception $e){
//      echo "Error calculating line total: " . $e->getMessage()  ."<br>";
// }finally{
//     echo "Finished processing order item." ."<br>";
// }


// Exercise 2 — Select a shipping method safely

// $availableShipping = [
//     'flat_rate' => ['name' => 'Flat Rate', 'cost' => 50],
//     'free'      => ['name' => 'Free Shipping', 'cost' => 0]
// ];

// $selectedMethod = 'express'; // user chose an unsupported method

// try{
//     if(!array_key_exists($selectedMethod, $availableShipping)){
//         throw new Exception("Unsupported shipping method: {$selectedMethod}");
//     }

//     $method = $availableShipping[$selectedMethod];
//     echo "Selected shipping: {$method['name']} — cost: {$method['cost']}"."<br>";

// }catch (Exception $e) {
//     echo "Shipping error: ". $e->getMessage()."<br>";
// }finally {
//     echo "Shipping selection attempt finished."."<br>";
// }

// Exercise 3 — Importing a product row with required fields

// $product = [
//     'sku'   => 'TSHIRT-XL',
//     'name'  => 'T-Shirt XL',
//     'price' => 0 // invalid: price must be positive
// ];

// try{
//     if(!isset($product['sku']) || trim($product['sku']) === ''){
//         throw new Exception('Product SKU is required');
//     }
//     if (!isset($product['price']) || !is_numeric($product['price']) || $product['price'] <= 0) {
//          throw new Exception('Product price must be a positive number.');
//     }   
//     echo "Product {$product['sku']} imported successfully."."<br>";
// }catch (Exception $e) {
//     echo "Product import failed: " . $e->getMessage() . "\n";
// } finally {
//     echo "Import attempt finished for SKU: " . (isset($product['sku']) ? $product['sku'] : '[no-sku]') . "\n";
// }

// Challenge 1 — Bulk order validation.
// Input
// An array of order line items (each item is an array with sku, price, qty), for example:

// $order = [
//     ['sku'=>'A','price'=>100,'qty'=>2],
//     ['sku'=>'B','price'=>50,'qty'=>0],   // invalid: qty 0
//     ['sku'=>'C','price'=>30,'qty'=>1]
// ];

// try {
//     $ordertotal = 0;

//     foreach ($order as $item) {
//         if (!isset($item['price']) || !is_numeric($item['price'])) {
//             throw new Exception("Invalid price for SKU {$item['sku']}");
//         }
//         if (!isset($item['qty']) || !is_numeric($item['qty']) || $item['qty'] <= 0) {
//             throw new Exception("Invalid quantity for SKU {$item['sku']}");
//         }

//         $ordertotal += $item['price'] * $item['qty'];
//     }

//     echo "Order total: {$ordertotal}<br>";
// } catch (Exception $e) {
//     echo "Order total failed: " . $e->getMessage() . "<br>";
// } finally {
//     echo "Bulk validation finished.<br>";
// }

// $available = [
//     'flat_rate' => ['cost'=>40],
//     'local_pickup' => ['cost'=>0]
// ];
// $selection = 'express';

// try{
//     if(!array_key_exists($selection, $available)){
//         throw new Exception("Unsupported shipping method: {$selection}");
//     }

//     $method = $available[$selection];
//     echo "Selected Shipping method:{$selection}, cost: {$method['cost']}<br>";
// }catch(Exception $e){
//      echo "Error: " . $e->getMessage() . "<br>";
//       $fallback = 'local_pickup';
//        $method = $available[$fallback];
//        echo "Fallback applied. SHipping method: {$fallback}, cost: {$method['cost']}<br>";
// }finally {
//     echo "Shipping flow completed.<br>";
// }

// $update = ['sku'=>'PROD1', 'price'=>120]; 
// $errors = [];   // will collect any error messages
// $finishedAt = ''; // placeholder
// try {
//     if (!isset($update['sku']) || trim($update['sku']) === '') {
//         throw new Exception("SKU is required.");
//     }
//     if (!isset($update['price']) || !is_numeric($update['price'])) {
//         throw new Exception("Price is required and must be numeric.");
//     }
//     if ($update['price'] <= 0) {
//         throw new Exception("Price must be greater than zero.");
//     }

//     echo "Product {$update['sku']} updated successfully.<br>";
// } catch (Exception $e) {
//     $errors[] = $e->getMessage(); // store error in array
// } finally {
//     // mark when finished (using simple string for beginners)
//     $finishedAt = date("Y-m-d H:i:s");
// }

// $cart = [
//     ['sku' => 'ITEM1', 'name' => 'Bag',   'price' => 500, 'qty' => 1],
//     ['sku' => 'ITEM2', 'name' => 'Shoes', 'price' => -100, 'qty' => 2], // invalid price
//     ['sku' => 'ITEM3', 'name' => 'Hat',   'price' => 200, 'qty' => 1]
// ];
// $errors = [];
// $cartTotal = 0;
// $checkedAt = '';
 
// try{
//     foreach($cart as $item){
//         if (!isset($item['price']) || !is_numeric($item['price'])) {
//             throw new Exception("Invalid price for SKU {$item['sku']}");
//         }
//         if (!isset($item['qty']) || !is_numeric($item['qty']) || $item['qty'] <= 0) {
//             throw new Exception("Invalid data for SKU {$item['sku']}");
//         }
//          $cartTotal += $item['price'] * $item['qty'];
//     }
//      echo "Cart total: {$cartTotal}<br>";
// }catch(Exception $e){
//        $errors[] = $e->getMessage();
//     echo "Cart total failed: " . $e->getMessage() . "<br>";
// }finally{
//     $checkedAt = date("Y-m-d H:i:s");
//     echo "Cart validation finished:  {$checkedAt}";
// }
    // echo "<pre>"; print_r($orderdata);


// $availablePayments = [
//     'cod' => ['title' => 'Cash on Delivery'],
//     'card' => ['title' => 'Credit/Debit Card'],
//     'paypal' => ['title' => 'PayPal']
// ];

// $selectedPayment = 'upi'; // invalid choice
// try{
//     if(array_key_exists($selectedPayment,$availablePayments)){
//         echo "Payment method selected: " . $availablePayments[$selectedPayment]['title'] . "<br>";
//     }else{
//         throw new Exception("Unsupported payment method: {$selectedPayment}");
//     }
// }catch(Exception $e){
//     echo "Error: Unsupported payment method: {$selectedPayment}"."<br>";
// }finally{
//     $checkedAt = date("Y-m-d H:i:s");
//     echo "Payment validation finished at: {$checkedAt}";
// }

// $updateRequest = [
//     'sku' => 'ITEM100',
//     'qty' => -5   // invalid because stock cannot be negative
// ];

// $errors = [];
//  $processedAt = '';
// try{
//     if(isset($updateRequest['sku']) && ($updateRequest['qty'] > 0)){
//         echo "Stock updated: SKU {$updateRequest['sku']}, Qty = {$updateRequest['qty']}"."<br>";
//     }else{
//         throw new Exception("Invalid qty for SKU {$updateRequest['sku']}");
//     }

// }catch(Exception $e){
//    echo  $e->getMessage()."<br>";
// }finally{
//     $processedAt = date("Y-m-d H:i:s");
//     echo "Processed at:  {$processedAt}";
// }


// $cart = [
//     ['sku' => 'ITEM1', 'name' => 'Bag',   'price' => 500,  'qty' => 1],
//     ['sku' => 'ITEM2', 'name' => 'Shoes', 'price' => -100, 'qty' => 2], // invalid price
//     ['sku' => 'ITEM3', 'name' => 'Hat',   'price' => 200,  'qty' => 0], // invalid qty
//     ['sku' => '',      'name' => 'Gloves','price' => 50,   'qty' => 1], // missing sku
// ];

// $errors = [];
// $processedAt = '';

// try {
//     foreach ($cart as $cartitem) {
//         try {
//             if ($cartitem['sku'] === '') {
//                 throw new Exception("Missing SKU");
//             }

//             if ($cartitem['price'] === '' || !is_numeric($cartitem['price']) || $cartitem['price'] <= 0) {
//                 throw new Exception("Invalid price for SKU {$cartitem['sku']}");
//             }

//             if ($cartitem['qty'] === '' || !is_numeric($cartitem['qty']) || $cartitem['qty'] <= 0) {
//                 throw new Exception("Invalid qty for SKU {$cartitem['sku']}");
//             }

//         } catch (Exception $e) {
//             $errors[] = $e->getMessage();
//         }
//     }
// } finally {
//     $processedAt = date("Y-m-d H:i:s");
//     echo "Processed at: {$processedAt}<br>";
// }

// echo "<pre>";
// print_r($errors);
// echo "</pre>";

// $cart = [
//     ['sku' => 'ITEM1', 'name' => 'Bag',   'price' => 500, 'qty' => 1],
//     ['sku' => 'ITEM2', 'name' => 'Shoes', 'price' => -200, 'qty' => 2], // invalid price
// ];

// $shipping = [
//     'method' => 'express', // not available
//     'available' => [
//         'flat_rate'   => ['cost' => 40],
//         'local_pickup'=> ['cost' => 0]
//     ]
// ];

// $errors = [];
// $validatedAt = '';

// try {
//     // Validate cart
//     foreach ($cart as $cartitem) {
//         try {
//             if ($cartitem['sku'] === '') {
//                 throw new Exception("Missing SKU");
//             }
//             if (!is_numeric($cartitem['price']) || $cartitem['price'] <= 0) {
//                 throw new Exception("Invalid price for SKU {$cartitem['sku']}");
//             }
//             if (!is_numeric($cartitem['qty']) || $cartitem['qty'] <= 0) {
//                 throw new Exception("Invalid qty for SKU {$cartitem['sku']}");
//             }
//         } catch (Exception $e) {
//             $errors[] = $e->getMessage();
//         }
//     }

//     // Validate shipping
//     try {
//         if (!array_key_exists($shipping['method'], $shipping['available'])) {
//             throw new Exception("Unsupported shipping method: {$shipping['method']}");
//         }
//     } catch (Exception $e) {
//         $errors[] = $e->getMessage();
//         // fallback
//         $shipping['method'] = 'local_pickup';
//     }

// } finally {
//     $validatedAt = date("Y-m-d H:i:s");
//     echo "Always set timestamp: {$validatedAt}<br>";
// }

// echo "<pre>";
// print_r($errors);
// echo "Chosen shipping: {$shipping['method']}";
// echo "</pre>";

// class StockException extends Exception {}

// try {
//     $qty = -5;

//     if ($qty < 0) {
//         throw new StockException("Quantity cannot be negative: $qty");
//     }

//     echo "Order placed successfully!";
// } catch (StockException $e) {
//     echo "Stock Error: " . $e->getMessage();
// }

// class StockException extends Exception {}
// class PaymentException extends Exception {}

// try {
//     $paymentSuccess = false;
//     $qty = 2;

//     if ($qty <= 0) {
//         throw new StockException("Invalid stock quantity: $qty");
//     }

//     if (!$paymentSuccess) {
//         throw new PaymentException("Payment failed, please retry.");
//     }

//     echo "Order placed successfully!";
// } catch (StockException $e) {
//     echo "Stock Issue → " . $e->getMessage();
// } catch (PaymentException $e) {
//     echo "Payment Issue → " . $e->getMessage();
// }

// class OrderException extends Exception {
//     private $orderId;

//     public function __construct($message, $orderId) {
//         $this->orderId = $orderId;
//         parent::__construct($message);
//     }

//     public function getOrderId() {
//         return $this->orderId;
//     }
// }

// try {
//     throw new OrderException("Order not found", 12345);
// } catch (OrderException $e) {
//     echo "Error: " . $e->getMessage() . "\n";
//     echo "Order ID: " . $e->getOrderId();
// }

// try {
//     throw new Exception("Something went wrong!");
// } catch (Exception $e) {
//     error_log("Error: " . $e->getMessage(), 3, "app_errors.log");
//     echo "Error handled gracefully!";
// }

class InvalidQtyException extends Exception {}
class InvalidPriceException extends Exception {}

$order = [
    ['sku' => 'A', 'price' => 100, 'qty' => 2],
    ['sku' => 'B', 'price' => -50, 'qty' => 1], // invalid
];

try {
    foreach ($order as $item) {
        if ($item['qty'] <= 0) {
            throw new InvalidQtyException("Invalid quantity for SKU {$item['sku']}");
        }
        if ($item['price'] <= 0) {
            throw new InvalidPriceException("Invalid price for SKU {$item['sku']}");
        }
    }
    echo "Order validated successfully!";
} catch (InvalidQtyException $e) {
    error_log("[QTY ERROR] " . $e->getMessage() . "\n", 3, "order_errors.log");
    echo "Order failed: quantity issue.<br>";
} catch (InvalidPriceException $e) {
    error_log("[PRICE ERROR] " . $e->getMessage() . "\n", 3, "order_errors.log");
    echo "Order failed: price issue.<br>";
} catch (Exception $e) {
    error_log("[GENERAL ERROR] " . $e->getMessage() . "\n", 3, "order_errors.log");
    echo "Order failed due to unexpected error.<br>";
} finally {
    echo "Validation process completed.<br>";
}

?>