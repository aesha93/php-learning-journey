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

?>