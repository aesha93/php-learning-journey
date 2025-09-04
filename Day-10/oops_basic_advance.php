<?php
// interface CanFly{
//     public function fly();
// }

// interface CanSwim {
//     public function swim();
// }

// class Duck implements canFly, CanSwim {
//     public function fly(){
//         echo "Duck is flying";
//     }

//     public function swim(){
//         echo "Duck is swimming";
//     }
// }

// $duck = new Duck();
// $duck->fly();
// $duck->swim();

// interface Loggable {
//     public function log($message);
// }

// interface SerializableToJson{
//     public function toJson();
// }

// class User implements Loggable, SerializableToJson {
//     public function log($message) {
//         echo "User log: $message\n";
//     }

//     public function toJson() {
//         return json_encode(['type' => 'User']);
//     }

// }

// class Order implements Loggable, SerializableToJson {
//     public function log($message) {
//         echo "Order log: $message\n";
//     }

//     public function toJson() {
//         return json_encode(['type' => 'Order']);
//     }

// }

// $user = new User();
// $order = new Order();

// $user->log("User created");
// echo $user->toJson();

// $order->log("Order placed");
// echo $order->toJson();

// interface PaymentMethod {
//     public function pay($amount);
// }

// class CreditCard implements PaymentMethod {
//     public function pay($amount) {
//         echo "Paid $amount with Credit Card\n";
//     }
// }

// class PayPal implements PaymentMethod {
//     public function pay($amount) {
//         echo "Paid $amount via PayPal\n";
//     }
// }

// function processPayment(PaymentMethod $method, $amount) {
//     $method->pay($amount);
// }

// processPayment(new CreditCard(), 100); // Paid 100 with Credit Card
// processPayment(new PayPal(), 200);     // Paid 200 via PayPal

// class User {
//     private $data = [
//         "name" => "Aesha",
//         "email" => "aesha@example.com"
//     ];

//     public function __get($property) {
//         if (array_key_exists($property, $this->data)) {
//             return $this->data[$property];
//         }
//         return "Property $property not found!";
//     }
// }

// $user = new User();
// echo $user->name;   // Aesha
// echo $user->email;  // aesha@example.com
// echo $user->age;    // Property age not found!

// Step 1: Abstract class

// abstract class Shape{
//     abstract public function getArea();
// }
// // Step 2: Child class (Rectangle)

// class Rectangle extends Shape {
//     private $width;
//     private $height;

//     public function __construct($width, $height) {
//         $this->width = $width;
//         $this->height = $height;
//     }

//     public function getArea() {
//         return $this->width * $this->height;
//     }
// }

// // Step 3: Child class (Circle)
// class Circle extends Shape{
//     private $radius;

//     public function __construct($radius) {
//         $this->radius = $radius;
//     }

//     public function getArea() {
//         return pi() * $this->radius * $this->radius;
//     }
// }

// $shapes = [
//     new Rectangle(10,20),
//     new Circle(7)
// ];

// foreach($shapes as $shape){
//     echo "Area: " . $shape->getArea() ."<br>";
// }

// step 1: Create a Vehicle abstract class with
// abstract class Vehicle{
//     abstract public function startEngine();
// }

// class Car extends Vehicle{
//     public function startEngine(){
//         return "Car engine started" ;
//     }
// }

// class Bike extends Vehicle{
//     public function startEngine(){
//         return "Bike engine started" ;
//     }
// }

// $vehicles = [
//     new Car(),
//     new Bike()
// ];

// foreach($vehicles as $vehicle){
//     echo  $vehicle->startEngine() ."<br>";
// }

// class MagicDemo {
//     private $data = [];

//     // Handle getting private/undefined properties
//     public function __get($name) {
//         return $this->data[$name] ?? "Property '$name' not found";
//     }

//     // Handle setting private/undefined properties
//     public function __set($name, $value) {
//         $this->data[$name] = $value;
//     }

//     // Handle calling undefined methods
//     public function __call($name, $arguments) {
//         return "Method '$name' does not exist. Args: " . implode(", ", $arguments);
//     }

//     // Convert object to string
//     public function __toString() {
//         return "I am a MagicDemo object";
//     }
// }

// $obj = new MagicDemo();

// // __set is called
// $obj->username = "Aesha";

// // __get is called
// echo $obj->username . "<br>"; // Aesha
// echo $obj->email . "<br>";    // Property 'email' not found

// // __call is triggered
// echo $obj->sayHello("World") . "<br>";

// // __toString is triggered
// echo $obj;

// static methods

// class Counter {
//     public static $count = 0;

//     public function __construct() {
//         self::$count++;
//     }

//     public static function getCount() {
//         return self::$count;
//     }
// }

// $c1 = new Counter();
// $c2 = new Counter();


// echo Counter::getCount(); // 3


// class MathHelper {
//     public static function square($n){
//         return $n * $n;
//     }
// }

// echo MathHelper::square(5);

// class Animal{
//     public static $count = 0;

//     public static function who() {
//         echo __CLASS__;
//     }

//     public static function test(){
//         self::who();
//         static::who();
//     }

//      public static function getCount() {
//         return self::$count++;
//     }
// }

// class Dog extends Animal{
//     public static function who(){
//         echo __CLASS__;
//     }
// }

// // Dog::test();
// echo Dog::getCount();
// echo Dog::getCount();
// echo Dog::getCount();
// echo Dog::getCount();
// echo Dog::test();

// class ShapeCounter{
//      public static $count = 0;

//      public function __construct() {
//         self::$count++;
//     }

//     public static function getCount(){
//         return self::$count;
//     }

// }

// class Circle extends ShapeCounter{

// }

// class Rectangle extends ShapeCounter{
    
// }
// $c1 = new Circle();
// $c2 = new Circle();
// $r1 = new Rectangle();
// $r2 = new Rectangle();
// echo "Total shapes created: " . ShapeCounter::getCount(); 

// interface Vehicle{
//     public function drive();
// }

// class Car implements Vehicle{
//     public function drive(){
//         return "Driving a Car";
//     }
// }

// class Bike implements Vehicle{
//     public function drive(){
//         return "Riding a Bike";
//     }
// }

// class VehicleFactory {
//     public static function create($type){
//         if($type === 'car'){
//             return new Car();
//         }elseif($type === 'bike'){
//             return new Bike();
//         }
//         throw new Exception("Invalid vehicle type");
//     }
// }

// $v1 = VehicleFactory::create("car");
// echo $v1->drive()."<br>";

// $v2 = VehicleFactory::create("bike");
// echo $v2->drive(); // Riding a Bike

// Singleton Pattern

// class Database{
//     private static $instance = null;

//     private function  __construct(){
//         echo "Connecting to DB..."."<br>";
//     }

//     public static function getInstance(){
//         if(self::$instance === null){
//             self::$instance = new Database();
//         }
//         return self::$instance;
//     }
// }

// $db1 = Database::getInstance();
// $db2 = Database::getInstance();
// $db3 = Database::getInstance();

// var_dump($db2 === $db3); 

// Strategy Pattern


// interface PaymentStrategy {
//     public function pay($amount);
// }

// class CreditCardPayment implements PaymentStrategy{
//     public function pay($amount){
//         return "Paid $amount using Credit Card";
//     }
// }

// class PaypalPayment implements PaymentStrategy{
//     public function pay($amount) {
//         return "Paid $amount using PayPal";
//     }
// }

// class ShoppingCart{
//     private $paymentMethod;

//     public function __construct(PaymentStrategy $paymentMethod){
//         $this->paymentMethod = $paymentMethod;
//     }

//         public function checkout($amount) {
//         return $this->paymentMethod->pay($amount);
//     }

// }
// $cart1 = new ShoppingCart(new CreditCardPayment());
// echo $cart1->checkout(100). "<br>";

// $cart2 = new ShoppingCart(new PayPalPayment());
// echo $cart2->checkout(200);

// interface Observer{
//     public function update($message);
// }

// class User implements Observer{
//     private $name;

//     public function __construct($name){
//         $this->name = $name;
//     }

//     public function update($message){
//         echo $this->name . " received notification: $message<br>";
//     }
// }

// class NotificationService{
//     private $observers = [];

//     public function addObserver(Observer $observer) {
//         $this->observers[] = $observer;
//     }

//     public function notifyAll($message) {
//         foreach ($this->observers as $observer) {
//             $observer->update($message);
//         }
//     }

// }

// // Client code
// $service = new NotificationService();

// $user1 = new User("Aesha");
// $user2 = new User("Patel");

// $service->addObserver($user1);
// $service->addObserver($user2);

// $service->notifyAll("New product launched!");

// class BankAcoount{
//     private $balance = 0;

//     public function getBalance(){
//         return $this->balance;
//     }

//     public function deposite($amount){
//         if($amount > 0){
//             $this->balance += $amount;
//             echo  "Deposited $amount<br>";
//         }else{
//             echo "Invalid deposit amount<br>";
//         }
//     }

//     public function withdraw($amount){
//         if($amount > 0 && $amount <= $this->balance){
//             $this->balance -= $amount;
//             echo "Withdrew $amount<br>";
//         }else{
//             echo "Invalid withdrawal<br>";
//         }
//     }
// }

// $account = new BankAcoount();
// $account->deposite(1000);
// $account->withdraw(500);
// echo "Balance: " . $account->getBalance();

// class User {
//     private $data = [];

//     public function __set($name, $value){
//         $this->data[$name] = $value;
//     }

//     public function __get($name){
//         return $this->data[$name] ?? "Property '$name' not set";
//     }
// }

//     $user = new User();
//     $user->name = "Aesha";   // __set triggered
//     $user->email = "aesha@example.com"; // __set triggered
//     $user->fax = 543543534534; 

//     echo $user->name . "<br>";  // __get triggered → Aesha
//     echo $user->email . "<br>"; // __get triggered → aesha@example.com
//     echo $user->phone. "<br>";       // __get triggered → Property 'phone' not set
//      echo $user->fax. "<br>";   

// class Product{

//     private $data = [];

//     public function __set($name, $value){
//         if($name === 'price' && $value < 0){
//             $this->data[$name] = 0;
//         }else{
//             $this->data[$name] = $value;
//         }
//     }

//     public function __get($name){
//          return $this->data[$name] ?? "Property '$name' not set";
//     }
// }
// $product = new Product();
// $product->name = "Aesha";
// $product->price = 100;
// $product->price = -50; // validation triggered


//  echo $product->name . "<br>";
//   echo $product->price . "<br>";

// class Employee{
//      private $data = [];

//      public function  __construct($name, $salary){
//         $this->data['name'] = $name;
//         $this->data['salary'] = ($salary < 0) ? 0 : $salary;
//         $this->data['department'] = "";
//      }

//     public function __set($prop, $value){
//         if($prop === 'department'){
//             $this->data[$prop] = $value;
//         }
//     }

//      public function __get($prop){
//          return $this->data[$prop] ?? "Property '$prop' not set";
//     }
// }
// $employee = new Employee("Aesha", -5000);
// $employee->department = 'IT';

// echo "Name: " . $employee->name . "<br>";
// echo "Salary: " . $employee->salary . "<br>";
// echo "Department: " . $employee->department . "<br>";

// class Student{
//     public $name;

//     public function __construct($name){
//         $this->name = $name;
//         echo "Student $name has been created."."<br>";
//     }

//     public function __destruct()
//     {
//         echo "Student $this->name hase beeen removed"."<br>";
//     }
// }
// $str = new Student("Aesha");
// $str = new Student("Ravi");


// class Employee {
//     private $data = [];

//     public function __set($prop, $value){
//         echo "Setting $prop to $value"."<br>";
//         $this->data[$prop] = $value;
//     }

//     public function __get($prop) {
//         echo "Getting $prop"."<br>";
//         return $this->data[$prop] ?? null;
//     }
// }

// $emp = new Employee();
// $emp->salary =  50000;   
// echo $emp->salary;  

// class Calculator{
//     // public function __call($name, $args){
//     //     echo "You tried to call $name with arguments: " . implode(", ", $args) . "\n";
//     // }
//     public function __call($name, $args){
//         echo "You tried to call $name with arguments: " . implode(", ", $args) . "\n";
//     }
// }
// $calc = new Calculator();
// $calc->sub(10, 20);  // Method does not exist → __call() is triggered

// class User{
//     private $name;

//     public function __construct($name) {
//         $this->name = $name;
//     }

//     public function __toString(){
//         return "User: " .$this->name;
//     }

// }

// $user = new User("Aesha");
// echo $user;

// class Student{
//     public $name;

//     public function __construct($name){
//         $this->name = $name;
//         echo "Student $name created"."<br>";
//     }
// }

// $st1 = new Student("Aesha");

// class Test{
//     public function __destruct()
//     {
//         echo "Object destroyed"."<br>";
//     }
// }

// $obj = new Test(); 

// class Employee{
//     private $data = ['salary' => 50000];

//     public function __get($prop){
//         echo "Trying to get $prop"."<br>";
//         return $this->data[$prop] ?? null;
//     }
// }

// $emp = new Employee();
// echo $emp->salary; // __get is called
// class Employee {
//     private $data = [];

//     public function __set($prop, $value) {
//         echo "Setting '$prop' to '$value'\n";
//         $this->data[$prop] = $value;
//     }

//     public function __get($prop){
//         echo "Trying to get $prop"."<br>";
//         return $this->data[$prop] ?? null;
//     }
// }

// $emp = new Employee();
// $emp->bonus = 1000; // __set is called

// echo $emp->__get('bonus');

// class Calculator {
//     public function __call($method, $args) {
//         echo "Method $method called with arguments: ". implode(", ", $args). "<br>";
//     }
// }

// $calc = new Calculator();
// $calc->add(10, 20); // __call triggered

// class User{
//     private $name;
//     public function __construct($name){
//         $this->name = $name;
//     }

//     public function __toString(){
//         return "User: ". $this->name;
//     }
// }

// $user = new User("Aesha");
// echo $user // __toString triggered

// class Student{
//     public $name;
//     public $marks;

//     public function __construct($name, $marks){
//         $this->name = $name;
//         $this->marks = $marks;
//     }

//     public function __clone(){
//         $this->name = "Copy of " . $this->name;
//     }
// }

// $st1 = new Student("Aesha", 90);
// $st2 = clone $st1;  // __clone() is triggered

// echo $st1->name . "\n"; // Aesha
// echo $st2->name . "\n"; // Copy of Aesha

// class User {
//     public $name;
//     public $email;
//     private $dbConnection;

//     public function __construct($name, $email){
//         $this->name = $name;
//         $this->email = $email;
//         $this->dbConnection = "connect to DB";
//     }

//     public function __sleep(){
//         echo "Serializing..."."<br>";
//         return['name', 'email'];
//     }
// }

// $user = new User("Aesha","aesha@example.com");
// $serialized = serialize($user);
// echo $serialized;

// class User {
//     public $name;
//     public $email;
//     private $dbConnection;

//     public function __construct($name, $email){
//         $this->name = $name;
//         $this->email = $email;
//         $this->dbConnection = "Connected to DB";
//     }

//       public function __sleep() {
//         echo "Serializing...\n";
//         // Don't save dbConnection (not serializable)
//         return ['name', 'email'];
//     }
// }

// $user = new User("Aesha", "aesha@example.com");
// $serialized = serialize($user);
// echo $serialized;

class User {
    public $name;
    public $email;
    private $dbConnection;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
        $this->dbConnection = "Connected to DB";
    }

    public function __sleep() {
        echo "Serializing...\n";
        return ['name', 'email'];
    }

    public function __wakeup(){
        echo "waking up"."<br>";
        $this->dbConnection = "Reconnected to DB";
    }

}

$user = new User("Aesha", "aesha@example.com");
$serialized = serialize($user);

// Unserialize (restore)
$restored = unserialize($serialized);
print_r($restored);
?>