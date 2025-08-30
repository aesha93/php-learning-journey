**only the listed concepts**:

* Inheritance
* Polymorphism
* Abstract Classes
* Interfaces
* Traits
* Magic Methods (`__construct`, `__get`, `__set`, `__call`)
* Static Methods

Arrays will just serve as **data containers** for Magento-like examples (products, orders, shipping).
No other PHP concepts will be introduced.

---

# 📘 Concepts Explained

### 1. Inheritance

Inheritance allows a class (child) to reuse the properties and methods of another class (parent).

* **Why useful?** → Avoids repeating code.
* **Example:**

```php
<?php
class Product {
    public $name;
    public $price;
}

class Book extends Product {
    public $author;
}
$book = new Book();
$book->name = "Magento Basics";
$book->price = 50;
$book->author = "John Doe";
echo $book->name; // Magento Basics
?>
```

✅ **Best practice:** Use inheritance when classes are “is-a” relationship (Book *is a* Product).
❌ **Mistake:** Forcing unrelated classes into inheritance.

---

### 2. Polymorphism

Polymorphism means “many forms” — different classes can share the same method name but behave differently.

* **Why useful?** → Lets you call the same method on different objects without worrying about details.
* **Example:**

```php
<?php
class Shipping {
    public function calculate($order) { return 0; }
}

class FreeShipping extends Shipping {
    public function calculate($order) { return 0; }
}

class FlatRateShipping extends Shipping {
    public function calculate($order) { return 10; }
}

$order = ['total' => 100];
$methods = [new FreeShipping(), new FlatRateShipping()];

foreach ($methods as $m) {
    echo $m->calculate($order) . "\n";
}
// Output: 0 then 10
?>
```

---

### 3. Abstract Classes

Abstract classes define a **blueprint**. You cannot create them directly; you must extend them.

* **Why useful?** → Ensures subclasses implement certain methods.
* **Example:**

```php
<?php
abstract class Payment {
    abstract public function pay($order);
}

class CashOnDelivery extends Payment {
    public function pay($order) {
        return "Paying cash on delivery for " . $order['id'];
    }
}
$order = ['id' => 123];
$payment = new CashOnDelivery();
echo $payment->pay($order);
?>
```

---

### 4. Interfaces

An interface is like a **contract**: any class implementing it must provide the required methods.

* **Difference vs Abstract:** Interface = only method signatures, no logic.
* **Example:**

```php
<?php
interface Discountable {
    public function applyDiscount($product);
}

class PercentageDiscount implements Discountable {
    public function applyDiscount($product) {
        return $product['price'] * 0.9; // 10% off
    }
}
$product = ['price' => 100];
$d = new PercentageDiscount();
echo $d->applyDiscount($product); // 90
?>
```

---

### 5. Traits

Traits let you **reuse code** across multiple classes without inheritance.

* **Why useful?** → If two unrelated classes need the same methods.
* **Example:**

```php
<?php
trait Logger {
    public function log($msg) {
        echo "[LOG]: $msg\n";
    }
}

class Product {
    use Logger;
}
class Order {
    use Logger;
}

$p = new Product();
$p->log("Product created");
?>
```

---

### 6. Magic Methods

Special methods starting with `__` that give PHP classes “magical” behavior.

* **`__construct()`** → Runs automatically when object is created.

```php
class Product {
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
}
$p = new Product("Shirt");
```

* **`__get()` / `__set()`** → Handle access to non-existing or private properties.

```php
class Product {
    private $data = [];
    public function __set($key, $val) { $this->data[$key] = $val; }
    public function __get($key) { return $this->data[$key] ?? null; }
}
$p = new Product();
$p->color = "Red"; // __set
echo $p->color;    // __get
```

* **`__call()`** → Handles calls to undefined methods.

```php
class Product {
    public function __call($method, $args) {
        echo "Method $method not found\n";
    }
}
$p = new Product();
$p->nonExistentMethod(); // triggers __call
```

---

### 7. Static Methods

Methods tied to the **class itself**, not to an object.

* **When to use:** Utility or helper functions that don’t need object state.
* **Example:**

```php
class PriceHelper {
    public static function format($price) {
        return "$" . number_format($price, 2);
    }
}
echo PriceHelper::format(123.45); // $123.45
```

---
