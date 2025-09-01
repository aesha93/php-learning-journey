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

// // Challenge 1: Abstract + Polymorphism

// // Create an abstract Payment class with method pay($order).

// // Implement CashOnDelivery and CreditCard classes.

// // Given an order array (['id'=>101, 'total'=>500]), call pay() for both methods.

// // Expected output: different payment messages.

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

// 1. Inheritance

// class Product{
//     public $data;
//     public  function __construct($data){
//         $this->data = $data;
//     }

//     public function getName(){
//         return $this->data['name'];
//     }
// }

// class   SpecialProduct extends Product{
//     public function getDiscountedPrice(){
//         return $this->data['price'] * 0.9;
//     }
// }

// $productData = ['name' => 'T-Shirt', 'price' => 100];
// $special = new SpecialProduct($productData);

// echo $special->getName();
// echo $special->getDiscountedPrice();

// Polymorphism

// class Product{
//     public function getType(){
//         return "Genric Product";
//     }
// }

// class DigitalProduct extends Product{
//     public function getType(){
//         return "Digital DOwnload";
//     }
// }

// class PhysicalProduct extends Product{
//     public function getType(){
//         return "Physical Item";
//     }
// }

// $products = [new DigitalProduct(), new PhysicalProduct()];

// foreach($products as $p){
//     echo $p->getType(). "<br>";
// }

// 3. Abstract Classes


// abstract class ShippingMethod {
//     abstract public function calculateCost($order);

//     public function getLabel() {
//         return "Shipping Method";
//     }
// }

// class FreeShipping extends ShippingMethod {
//     public function calculateCost($order) {
//         return 0;
//     }
// }

// $order = ['subtotal' => 200];
// $ship = new FreeShipping();
// echo $ship->calculateCost($order); // Output: 0

// 4. Interfaces

// interface PaymentMethod {
//     public function pay($order);
// }

// class PayPal implements PaymentMethod{
//     public function pay($order){
//         return "Paid with Paypal: ". $order['total'];
//     }
// }

// $order = ['toatal' => 300];
// $payment = new Paypal();
// echo $payment->pay($order);

// class Product{
//     Private $data = [];

//     public function __construct($data){
//         $this->data = $data;
//     }

//     public function __get($name){
//         return $this->data[$name] ?? "Not found";
//     }

//     public function __set($name, $value){
//         $this->data[$name] = $value;
//     }

//     public function __call($name, $args){
//         return "Method $name does not exist";
//     }
// }

// $p = new Product(['name' => 'Shoes']);
// echo $p->name;
// $p->color = "Red";
// echo $p->color;
// echo $p->undefinedMethod();
// What is Inheritance?
// Inheritance is when one class (child class) can use the properties and methods of another class (parent class).

// 🔹 2. Example Without Inheritance

// class Car{
//     public $brand;
//     public $color;

//     public function start(){
//         return "Car Started!";
//     }
// }

// $car1 = new Car();
// $car1->brand = "Toyota";
// $car1->color = "Red";

// echo $car1->start();

//3.Example With Inheritance

//  class Vehicle{
//     public $brand;
//     public $color;

//     public function start(){
//         return "Vehicle started!";
//     }
//  }

//  class Car extends Vehicle {
//     public $seats;

//     public function carInfo(){
//         return "Brand: $this->brand, Color: $this->color, Seats: $this->seats";
//     }
//  }


//  class Truck extends Vehicle{
//     public $capacity;

//     public function truckInfo(){
//         return "Brand: $this->brand, Color: $this->color, Capacity: $this->capacity tons";
//     }
//  }

// // 4. Using the Classes

// $car = new Car();
// $car->brand = "Toyota";
// $car->color = "Red";
// $car->seats = 4;

// echo $car->start();
// echo $car->carInfo();

// $truck = new Truck();
// $stuck->brand = "Volvo";
// $truck->color = "Blue";
// $truck->capacity = 20;

// echo $truck->start();
// echo $truck->truckInfo();


// Parent class
// class Animal {
//     public $name;
//     public $color;

//     public function eat() {
//         return $this->name . " is eating.". $this->color . " is my color.". "<br>";
//     }
// }

// // Child class
// class Dog extends Animal {
//     public function bark() {
//         return $this->name . " says Woof!". $this->color . " is my color."."<br>";
//     }
// }

// // Child class
// class Cat extends Animal {
//     public function meow() {
//         return $this->name . " says Meow!". $this->color . " is my color."."<br>";
//     }
// }

// // Usage
// $dog = new Dog();
// $dog->name = "Tommy";
// $dog->color = "Brown";
// echo $dog->eat();   // inherited from Animal
// echo $dog->bark();  // specific to Dog

// $cat = new Cat();
// $cat->name = "Kitty";
// $cat->color = "White";
// echo $cat->eat();   // inherited from Animal
// echo $cat->meow();  // specific to Cat

// class Employee{
//     public $name;
//     public $salary;

//     public function getInfo(){
//         return "Name: {$this->name}, salary: {$this->salary}";
//     }
// }

// class Manager extends Employee {
//     public $department;

//     public function getInfo() {
//         return parent::getInfo() . ", Department: {$this->department}";
//     }
// }

// class Developer extends Employee{
//         public $language;

//         public function getInfo(){
//             return parent::getInfo() . ", Language: {$this->language}";
//         }
// }

// $mgr = new Manager();
// $mgr->name = "Alice";
// $mgr->salary = 80000;
// $mgr->department = "HR";
// echo $mgr->getInfo();

// $dev = new Developer();
// $dev->name = "Bob";
// $dev->salary = 60000;
// $dev->language = "PHP";
// echo $dev->getInfo();

// 🔹 Exercise 1: Vehicle Inheritance

// 👉 Create a parent class Vehicle with:

// Properties: $brand, $year

// Method: getInfo() → return "Brand: X, Year: Y"

// 👉 Create child classes:

// Bike → add $type (sports, cruiser, etc.) and method getInfo() (override parent).

// Bus → add $capacity and method getInfo() (override parent).

// ✅ Expected Output Example:

// Brand: Yamaha, Year: 2020, Type: Sports
// Brand: Volvo, Year: 2018, Capacity: 50

// class Vehicle {
//     public $brand;
//     public $year;

//     public function getInfo(){
//         return "Brand: {$this->brand}, Year: {$this->year}";
//     }
//  }

// class Bike extends Vehicle{
//     public $type;

//     public function getInfo(){
//         return parent::getInfo(). ", Type: {$this->type}";
//     }
// } 

// class Bus extends Vehicle{
//     public $capacity;

//     public function getInfo(){
//                 return parent::getInfo() . ", Capacity: {$this->capacity}";

//     }
// }

// $bike = new Bike();
// $bike->brand = "Yamaha";
// $bike->year = 2020;
// $bike->type = "Sports";
// echo $bike->getInfo() . PHP_EOL;

// $bus = new Bus();
// $bus->brand = "Volvo";
// $bus->year = 2018;
// $bus->capacity = 50;
// echo $bus->getInfo();

// class Shape {
//     public function area() {
//         return "Area calculation not defined";
//     }
// }

// class Circle extends Shape {
//     public $radius;

//     public function area() {
//         return 3.14 * $this->radius * $this->radius;
//     }
// }

// class Rectangle extends Shape {
//     public $width;
//     public $height;

//     public function area() {
//         return $this->width * $this->height;
//     }
// }

// // Usage
// $circle = new Circle();
// $circle->radius = 5;
// echo "Circle Area: " . $circle->area() . "<br>";

// $rectangle = new Rectangle();
// $rectangle->width = 10;
// $rectangle->height = 5;
// echo "Rectangle Area: " . $rectangle->area(). "<br>";


// class Student{
//     public $name;
//     public $rollNumber;

//     public function getInfo(){
//         return "Name: {$this->name}, Roll: {$this->rollNumber}";
//     }
// }

// class GraduateStudent extends Student{
//     public $thesisTitle;

//     public function getInfo(){
//          return parent::getInfo() . ", Thesis: {$this->thesisTitle}";
//     }
// }

// $student = new Student();
// $student->name = "Aesha";
// $student->rollNumber = "101";

// $graduateStudent = new GraduateStudent();
// $graduateStudent->name = "Niraj";
// $graduateStudent->rollNumber = "102";
// $graduateStudent->thesisTitle = "AI in Education";
// echo $graduateStudent->getInfo();

// class Employee{
//     public $name;
//     public $baseSalary;

//     public function calculateSalary(){
//         return $this->baseSalary;
//     }
// }

// class FullTimeEmployee extends Employee{
//     public $bonus;

//     public function calculateSalary(){
//         return $this->baseSalary + $this->bonus;
//     }
// }

// class PartTimeEmployee extends Employee{
//     public $hoursWorked;
//     public $hourlyRate;

//     public function calculateSalary(){
//         return $this->hoursWorked * $this->hourlyRate;
//     }
// }

// $fullTimeEmployee = new FullTimeEmployee;
// $fullTimeEmployee->name = "Tiya";
// $fullTimeEmployee->baseSalary = 30000;
// $fullTimeEmployee->bonus = 30000;
// echo "Full-time Salary: " . $fullTimeEmployee->calculateSalary() . "<br>";

// $partTimeEmployee = new PartTimeEmployee;
// $partTimeEmployee->hoursWorked = 100;
// $partTimeEmployee->hourlyRate = 200;
// echo "Part-time Salary: " . $partTimeEmployee->calculateSalary();

// class Book{
//     public $title;
//      public $author;
//       public $price;

//       public function getInfo(){
//         return "Title: {$this->title}, Author: {$this->author}, Price: {$this->price}";
//       }
// }
// class EBook extends Book{
//     public $fileSize;
//     public function getInfo(){
//         return parent::getInfo()." File Size: {$this->fileSize} MB";
//     }
// }

// class PrintedBook extends Book{
//     public $shippingCost;
//     public function getInfo(){
//         $total = $this->price + $this->shippingCost;
//         return parent::getInfo()." Total Price: {$total}";
//     }
// }

// $ebook = new EBook;
// $ebook->title = "PHP Basics";
// $ebook->author = "John";
// $ebook->price = 200;
// $ebook->fileSize = "5";
// echo $ebook->getInfo()."<br>";

// $printedBook = new PrintedBook();
// $printedBook->title = "OOP in PHP";
// $printedBook->author = "Aesha";
// $printedBook->price = 300;
// $printedBook->shippingCost = 50;
// echo $printedBook->getInfo();

// class BankAccount{
//     private $accountNumber;
//     protected $balance;

//     public function __construct($accNum, $balance){
//         $this->accountNumber = $accNum;
//         $this->balance = $balance;
//     }

//     public function getAccountNumber(){
//         return $this->accountNumber;
//     }

//     public function getBalance(){
//         return $this->balance;
//     }
// }

// $bankAccount = new BankAccount("10245415414", "100000");
// echo $bankAccount->getAccountNumber(). "<br>";
// echo $bankAccount->getBalance(). "<br>";


// class CurrentAccount extends BankAccount{
//     private $overdraftLimit;

//     public function setOverdraft($limit){

//     }

//     public function withdraw($amount){

//     }
//     public function getInfo(){

//     }
// }

// abstract class Shape {
//     abstract public function area();

//     public function description() {
//         return "This is a shape.";
//     }
// }

// class Circle extends Shape {
//     private $radius;

//     public function __construct($radius) {
//         $this->radius = $radius;
//     }

//     // Must implement area()
//     public function area() {
//         return pi() * pow($this->radius, 2);
//     }
// }


// class Rectangle extends Shape {
//     private $width;
//     private $height;

//     public function __construct($width, $height){
//         $this->width = $width;
//         $this->height = $height;
//     }

//     public function area(){
//         return $this->width * $this->height;
//     }
// }

// $circle = new Circle(5);
// echo "Circle Area: " . $circle->area() . "<br>"; 

// $rect = new Rectangle(4, 6);
// echo "Rectangle Area: " . $rect->area() . "<br>"; 

// echo $circle->description();

// abstract class Employee {
//     protected $name;
//     protected $baseSalary;

//     public function __construct($name, $baseSalary){
//         $this->name = $name;
//         $this->baseSalary = $baseSalary;
//     }

//     abstract public function calculateSalary();

//     public function getName(){
//         return $this->name;
//     }
// }

// class FullTimeEmployee extends Employee{
//     private $bonus;

//     public function __construct($name, $baseSalary, $bonus){
//         parent::__construct($name, $baseSalary);
//         $this->bonus = $bonus;
//     }

//     public function calculateSalary(){
//         return $this->baseSalary + $this->bonus;
//     }
// }

// class PartTimeEmployee extends Employee {
//     private $hoursWorked;
//     private $hourlyRate;

//     public function __construct($name, $baseSalary, $hoursWorked, $hourlyRate) {
//         parent::__construct($name, $baseSalary);
//         $this->hoursWorked = $hoursWorked;
//         $this->hourlyRate = $hourlyRate;
//     }

//     public function calculateSalary() {
//         // Part time salary = hours × rate
//         return $this->baseSalary + ($this->hoursWorked * $this->hourlyRate);
//     }
// }

// $emp1 = new FullTimeEmployee("Aesha", 30000, 5000);
// $emp2 = new PartTimeEmployee("Ravi", 10000, 40, 200);

// echo $emp1->getName() . " Salary: " . $emp1->calculateSalary() . "<br>";
// echo $emp2->getName() . " Salary: " . $emp2->calculateSalary() . "<br>";

// // Step 1: Create an abstract class
// abstract class Vehicle {
//     // Abstract methods (must be defined in child classes)
//     abstract public function move();
//     abstract public function fuelType();

//     // A normal method (optional, can be inherited directly)
//     public function info() {
//         return "This is a type of vehicle.";
//     }
// }

// // Step 2: Create a Car class (inherits Vehicle)
// class Car extends Vehicle {
//     public function move() {
//         return "Car moves by driving on the road.";
//     }

//     public function fuelType() {
//         return "Car uses Petrol or Diesel.";
//     }
// }

// // Step 3: Create a Bicycle class (inherits Vehicle)
// class Bicycle extends Vehicle {
//     public function move() {
//         return "Bicycle moves by pedaling.";
//     }

//     public function fuelType() {
//         return "Bicycle uses Human Energy.";
//     }
// }

// // Step 4: Test the program
// $myCar = new Car();
// echo $myCar->info() . "<br>";      // inherited method
// echo $myCar->move() . "<br>";      // abstract method implemented in Car
// echo $myCar->fuelType() . "<br>";  // abstract method implemented in Car

// echo "--------------------"."<br>";

// $myBike = new Bicycle();
// echo $myBike->info() . "<br>";      // inherited method
// echo $myBike->move() . "<br>";      // abstract method implemented in Bicycle
// echo $myBike->fuelType() . "<br>";  // abstract method implemented in Bicycle


abstract class Shape{
    public $width;
    public $height;

    public function __construct($width = 0, $height = 0) {
        $this->width = $width;
        $this->height = $height;
    }

    abstract function getArea();
    abstract function getPerimeter();
}

class Rectangle extends Shape {

    public function __construct($width = 10, $height = 5){
       parent::__construct($width, $height);
    }


   public function getArea(){
        return $this->width * $this->height;
   }

   public function getPerimeter(){
        return 2 * ($this->width + $this->height);
   }
}

class Circle extends Shape {
    public $radius;

    public function __construct($radius = 7){
       $this->radius = $radius;
    }

   public function getArea(){
        return  pi() * pow($this->radius, 2);
   }

   public function getPerimeter(){
        return 2 * pi() * $this->radius;
   }
}

$rectangle = new Rectangle();
echo "Rectangle Area:" . $rectangle->getArea()."<br>";
echo "Rectangle Perimeter: ". $rectangle->getPerimeter()."<br>";

$circle = new Circle();
echo "Circle Area: " . $circle->getArea()."<br>";
echo "Circle Perimeter: ". $circle->getPerimeter()."<br>";

?>  