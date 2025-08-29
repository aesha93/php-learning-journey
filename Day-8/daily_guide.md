

---

# 📘 Concepts Explained

### 1. **Classes**

* A **class** is like a **blueprint** for creating objects.
* It defines what properties (data) and methods (behavior) the object will have.

👉 Example:

```php
<?php
class Product {
    public $name;
    public $price;
}
```

Here, `Product` is a class. It says: “Every product has a name and a price.”

---

### 2. **Objects**

* An **object** is a real instance created from a class.
* Each object has its own property values.

👉 Example:

```php
<?php
$product1 = new Product();
$product1->name = "Laptop";
$product1->price = 500;

$product2 = new Product();
$product2->name = "Phone";
$product2->price = 300;
```

Here, `$product1` and `$product2` are **different objects** of the same class.

---

### 3. **Properties**

* Properties are **variables inside a class**.
* They represent the **state/data** of the object.

👉 Example:

```php
<?php
class Order {
    public $orderId;
    public $total;
}
```

Properties: `$orderId`, `$total`.

---

### 4. **Methods**

* Methods are **functions inside a class**.
* They represent the **behavior** (actions the object can do).

👉 Example:

```php
<?php
class Product {
    public $name;
    public $price;

    public function getDetails() {
        return "Product: $this->name, Price: $this->price";
    }
}
```

`getDetails()` is a **method**.

---

### 5. **Constructors**

* A **constructor** is a special method called **automatically** when an object is created.
* Used to initialize properties.

👉 Example:

```php
<?php
class Product {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

$product = new Product("Tablet", 200);
echo $product->name; // Tablet
```

---

### 6. **Destructors**

* A **destructor** is a special method called **when an object is destroyed** (e.g., at the end of script).
* Rarely used, but useful for cleanup (like closing files or logging).

👉 Example:

```php
<?php
class Logger {
    public function __destruct() {
        echo "Logger closed.\n";
    }
}

$log = new Logger();
```

---

### 7. **Access Modifiers**

They control who can access properties and methods:

* **public** → Accessible anywhere.
* **private** → Accessible only inside the same class.
* **protected** → Accessible inside the class and subclasses.

👉 Example:

```php
<?php
class Customer {
    public $name;       // anyone can access
    private $email;     // only inside class
    protected $address; // inside class or child class

    public function setEmail($email) {
        $this->email = $email;
    }
}
```

⚠️ **Common mistake**: Trying to access private/protected directly → causes error.
✅ Use **public methods (getters/setters)** to access private properties.

---
