<?php
// ⏱️ Challenge 1 — “Student Manager” (OOP Core Concepts)

// Time: 30 min
// Concepts Tested: Classes, Objects, Properties, Methods, Constructors, Access Modifiers

// 🎯 Task:

// Create a PHP class Student with:

// Properties: name, age, and marks (array of subjects & marks)

// Constructor to initialize all 3 properties

// A public method getAverage() to calculate the average marks

// A private method grade() that returns grade based on average

// A: ≥80, B: 60–79, C: 40–59, D: <40

// A public method getDetails() that prints full student info like:

// Name: Aesha
// Age: 20
// Average: 85
// Grade: A

// ✅ Output:

// Display details for 2 students by creating objects and calling methods.

class Student{
    public $name;
    public $age;
    public $marks;

    public function __construct($name, $age, $marks)
    {
        $this->name = $name;
        $this->age = $age;
        $this->marks = $marks;

    }

    public function getAverage($marks){
         return $marks;
    }

    private function grade($marks){
        if($marks >= 80){
            $grade = 'A';
        }elseif($marks >= 60 && $marks <= 79){
            $grade = 'B';
        }elseif($marks >= 40 && $marks <= 59){
            $grade = 'C';
        }elseif($marks <= 40){
            $grade = 'D';
        }
        return $grade;
    }

    public function getDetails(){
        echo "Name: ".$this->name. "<br>";
        echo "Age: ".$this->age. "<br>";
        echo "Average: ".$this->getAverage($this->marks). "<br>";
        echo "Grade: ".$this->grade($this->marks). "<br>";
    }
}
    $student1 = new Student("Aesha", 20, 85);
    echo $student1->getDetails()."<br>";

    $student2 = new Student("Niraj", 20, 62);
    echo $student2->getDetails()."<br>";

// Challenge 2 — “Employee Payroll System” (Inheritance + Polymorphism)

// Time: 25 min
// Concepts Tested: Inheritance, Method Overriding (Polymorphism), Protected properties

// 🎯 Task:

// Create a base class Employee with protected properties: name, salary.

// Add a constructor and a calculateBonus() method returning 0.

// Create 2 child classes:

// Manager → bonus = 30% of salary

// Developer → bonus = 20% of salary

// Override calculateBonus() in both subclasses.

// Print details using polymorphism for both employees.

// ✅ Output:
// Manager Bonus: 9000
// Developer Bonus: 6000

class  Employee{
    protected $name;
    protected $salary;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function calculateBonus($salary, $percentage){
        return 0;
    }
}

class Manager extends Employee{
    public function calculateBonus($salary, $percentage){
        $result = ($percentage / 100) * $salary;
        return "Manager Bonus: ".$result;
    }
}

class Developer extends Employee{
     public function calculateBonus($salary, $percentage){
        $result = ($percentage / 100) * $salary;
        return "Developer Bonus:".$result;
    }
}

 $employee1 = new Manager("Aesha", 80000);
 echo $employee1->calculateBonus(80000, 30)."<br>";


 $employee1 = new Developer("Niraj", 80000);
 echo $employee1->calculateBonus(80000, 20)."<br>";


//  Challenge 3 — “Shape Drawer” (Abstract Classes + Interfaces + Magic Methods)

// Time: 25 min
// Concepts Tested: Abstract classes, Interfaces, Magic Methods (__construct, __get, __set, __call)

// 🎯 Task:

// Create an abstract class Shape with abstract method area().

// Create an interface Drawable with method draw().

// Implement 2 concrete classes:

// Circle (radius property)

// Rectangle (length, width)
// Each class should implement Drawable and define area() + draw().

// Use __get and __set to handle private properties.

// Use __call to catch invalid method calls and print a warning.

// ✅ Output Example:
// Circle area: 78.5
// Drawing Circle...
// Rectangle area: 40
// Drawing Rectangle...
// Warning: Method 'paint' does not exist.

abstract class Shape {
    abstract public function area();
}

interface Drawable {
    public function draw();
}

class Circle extends Shape implements Drawable {
    private $radius;

    public function __construct($r){
        $this->radius = $r;
    }

    //Magic Methods
    public function __get($property){
        return $this->property ?? "Property does not exist";
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

    public function __call($name, $arguments) {
        echo "⚠️ Warning: Method '$name' does not exist.<br>";
    }

    public function area() {
        return "Circle area: " . round(pi() * $this->radius ** 2, 1);
    }

    public function draw() {
        return "Drawing Circle...";
    }

}

class Rectangle extends Shape implements Drawable {
    private $length;
    private $width;

    public function __construct($l, $w) {
        $this->length = $l;
        $this->width = $w;
    }

    // Magic methods
    public function __get($property) {
        return $this->$property ?? "Property does not exist";
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

    public function __call($name, $arguments) {
        echo "⚠️ Warning: Method '$name' does not exist.<br>";
    }

    public function area() {
        return "Rectangle area: " . ($this->length * $this->width);
    }

    public function draw() {
        return "Drawing Rectangle...";
    }
}

// Execution
$circle = new Circle(5);
echo $circle->area() . "<br>";
echo $circle->draw() . "<br>";
$circle->paint(); // Calls __call

$rectangle = new Rectangle(10, 4);
echo $rectangle->area() . "<br>";
echo $rectangle->draw() . "<br><br>";


// Task: Create an abstract class Vehicle with abstract method fuelEfficiency().

// Create Car and Bike implementing it.

// Add a private property $mileage.

// Use __get, __set, and __call magic methods.

// Output:

// Car mileage: 18 km/l
// Bike mileage: 45 km/l
// Warning: Method 'speed' does not exist.

abstract class Vehicle  {
    abstract public function fuelEfficiency();
}

class Car extends Vehicle {

    private $mileage;

    public function __construct($mileage)
    {
        $this->mileage = $mileage;
    }   

    public function __get($property) {
        return $this->$property ?? "Property does not exist";
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

    public function __call($name, $arguments) {
        echo "⚠️ Warning: Method '$name' does not exist.<br>";
    }

       public function fuelEfficiency(){
            return $this->mileage.'km/l';
        }
}

class Bike extends Vehicle {

       private $mileage;

    public function __construct($mileage)
    {
        $this->mileage = $mileage;
    }   

    public function __get($property) {
        return $this->$property ?? "Property does not exist";
    }

    public function __set($property, $value) {
        $this->$property = $value;
    }

    public function __call($name, $arguments) {
        echo "⚠️ Warning: Method '$name' does not exist.<br>";
    }

    public function fuelEfficiency(){
        return $this->mileage.' km/l';
    }
}

// Execution
$car = new Car(18);
echo $car->fuelEfficiency() . "<br>";
echo $car->speed(); // Calls __call

$bike = new Bike(45);
echo $bike->fuelEfficiency() . "<br>";
echo $bike->speed() . "<br><br>";


// ⏱️ Challenge 4 — “Upload & Process CSV”

// Time: 25 min
// Concepts Tested: File handling (upload, read, write), CSV parsing, Validation

// 🎯 Task:

// Create an upload form that allows a user to upload a .csv file containing columns:
// name, email, score

// When uploaded:

// Read the file (using fopen, fgetcsv)

// Write all records with score ≥ 60 into a new file passed_students.csv

// Display how many passed.

// ✅ Example Input (uploaded file):
// Aesha,aesha@mail.com,75
// Raj,raj@mail.com,45
// Mina,mina@mail.com,90

// ✅ Output:
// Total Passed: 2
// File saved as passed_students.csv

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['csvfile'])){
    $file = $_FILES['csvfile']['tmp_name'];
    $handle = fopen($file, 'r');

    $passed = [];

    while(($data = fgetcsv($handle)) !== false){
        if($data[0] == 'name') continue;
        list($product,$email,$score) = $data;
        if($score >= 60){
            $passed[] = $data;
        }
    }
    fclose($handle);

    $output = fopen('available_products.csv', 'w');
    fputcsv($output, ['name', 'email', 'score']);
    foreach ($passed as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
    echo "✅ Total Passed: " . count($passed) . "<br>";
    echo "File saved as available_products.csv";
}

// ⏱️ Challenge 5 — “Login with Sessions and Cookies”

// Time: 15 min
// Concepts Tested: Sessions, Cookies, Password Hashing

// 🎯 Task:

// Create a simple login form (email, password).

// Store a user’s credentials in a PHP array (hashed password using password_hash()).

// When form submitted:

// Verify password with password_verify().

// On success:

// Set session user_email.

// Set a cookie last_login (expire in 1 hour).

// Redirect to dashboard.php.

// On dashboard.php, show:

// Welcome Aesha!
// Last Login: 2025-10-09 18:00


// On logout (logout.php), destroy session and cookie.



?> 

<!-- HTML Upload Form -->
<!-- <form method="post" enctype="multipart/form-data">
    <label>Upload CSV File:</label>
    <input type="file" name="csvfile" accept=".csv" required>
    <button type="submit">Upload</button>
</form> -->

<!-- <form method="post" enctype="multipart/form-data">
    <label>Upload CSV File:</label>
    <input type="file" name="csvfile" accept=".csv" required>
    <button type="submit">Upload</button>
</form> -->
