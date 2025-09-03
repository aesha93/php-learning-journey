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

// abstract class Payment {
//     abstract public function pay($order);
// }

// class CashOnDelivery extends Payment{
//     public function pay($order){
//         return "Paying cash on delivery for "  . $order['id']. " and total :".  $order['total'];
//     }
// }

// $order = ['id'=>101, 'total'=>500];
// $payment = new CashOnDelivery();
// echo $payment->pay($order);

// Normal Constructor

// class User {
//     public $name;
//     public $email;

//     public function __construct($name, $email) {
//         $this->name  = $name;
//         $this->email = $email;
//     }
// }

// $user = new User("Aesha", "aesha@example.com");
// echo $user->name;   // Aesha

// Constructor with Default Values

// class User {
//     public $name;
//     public $email;

//     public function __construct($name = "Guest", $email = "guest@example.com") {
//         $this->name  = $name;
//         $this->email = $email;
//     }
// }

// $user1 = new User("Aesha", "aesha@example.com");
// echo $user1->name;  // Aesha

// $user2 = new User();
// echo $user2->name;  // Guest

// 3. Mixing Required + Default

// class Product {
//     public $name;
//     public $price;
//     public $stock;

//     public function __construct($name, $price = 100, $stock = 10) {
//         $this->name  = $name;
//         $this->price = $price;
//         $this->stock = $stock;
//     }
// }

// $p1 = new Product("Laptop"); 
// echo $p1->price;  // 100 (default)
// echo $p1->stock;  // 10 (default)

// $p2 = new Product("Phone", 500, 50); 
// echo $p2->price;  // 500 (custom)


// class Book{
//     public $title;
//     public $author;

//     public function __construct($title, $author = "Unknown"){
//         $this->title = $title;
//         $this->author = $author;
//     }

//     public function getInfo(){
//         return "Book: {$this->title} by {$this->author}";
//     }
// }

// $book1 = new Book("Harry Potter","J.K. Rowling");
// echo "Book: {$book1->title} by {$book1->author}"."<br>";
// $book = new Book("Unknown");
// echo "Book: {$book->title} by {$book->author}"."<br>";

// class Product{
//     public $name;
//     public $price;
//     public $stock;

//     public function __construct($name, $price = 100, $stock = 10)
//     {
//         $this->name = $name;
//         $this->price = $price;
//         $this->stock = $stock;   
//     }

//     public function getDetails(){
//         return "Product: {$this->name}, Price: {$this->price}, Stock: {$this->stock}";
//     }
// }

// $product = new Product("Laptop");
// echo $product->getDetails(). "<br>";

// $product1 = new Product("Phone", 500, 50);
// echo $product1->getDetails();

// Exercise 3 (Advanced) → Real-World Style

// 👉 Create a User class with:

// Properties: id, name, role

// Constructor →

// id → required

// name → required

// role → default "customer"

// Method: getProfile() → "ID: 1, Name: Aesha, Role: customer"

// class User{
//     public $id;
//     public $name;
//     public $role;

//     public function __construct($id, $name, $role = "customer"){
//         $this->id = $id;
//         $this->name = $name;
//         $this->role = $role;
//     }

//     public function getProfile(){
//         return "ID: {$this->id}, Name: {$this->name}, Role: {$this->role}";
//     }
// }

// $user = new User("1", "Aesha");
// echo $user->getProfile()."<br>";

// $user1 = new User("2", "John", "admin");
// echo $user1->getProfile();

//Wrong pattern
// class BankAccount{
//     public $balance = 0;
// }

// $acc = new BankAccount();
// $acc->balance = -1000;

// class BankAccount{
//     private $balance = 0;

//     public function deposit($amount) {
//         if($amount > 0){
//             $this->balance += $amount;
//         }
//     }

//     public function getBalance() {
//         return $this->balance;
//     }

// }

// $acc = new BankAccount();
// $acc->deposit(500);
// echo $acc->getBalance();   // ✅ 500

// Access Modifiers in Action

// class Demo {
//     public $x = 10;
// }

// $d = new Demo();
// echo $d->x;

// private → Only inside same class

// class Demo{
//     private $x = 10;

//     public function getX(){
//         return $this->x;
//     }
// }
// $d = new Demo();
// echo $d->getX(); 

// protected → Class + Child

// class ParentDemo{
//     protected $x = 10;
// }

// class ChildDemo extends ParentDemo{
//     public function showX(){
//         return $this->x;
//     }
// }    

// $child = new ChildDemo();
// echo $child->showX();  // 10

// class Car{
//     private $model;

//     public function __construct($model)
//     {
//         $this->model = $model;
//     }

//     public function getModel(){
//         return "Car model: {$this->model}";
//     }
// }

// $car = new Car("Tesla");
// echo $car->getModel();

// class BankAccount{
//     private $balance = 0;

//     public function __construct($balance)
//     {
//         $this->balance = $balance;
//     }

//     public function deposit($amount){
//         if($amount > 0){
//             $this->balance += $amount;
//         }
//         return "Depositing" ."   ". $this->balance;
//     }

//     public function withdraw($amount){
//         if($amount > 0){
//             $this->balance -= $amount;
//         }
//         return "Withdrawing" ."   ". $amount;
//     }

//     public function getBalance(){
//         return "Balance" ."   ". $this->balance;
//     }
// }

// $bankAccount = new BankAccount(0);
// echo $bankAccount->deposit(500)."<br>";
// echo $bankAccount->withdraw(200)."<br>";
// echo $bankAccount->getBalance(300)."<br>";

// interface Logger{
//     public function log($message);
// }

// class FileLogger implements Logger {
//     public function log($message){
//             echo "Logging to file: $message<br>";
//     }
// }

// class DatabaseLogger implements Logger{
//     public function log($message){
//           echo "Logging to database: $message<br>";
//     }
// }

// function doLog(Logger $logger, $msg) {
//     $logger->log($msg);
// }

// $fileLogger = new FileLogger();
// $dbLogger = new DatabaseLogger();

// doLog($fileLogger, "File log example");
// doLog($dbLogger, "DB log example");


// class Animal {
//     public function speak() {
//         return "Animal sound";
//     }
// }

// class Dog extends Animal {
//     public function speak() {
//         return "Woof";
//     }
// }

// class Cat extends Animal {
//     public function speak() {
//         return "Meow";
//     }
// }

// // Test polymorphism
// $animals = [new Dog(), new Cat()];

// foreach ($animals as $animal) {
//     echo $animal->speak() . "<br>";
// }

// interface Payment{
//     public function pay($amount);
// }

// class PaypalPayment implements Payment{
//     public function pay($amount){
//         return "Paid $amount using PayPal";
//     }
// }

// class StripePayment implements Payment{
//     public function pay($amount){
//         return "Paid $amount using Stripe";
//     }
// }

// function processPayment(Payment $payment, $amount){
//     echo $payment->pay($amount)."<br>";
// }

// processPayment(new PaypalPayment(), 100);
// processPayment(new StripePayment(), 200);

// abstract  class Shape {
//     abstract public function area();
// }

// interface Drawable{
//     public function draw();
// }

// class  Rectangle extends Shape implements Drawable{
//     private $width;
//     private $height;

//     public function __construct($w, $h)
//     {
//         $this->width = $w;
//         $this->height = $h;
//     }

//     public function area() {
//         return $this->width * $this->height;
//     }

//     public function draw() {
//         return "Drawing a rectangle";
//     }

// }

// class Circle extends Shape implements Drawable {
//     private $radius;

//     public function __construct($r) {
//         $this->radius = $r;
//     }

//     public function area() {
//         return round(pi() * $this->radius * $this->radius, 1);
//     }

//     public function draw() {
//         return "Drawing a circle";
//     }
// }

// // Test polymorphism
// $shapes = [new Rectangle(10, 5), new Circle(5)];

// foreach ($shapes as $shape) {
//     echo get_class($shape) . " area: " . $shape->area() . ", " . $shape->draw() . "<br>";
// }


// abstract class Shape {
//     abstract public function area();
// }

// interface Drawable {
//     public function draw();
// }

// class Rectangle extends Shape implements Drawable {
//     private $width;
//     private $height;

//     public function __construct($w, $h) {
//         $this->width = $w;
//         $this->height = $h;
//     }

//     public function area() {
//         return $this->width * $this->height;
//     }

//     public function draw() {
//         return "Drawing a rectangle";
//     }
// }

// class Circle extends Shape implements Drawable {
//     private $radius;

//     public function __construct($r) {
//         $this->radius = $r;
//     }

//     public function area() {
//         return round(pi() * $this->radius * $this->radius, 1);
//     }

//     public function draw() {
//         return "Drawing a circle";
//     }
// }

// // Test polymorphism
// $shapes = [new Rectangle(10, 5), new Circle(5)];

// foreach ($shapes as $shape) {
//     echo get_class($shape) . " area: " . $shape->area() . ", " . $shape->draw() . "<br>";
// }

// use Magento\Quote\Api\Data\PaymentInterface;

// interface PaymentMethodInterface{
//     public function authorize(float $amount): bool;
//     public function capture(float $amount): bool;
// }

// abstract class AbstractPayment implements PaymentInterface{
//     protected string $methodCode;

//     public function __construct(string $methodCode)
//     {
//         $this->methodCode = $methodCode;
//     }

//     public function getMethodCode():string
//     {
//         return $this->methodCode;
//     }

//     abstract public function getTitle(): string;
// } 

// class CreditCardPayment extends AbstractPayment {
//     public function getTitle(): string {
//         return "Credit Card";
//     }

//     public function authorize(float $amount): bool {
//         echo "Authorizing $amount via Credit Card\n";
//         return true;
//     }

//     public function capture(float $amount): bool {
//         echo "Capturing $amount via Credit Card\n";
//         return true;
//     }
// }


// class PayPalPayment extends AbstractPayment {
//     public function getTitle(): string {
//         return "PayPal";
//     }

//     public function authorize(float $amount): bool {
//         echo "Authorizing $amount via PayPal\n";
//         return true;
//     }

//     public function capture(float $amount): bool {
//         echo "Capturing $amount via PayPal\n";
//         return true;
//     }
// }

// $payments = [
//     new CreditCardPayment("cc"),
//     new PayPalPayment("paypal")
// ];

// foreach ($payments as $payment) {
//     echo "Method: " . $payment->getTitle() . " (Code: " . $payment->getMethodCode() . ")\n";
//     $payment->authorize(100.00);
//     $payment->capture(100.00);
//     echo "------------------------\n";
// }


interface Flyable{
    public function fly();
}

interface Swimmable{
    public function swim();
}

class Duck implements Flyable,Swimmable{
    public function fly(){
        echo "Duck is flying"."<br>";
    }

    public function swim() {
        echo "Duck is swimming"."<br>";
    }
}

$duck = new Duck();
$duck->fly();
$duck->swim();

?>
