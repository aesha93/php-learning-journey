Perfect 👍 Let’s move step by step.
For this stage, we’ll **focus only on the given concepts**:

* Namespace declaration
* `use` keyword
* Autoloading
* try-catch blocks
* Exceptions
* Custom exceptions
* Logging

We’ll use **arrays as data holders** (like products, orders, or shipping).
Let’s begin!

---

# 🧩 Concepts Explained

### 1. Namespace Declaration

* **Plain definition**: A namespace is like a "folder" for your PHP classes, functions, and constants. It prevents name conflicts when different parts of code have the same class names.
* **Syntax**:

  ```php
  <?php
  namespace MyApp\Order;

  class OrderManager {
      // code here
  }
  ```
* **Why use it?**
  Imagine Magento core has a `Product` class, and you also make your own `Product` class. Namespaces avoid conflicts.
* **Common mistake**: Forgetting `namespace` at the top, or mixing multiple `namespace` declarations in one file (bad practice).
* **Best practice**: One namespace per file, always at the top.

---

### 2. `use` Keyword

* **Plain definition**: `use` lets you import a class from another namespace so you don’t have to write the full namespace each time.
* **Example**:

  ```php
  <?php
  namespace MyApp;

  use Magento\Catalog\Product; // import class

  $p = new Product(); // we don’t need to write Magento\Catalog\Product every time
  ```
* **Common mistake**: Forgetting `use` → then PHP doesn’t recognize the class.
* **Best practice**: Group imports neatly at the top of the file.

---

### 3. Autoloading

* **Plain definition**: PHP automatically loads classes when you use them, instead of requiring you to manually `include` files.
* **Composer Autoloader (Magento style)**: Magento uses Composer’s autoloader. When you run `composer install`, it generates a file `vendor/autoload.php`.
* **Simple Example**:

  ```php
  <?php
  require 'vendor/autoload.php'; // Composer’s autoloader
  ```
* **Common mistake**: Forgetting `require 'vendor/autoload.php';` when using external packages.
* **Best practice**: Rely on autoloading rather than `require`/`include`.

---

### 4. Try-Catch Blocks

* **Plain definition**: A way to "try" code and "catch" errors if something goes wrong.
* **Example**:

  ```php
  try {
      $price = -10;
      if ($price < 0) {
          throw new Exception("Invalid product price");
      }
  } catch (Exception $e) {
      echo "Error: " . $e->getMessage();
  }
  ```
* **Output**:

  ```
  Error: Invalid product price
  ```
* **Best practice**: Catch only the exceptions you expect, don’t wrap everything blindly in try-catch.

---

### 5. Exceptions

* **Plain definition**: An "exception" is a special error object that can be thrown and caught.
* **Example**:

  ```php
  throw new Exception("Something went wrong");
  ```
* **Common mistake**: Using `die()` or `echo` instead of exceptions. Exceptions give better error handling.
* **Best practice**: Use exceptions for unexpected conditions, not for normal flow.

---

### 6. Custom Exceptions

* **Plain definition**: You can make your own exception class for specific errors.
* **Example**:

  ```php
  class ProductException extends Exception {}

  try {
      throw new ProductException("Product not found");
  } catch (ProductException $e) {
      echo $e->getMessage();
  }
  ```
* **Why?** This makes error handling clearer. You can distinguish product errors from shipping errors.
* **Best practice**: Create custom exceptions per domain area (ProductException, OrderException, etc.).

---

### 7. Logging

* **Plain definition**: Logging means writing messages to a file instead of showing them on screen. Useful for debugging in production.
* **Example** (simple PHP log):

  ```php
  error_log("Order failed: invalid payment", 3, "app.log");
  ```

  * `3` = append to a custom log file.
  * `"app.log"` = the log file.
* **Magento note**: In Magento, you’d use `\Psr\Log\LoggerInterface`. But here we stick to basic `error_log()`.
* **Best practice**: Always log errors, don’t just echo them.

---

# 📝 Exercises

### Exercise 1: Validate Product Price

**Task**:
You have an array representing a product:

```php
$product = [
    "id" => 101,
    "name" => "T-shirt",
    "price" => -250
];
```

If the price is negative, throw an `Exception`. Catch it and log the error.

**Solution**:

```php
<?php
$product = [
    "id" => 101,
    "name" => "T-shirt",
    "price" => -250
];

try {
    if ($product["price"] < 0) {
        throw new Exception("Invalid price for product ID " . $product["id"]);
    }
    echo "Product is valid.";
} catch (Exception $e) {
    error_log($e->getMessage(), 3, "app.log");
    echo "Error handled. Check log.";
}
```

**Step-by-step explanation**:

1. Product array has a negative price.
2. Inside `try`, we check condition.
3. If negative → throw Exception.
4. `catch` receives it, logs error in `app.log`.
5. User sees `"Error handled. Check log."`.

---

### Exercise 2: Custom Exception for Orders

**Task**:
Array of order:

```php
$order = [
    "id" => 5001,
    "status" => "pending_payment"
];
```

If `status` is `"pending_payment"`, throw a **custom exception** `OrderException`. Catch it and print the message.

**Solution**:

```php
<?php
class OrderException extends Exception {}

$order = [
    "id" => 5001,
    "status" => "pending_payment"
];

try {
    if ($order["status"] === "pending_payment") {
        throw new OrderException("Order #" . $order["id"] . " is not paid yet.");
    }
    echo "Order is confirmed.";
} catch (OrderException $e) {
    echo "Custom Exception Caught: " . $e->getMessage();
}
```

**Step-by-step explanation**:

1. We make `OrderException` (extends `Exception`).
2. We check order’s status.
3. If `"pending_payment"` → throw custom exception.
4. Catch specifically `OrderException`.
5. Print message.

---

### Exercise 3: Shipping Method Validation with Namespace + Logging

**Task**:
We define a namespace `MyApp\Shipping`.
We check if the shipping method exists in array:

```php
$shipping = [
    "id" => 201,
    "method" => ""
];
```

If method is empty, throw `ShippingException`. Catch and log.

**Solution**:

```php
<?php
namespace MyApp\Shipping;

class ShippingException extends \Exception {}

$shipping = [
    "id" => 201,
    "method" => ""
];

try {
    if (empty($shipping["method"])) {
        throw new ShippingException("Shipping method missing for shipment #" . $shipping["id"]);
    }
    echo "Shipping method is valid.";
} catch (ShippingException $e) {
    error_log($e->getMessage(), 3, "shipping.log");
    echo "Error handled. Check shipping.log.";
}
```

**Step-by-step explanation**:

1. We declare namespace `MyApp\Shipping`.
2. Create `ShippingException`.
3. Check if `method` is empty.
4. If yes, throw exception.
5. Catch → log to `shipping.log`.
6. Show safe message to user.

---
Perfect 🙂 Let’s go deep into **Custom Exceptions in PHP** step by step.

---

## 🔹 What is a Custom Exception?

A **custom exception** is a class you create yourself by **extending** PHP’s built-in `Exception` class.
This allows you to give **specific names** and behaviors to different error conditions in your application.

---

## 🔹 Why do we use Custom Exceptions?

* To make error handling **more meaningful**
* To separate **different error types** (e.g., `StockException`, `PaymentException`)
* To add **custom properties/methods** inside your exception

---

## 🔹 Example 1: Basic Custom Exception

```php
<?php
class StockException extends Exception {}

try {
    $qty = -5;

    if ($qty < 0) {
        throw new StockException("Quantity cannot be negative: $qty");
    }

    echo "Order placed successfully!";
} catch (StockException $e) {
    echo "Stock Error: " . $e->getMessage();
}
```

👉 Output:

```
Stock Error: Quantity cannot be negative: -5
```

---

## 🔹 Example 2: Multiple Custom Exceptions

```php
<?php
class StockException extends Exception {}
class PaymentException extends Exception {}

try {
    $paymentSuccess = false;
    $qty = 2;

    if ($qty <= 0) {
        throw new StockException("Invalid stock quantity: $qty");
    }

    if (!$paymentSuccess) {
        throw new PaymentException("Payment failed, please retry.");
    }

    echo "Order placed successfully!";
} catch (StockException $e) {
    echo "Stock Issue → " . $e->getMessage();
} catch (PaymentException $e) {
    echo "Payment Issue → " . $e->getMessage();
}
```

---

## 🔹 Example 3: Custom Exception with Extra Data

You can add **extra properties** to your exception:

```php
<?php
class OrderException extends Exception {
    private $orderId;

    public function __construct($message, $orderId) {
        $this->orderId = $orderId;
        parent::__construct($message);
    }

    public function getOrderId() {
        return $this->orderId;
    }
}

try {
    throw new OrderException("Order not found", 12345);
} catch (OrderException $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Order ID: " . $e->getOrderId();
}
```

👉 Output:

```
Error: Order not found
Order ID: 12345
```

---

## 🔹 Key Points

1. Custom exception = **class extends `Exception`**
2. Can have **different catch blocks** for different custom exceptions
3. Can add **extra properties/methods** for more context
4. Helps in **clean error handling** in large applications (like Magento or Laravel)

---

## 🔹 How to Trace Errors in PHP

### 1. **Basic Error Message**

When you `catch` an exception, you can use:

```php
$e->getMessage();
```

👉 Gives only the message (e.g., `"Invalid price for SKU A"`).

---

### 2. **File and Line Number**

To know *where* the error happened:

```php
$e->getFile();
$e->getLine();
```

👉 Useful for debugging *which file & line number* caused the problem.

---

### 3. **Stack Trace**

To see the *full path of execution* (all functions that led to the error):

```php
$e->getTrace();
```

* Returns an **array** with detailed call info.
* Useful in complex apps like Magento, where many functions call each other.

Or in **human-readable string** form:

```php
$e->getTraceAsString();
```

---

### 4. **Putting It Together**

```php
try {
    function processOrder($order) {
        if ($order['qty'] <= 0) {
            throw new Exception("Invalid quantity for SKU {$order['sku']}");
        }
    }

    $order = ['sku' => 'ITEM1', 'qty' => 0];
    processOrder($order);

} catch (Exception $e) {
    echo "Error Message: " . $e->getMessage() . "<br>";
    echo "In File: " . $e->getFile() . "<br>";
    echo "At Line: " . $e->getLine() . "<br>";
    echo "Trace: <pre>" . $e->getTraceAsString() . "</pre>";
}
```
Perfect timing 👍 You’ve learned **how to trace errors**, now let’s go one step further:

# 🔎 How to Debug Errors in PHP (Beginner-Friendly)

Debugging = finding **what went wrong, where, and why**.
PHP gives you different tools and techniques.

---

## 1. **Enable Error Reporting**

By default, PHP may **hide errors**. To see them:

```php
error_reporting(E_ALL);       // report ALL errors, warnings, notices
ini_set('display_errors', 1); // show errors on screen (good for development)
```

👉 Use this only in **development**.
In **production**, log errors instead:

```php
ini_set('log_errors', 1);
ini_set('error_log', "php_errors.log");
```

---

## 2. **Use var\_dump() or print\_r()**

When debugging arrays or variables:

```php
$cart = ['sku'=>'ITEM1', 'price'=>100];
var_dump($cart);   // shows type + details
print_r($cart);    // shows structure in readable format
```

👉 Wrap in `<pre>` for neat output:

```php
echo "<pre>";
print_r($cart);
echo "</pre>";
```

---

## 3. **Use Exceptions for Debugging**

Wrap risky code in try-catch and inspect the exception:

```php
try {
    throw new Exception("Something failed");
} catch (Exception $e) {
    var_dump($e);  // shows full object with message, file, line, trace
}
```

---

## 4. **Debug with Logging**

Instead of printing errors to the screen, **log them**:

```php
error_log("Debugging cart data: " . print_r($cart, true), 3, "debug.log");
```

👉 `print_r($cart, true)` converts array to string for logging.

---

## 5. **Step Debugging with Xdebug (Advanced Tool)**

* Xdebug is a PHP extension that lets you:

  * Set breakpoints
  * Step through code line by line
  * Inspect variables at runtime
* Works with IDEs like PhpStorm / VSCode.

*(We won’t dive deep yet since you’re beginner stage — but keep this in mind as your next milestone in professional debugging.)*

---

# 🔹 What is Autoloading in PHP?

Normally, if you want to use a class in PHP, you must **include/require** its file:

```php
require 'MyClass.php';

$object = new MyClass();
```

❌ Problem: In big applications (like Magento, Laravel, Symfony), there are **thousands of classes**.
Manually including files everywhere would be messy and unmanageable.

👉 **Autoloading** solves this:
PHP automatically **loads the class file when the class is first used**, without you having to `require` it manually.

---

# 🔹 How Autoloading Works

### ✅ Example 1: Using `spl_autoload_register`

```php
<?php
spl_autoload_register(function ($className) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// No need to require manually
$hello = new MyApp\Models\Hello();
```

Explanation:

* `spl_autoload_register()` lets you define a function to **map class names → file paths**.
* When `new MyApp\Models\Hello()` is called, PHP checks:
  👉 Is `Hello` already loaded?
  👉 If not, it calls the registered autoloader.
  👉 The function converts the namespace `MyApp\Models\Hello` into `MyApp/Models/Hello.php` and includes it.

---

# 🔹 Example 2: PSR-4 Autoloading (Modern Standard)

Most frameworks (Magento, Laravel, Symfony) follow **PSR-4 Autoloading Standard**.

In `composer.json`:

```json
"autoload": {
    "psr-4": {
        "Vendor\\Module\\": "app/code/Vendor/Module/"
    }
}
```

* This tells Composer:

  * Whenever you use `Vendor\Module\ClassName`,
  * Look for the file in `app/code/Vendor/Module/ClassName.php`.

Then run:

```bash
composer dump-autoload
```

✅ Now you can use classes without `require`.

---

# 🔹 Example in Magento 2

Let’s say you create:

`app/code/Vendor/Module/Model/Hello.php`

```php
<?php
namespace Vendor\Module\Model;

class Hello
{
    public function getMessage()
    {
        return "Hello Magento!";
    }
}
```

Now in a Controller:

```php
<?php
namespace Vendor\Module\Controller\Index;

use Vendor\Module\Model\Hello;  // we just import

class Index extends \Magento\Framework\App\Action\Action
{
    protected $hello;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        Hello $hello
    ) {
        $this->hello = $hello;
        parent::__construct($context);
    }

    public function execute()
    {
        echo $this->hello->getMessage();
    }
}
```

👉 Notice:

* We **never did `require 'Hello.php'`.**
* Autoloading (via Composer + Magento) automatically loads the file when `Hello` is first used.

---

# 🔹 Why Autoloading is Important

* Removes need for manual `require`/`include`.
* Keeps code **cleaner and scalable**.
* Works perfectly with **namespaces** (every namespace maps to a folder).
* Magento uses Composer autoloading to load **core classes and custom modules**.

---
