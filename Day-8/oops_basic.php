<?php
// class Product{
//     public $name;
//     public $price;
// }

// $product1 = new Product();
// $product1->name = 'Laptop';
// $product1->price = 500;

// $product2 = new Product();
// echo $product2->name = "Phone";
// echo $product2->price = 300;

// class Product {
//     public $name;
//     public $price;

//     public function __construct($name, $price){
//         $this->name = $name;
//         $this->price = $price;
//     }
// }
// $product = new Product("Tablet", 200);
// echo $product->name;

// class Logger{
//     public function __destruct()
//     {
//         echo "Logger closed"."<br>";
//     }
// }
// $log = new Logger();

// Exercise 1: Create a Product Class
// Task:

// Make a Product class with properties name and price.

// Add a method getInfo() that returns a string like: "Product: Laptop, Price: 500".

// Create 2 objects and display their info.

// class Product{
//     public $name;
//     public $price;

//     public function getInfo(){
//         return "Product: $this->name, Price: $this->price";
//     }
// }
// $product1 = new Product();
// $product1->name = "Laptop";
// $product1->price = 500;

// $product2 = new Product();
// $product2->name = "Headphones";
// $product2->price = 50;

// echo $product1->getInfo()."<br>";
// echo $product2->getInfo()."<br>";

// class Order {
//     public $orderId;
//     public $total;

//     public function __construct($orderId, $total) {
//         $this->orderId = $orderId;
//         $this->total = $total;
//     }

//     public function getSummary() {
//         return "Order #$this->orderId, Total: $this->total";
//     }
// }

// $order1 = new Order(123, 1000);
// $order2 = new Order(124, 500);

// echo $order1->getSummary() . "<br>";
// echo $order2->getSummary() . "<br>";

// Challenge 1:

// Create a Customer class with:

// Properties: name (public), email (private).

// Constructor to set both values.

// Method getContactInfo() should return "Customer: John, Email: john@example.com".

//  class Customer {
//     public $name;
//     private $email;

//     public function __construct($name, $email){
//         $this->name = $name;
//         $this->email = $email;
//     }
//     public function getContactInfo(){
//         return "Customer: {$this->name}, Email: {$this->email}";
//     }
//  }

//   $customer = new Customer('test', 'nn@gmail.com');
//   echo $customer->getContactInfo() . "<br>";

// Challenge 2:

// Make a CartItem class with:

// Properties: productName, quantity, price.

// Constructor to set them.

// Method getLineTotal() → multiply quantity × price.

// Create 2 cart items and print their totals.


// class CartItem{
//     public $productName;
//     public $quantity;
//     public $price;

//     public function __construct($productName, $quantity, $price){
//         $this->productName = $productName;
//         $this->quantity = $quantity;
//         $this->price = $price;
//     }

//     function getLineTotal(){
//         $totals = $this->quantity * $this->price;
//         return $totals;
//     }

// }

//  $cartItem = new CartItem('test', 10, 5);
//   $cartItem1 = new CartItem('demo', 3, 5);
//  echo $cartItem->getLineTotal() . "<br>";
//  echo $cartItem1->getLineTotal() . "<br>";
//   echo $customer->getContactInfo() . "<br>";

// Challenge 3:

// Create a Payment class with:

// Private property $method and protected property $amount.

// Public method setPayment($method, $amount) to assign values.

// Method getPaymentInfo() should return "Method: Credit Card, Amount: 1500".

// class Payment{
//     private $method;
//     protected $amount;

//     public function __construct($method, $amount)
//     {
//         $this->method = $method; 
//         $this->amount = $amount;
//     }

//     public function setPayment($method, $amount){
//         $this->method = $method;
//         $this->amount = $amount;
//     }

//     public function getPaymentInfo(){
//         return "Method: {$this->method}, Amount: {$this->amount}"."<br>";
//     }

// }

// $payment = new Payment('Express', 1500);
//  echo $payment->getPaymentInfo() . "<br>";

// $payment1 = new Payment('American visa', 2500);
//  echo $payment1->getPaymentInfo() . "<br>";

// class Product{
//     public $name;
//     public $price;

//     public function __construct($name, $price){
//         $this->name = $name;
//         $this->price = $price;
//     }
   
//     public function getInfo(){
//         return "Product: {$this->name}, Price: {$this->price}";
//     }
// }

// class CartItem{
//     public $product;
//     public $quantity;

//     public function __construct(Product $product, $quantity){
//         $this->product = $product;
//         $this->quantity = $quantity;
//     }

//     public function getLineTotal(){
//         return $this->product->price * $this->quantity;
//     }

//     public function getItemDetails(){
//         return "{$this->product->name} x {$this->quantity} = " .$this->getLineTotal();
//     }
// }

// class Order{
//     private $orderId;
//     private $items = [];
//     private $total = 0;

//     public function __construct($orderId){
//         $this->orderId = $orderId;
//     }

//     public function addItem(CartItem $item){
//         $this->items[] = $item;
//         $this->total += $item->getLineTOtal();
//     }

//     public function getSummary(){
//         $summary = "Order #{$this->orderId}"."<br>";
//          foreach ($this->items as $item) {
//                 $summary .= $item->getItemDetails() . "\n";
//             }
//              $summary .= "Total: {$this->total}\n";
//         return $summary;
//     }
    
//     public function getTotal() {
//         return $this->total;
//     }

// }

// class Payment {
//     private $method;
//     private $amount;

//     public function __construct($method, $amount) {
//         $this->method = $method;
//         $this->amount = $amount;
//     }

//     public function getPaymentInfo() {
//         return "Payment Method: {$this->method}, Amount Paid: {$this->amount}";
//     }
// }

// // 1. Create Products
// $product1 = new Product("Laptop", 500);
// $product2 = new Product("Mouse", 50);

// // 2. Create CartItems
// $cartItem1 = new CartItem($product1, 2); // 2 Laptops
// $cartItem2 = new CartItem($product2, 3); // 3 Mice

// // 3. Create Order
// $order = new Order(1001);
// $order->addItem($cartItem1);
// $order->addItem($cartItem2);

// // 4. Display Order Summary
// echo nl2br($order->getSummary());

// // 5. Make Payment
// $payment = new Payment("Credit Card", $order->getTotal());
// echo $payment->getPaymentInfo();

// Create a Customer class with:

// Properties: name (public), email (private).

// Constructor to set both values.

// Method getContactInfo() should return "Customer: John, Email: john@example.com".

// class Customer{
//     public $name;
//     private $email;

//     public function __construct($name, $email) {
//         $this->name = $name;
//         $this->email = $email;
//     }

//     function getContactInfo(){
//         return "Customer: {$this->name}, Email: {$this->email}";
//     }
// }
// $customer = new Customer("Aesha", "aeshatest@gmail.com");
// echo $customer->getContactInfo()."<br>";

// $customer1 = new Customer("Niraj", "nirajtest@gmail.com");
// echo $customer1->getContactInfo()."<br>";

// Challenge 2:

// Make a CartItem class with:

// Properties: productName, quantity, price.

// Constructor to set them.

// Method getLineTotal() → multiply quantity × price.

// Create 2 cart items and print their totals.

// class CartItem{
//     private $productName;
//     private $quantity;
//     private $price;

//     public function __construct(
//         $productName,
//         $quantity,
//         $price
//     )
//     {
//         $this->productName = $productName;
//         $this->quantity = $quantity;
//         $this->price = $price;
//     }

//     public function getLineTotal(){
//         $total = $this->quantity * $this->price;
//         return $total;
//     }

// }

// $cartitem = new CartItem("watch", "10", "5");
// echo $cartitem->getLineTotal()."<br>";
// $cartitem1 = new CartItem("flass", "50", "5");
// echo $cartitem1->getLineTotal()."<br>";

// Challenge 3:

// Create a Payment class with:

// Private property $method and protected property $amount.

// Public method setPayment($method, $amount) to assign values.

// Method getPaymentInfo() should return "Method: Credit Card, Amount: 1500".

class Payment{
    private $method;
    protected $amount;
    public $title;

    public function setPayment($method1, $amount1, $title1){
        $this->method = $method1;
        $this->amount = $amount1;
        $this->title = $title1;
    }

    public function getPaymentInfo(){
        return "Method: {$this->method}, Amount: {$this->amount}, Title: {$this->title}"."<br>";
    }

}

$payment = new Payment();
$payment->setPayment("Express", 2000, "Express Title");
echo $payment->title;
// echo $payment->method;
// echo $payment->getPaymentInfo();

// class Product {
//     public $name;
//     public $price;

//     public function __construct($name, $price){
//         $this->name = $name;
//         $this->price = $price;
//     }

//     public function getInfo() {

//         return "Product: $this->name, Price: $this->price";
//     }
// }

// $product = new Product("Aesha" , "10");
// echo $product->getInfo();
?>