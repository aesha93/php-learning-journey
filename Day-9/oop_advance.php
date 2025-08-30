<?php

// 1. Inheritance
// class Product{
//     public $name;
//     public $price;
// }
// class Book extends Product{
//     public $author;
// }

// $book = new Book();
// $book->name = "Magento Basics";
// $book->price = 50;
// $book->author = "John Doe";
// // echo $book->name; // Magento Basics
// // echo $book->price; // 50
// // echo $book->author; // John Doe

// $product = new Product();
// echo $product->name = "Aesha";

// 2. Polymorphism

// class Shipping{
//     public function calculate($order){
//         return 0;
//     }
// }

// class Freeshipping extends Shipping{
//     public function calculate($order){
//         return 20;
//     }
// }

// class FlatRateShipping  extends Shipping{
//     public function calculate($order){
//         return 10;
//     }
// }

// class ExpressShipping  extends Shipping{
//     public function calculate($order){
//         return 30;
//     }
// }

// $order = ['total' => 100];
// $methods = [new Shipping(), new FreeShipping(), new FlatRateShipping(), new ExpressShipping()];


// foreach ($methods as $m) {
//     echo $m->calculate($order) . "<br>";
// }


// abstract class Payment {
//     abstract public function pay($order);
// }

// class CashOnDelivery extends Payment {
//     public function pay($order) {
//         return "Paying cash on delivery for " . $order['id'];
//     }
// }

// class Checkmo extends Payment {
//     public function pay($order) {
//         return "Paying Checkmo for " . $order['id'];
//     }
// }


// $order = ['id' => 123];
// $payment = new CashOnDelivery();
// echo $payment->pay($order);

// $invoice = ['id' => 4567567657657];
// $checkmo = new Checkmo();
// echo $checkmo->pay($invoice);

//4. Interfaces

// interface Discountable{
//     public function applyDiscount($product);
// }

// class PercentageDiscount implements Discountable{
//     public function applyDiscount($product){
//         return $product['price'] * 0.9;
//     }
// }

// $product = ['price' => 100];
// $d = new PercentageDiscount();
// echo $d->applyDiscount($product); // 90

// 5. Traits
// trait Logger{
//     public function log($msg){
//         echo "[LOG]: $msg"."<br>";
//     }
// }

// class Product{
//     use Logger;
// }

// class Order{
//     use Logger;
// }

// // $p = new Product();
// // $p->log("Product created");

// $p1 = new Order();
// $p1->log("Order created");

// 6. Magic Methods

// __get() / __set() → Handle access to non-existing or private properties.

// class Product {
//     private $data = [];
//     public function __set($key, $val) { $this->data[$key] = $val; }
//     public function __get($key) { return $this->data[$key] ?? null; }
// }
// $p = new Product();
// $p->color = "Red"; // __set
// echo $p->color;    // __get


// class Product {
//     public function __call($method, $args) {
//         echo "Method $method not found\n";
//     }
// }
// $p = new Product();
// $p->nonExistentMethod(); // triggers __call

// 7. Static Methods

// class PriceHelper{
//     public static function format($price){
//         return "$".number_format($price, 2);
//     }
// }
// echo PriceHelper::format(123.45); // $123.45

// Exercise 1: Inheritance + __construct

// Task:
// Create a base Product class with name and price. Create a Book subclass that adds an author. Use __construct to initialize.
// class Product{
//     public $name;
//     public $price;
//     public function __construct($name, $price){
//         $this->name = $name;
//         $this->price = $price;
//     }
// }

// class Book extends Product{
//     public $author;
//     public function __construct($name, $price, $author){
//         parent::__construct($name, $price);
//         $this->author = $author;
//     }
// }
// $book = new Book("Magento Guide", 50, "John Doe");
// echo $book->name . " - " . $book->author;

// class Shipping{
//     public function calculate($order){ return 0;}
// }

// class FreeShipping extends Shipping{
//         public function calculate($order) { return 0; }
// }

// class FlatRateShipping extends Shipping{
//     public function calculate($order){ return 15; }
// }

// $order = ['total' => 200];
// $method = [new FreeShipping(), new FlatRateShipping()];

// foreach($method as $m){
//         echo $m->calculate($order) . "\n";

// }

// interface Discountable{
//     public function applyDiscount($product);
// }

// trait Logger{
//     public function log($msg){
//         echo "[LOG] $msg"."<br>";
//     }
// }

// class PriceHelper{
//     public static function format($price){
//         return "$" . number_format($price, 2);
//     }
// }

// class PercentageDiscount implements Discountable {
//     use Logger;

//     public function applyDiscount($product) {
//         $discounted = $product['price'] * 0.8; // 20% off
//         $this->log("Applied discount to " . $product['name']);
//         return $discounted;
//     }
// }

// $product = ['name' => "Shirt", 'price' => 100];
// $d = new PercentageDiscount();
// $newPrice = $d->applyDiscount($product);
// echo PriceHelper::format($newPrice);


// trait Logger{
//     public function log($msg){
//         echo "[LOG] $msg"."<br>";
//     }
// }
// class Product{
//     use Logger;
//     public $data;
//     public function __construct($name, $price){
//         $this->data = ['name' => $name, 'price' => $price];
//         $this->log("Product created: {$name}");
//     }
// }

// class Order{
//     use Logger;
//     public $data;
//     public function __construct($id, $total){
//         $this->data = ['id' => $id, 'total' => $total];
//         $this->log("Order created: #{$id}");
//     }
// }
// $p = new Product("Shirt", 100);
// $o = new Order(1, 250);


// trait Loggger{
//     public function log($msg){
//         echo "[LOG] $msg". "<br>";
//     }
// }

// class Product{
//     use Loggger;
//     public $data;
//     public function __construct($name, $price){
//         $this->data = ['name' => $name, 'price' => $price];
//         $this->log("Product created: {$name}");
//     }
// }

// class Order{
//     use Loggger;
//     public $data;
//     public function __construct($id, $total){
//         $this->data = ['id' => $id, 'total' => $total];
//         $this->log("Order created: #{$id}");
//     }
// }

// $p = new Product("Shirt", 100);
// $o = new Order(1, 250);

// class Product{
//     private $data = [];

//     public function __set($key, $value){
//         $this->data[$key] = $value;
//     }

//     public function __get($key){
//         return $this->data[$key] ?? null ;
//     }
// }

// $p = new Product();
// $p->color = "Red";
// $p->size = "M"; 

// echo $p->color . " " . $p->size;

// Exercise 3: Magic __call

// class Order{
//     public $data;
//     public function __construct($id, $total){
//         $this->data = ['id' => $id, 'total' => $total];
//     }

//     public function __call($method, $args) {
//         return "Method $method not found";
//     }
// }

// $o = new Order(101, 500);
// echo $o->nonExistentMethod();

// Exercise 1: Inheritance + __construct

// Task:
// Create a base Product class with name and price. Create a Book subclass that adds an author. Use __construct to initialize.
// class Product {
//     public $name;
//     public $price;
//     public function __construct($name, $price) {
//         $this->name = $name;
//         $this->price = $price;
//     }
// }

// class Book extends Product {
//     public $author;
//     public function __construct($name, $price, $author) {
//        parent::__construct($name, $price);
//         $this->author = $author;
//     }
// }

// $book = new Book("Magento Guide", 50, "John Doe");
// echo $book->name . " - " . $book->author;

// Exercise 2: Polymorphism with Shipping
// Task:
// Define two shipping classes (FreeShipping, FlatRateShipping) both having a calculate method. Loop through them and print results.

// class Shipping{
//     public function calculate($order){
//         return 0;
//     }
// }

// class Fresshipping extends Shipping{
//     public function calculate($order){
//         return 0;
//     }
// }

// class FlatRateShipping extends Shipping {
//     public function calculate($order){
//         return 15;
//     }
// }

// $order = ['total' => 200];
// $methods = [new Fresshipping(), new FlatRateShipping()];

// foreach($methods as $m){
//     echo $m->calculate($order) . "<br>";
// }

// Exercise 3: Interface + Trait + Static Method

// Task:
// Create a Discountable interface with applyDiscount(). Implement PercentageDiscount.
// Use a Logger trait to log discount application.
// Add a static helper method to format price.


// interface Discountable{
//     public function applyDiscount($product);
// }

// trait Logger{
//     public function log($msg){
//         echo "[LOG] $msg"."<br>";
//     }
// }

// class PriceHelper{
//     public static function format($price){
//         return "$". number_format($price, 2);
//     }
// }

// class PercentageDiscount implements Discountable {
//     use Logger;

//     public function applyDiscount($product){
//         $discounted = $product['price'] * 0.8;
//         $this->log("Applied discount to " . $product['name']);
//         return $discounted;
//     }

// }

// $product = ['name' => 'Shirt', 'price' => 100];
// $d = new PercentageDiscount();
// $newPrice = $d->applyDiscount($product);
// echo PriceHelper::format($newPrice);

// Challenge 1: Abstract + Polymorphism

// Create an abstract Payment class with method pay($order).

// Implement CashOnDelivery and CreditCard classes.

// Given an order array (['id'=>101, 'total'=>500]), call pay() for both methods.

// Expected output: different payment messages.

use OAuth\OAuth2\Service\Paypal;

abstract class Payment {
    abstract public function pay($order);
}

class CashOnDelivery extends Payment{
    public function pay($order){
        return "Paying cash on delivery for "  . $order['id']. " and total :".  $order['total'];
    }
}

$order = ['id'=>101, 'total'=>500];
$payment = new CashOnDelivery();
echo $payment->pay($order);

?>