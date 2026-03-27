<?php
class Person {
    protected $name;
    protected $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

class Student extends Person {
    private $marks; // associative array ['Math' => 85, 'Science' => 78]

    public function __construct($name, $age, $marks) {
        parent::__construct($name, $age);
        $this->marks = $marks;
    }

    // ✅ Calculate Average Marks
    public function getAverage() {
        if (!empty($this->marks) && is_array($this->marks)) {
            $total = array_sum($this->marks);
            $count = count($this->marks);
            return round($total / $count, 2);
        }
        return 0;
    }

    // ✅ Private Method: Grade Logic
    private function getGrade() {
        $avg = $this->getAverage();
        if ($avg >= 80) return 'A';
        elseif ($avg >= 60) return 'B';
        elseif ($avg >= 40) return 'C';
        else return 'D';
    }

    // ✅ Public Method: Show Details
    public function getDetails() {
        echo "Name: {$this->name}<br>";
        echo "Age: {$this->age}<br>";
        echo "Average Marks: {$this->getAverage()}<br>";
        echo "Grade: {$this->getGrade()}<br><br>";
    }

    // ✅ Magic Methods
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            return "⚠️ Property '$property' does not exist.";
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } else {
            echo "⚠️ Cannot set undefined property '$property'.<br>";
        }
    }

    public function __call($name, $arguments) {
        echo "⚠️ Warning: Method '$name' does not exist.<br>";
    }
}

// ✅ Example Run
$student1 = new Student("Aesha", 22, [
    'Math' => 90,
    'Science' => 85,
    'English' => 78
]);

$student1->getDetails(); // Show details
$student1->calculateRank(); // Calls undefined method (handled by __call)
?>
