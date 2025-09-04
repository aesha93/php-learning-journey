
---

# 🔑 Abstract Class vs Interface – Why & When?

### 1. **Abstract Class**

👉 Think of it as a **half-built house**.

* You give some blueprint (abstract methods) that children *must* build.
* You also give some ready-made walls (concrete methods & properties).

**Why do we need it?**

* When multiple child classes **share common code** but also need to **implement their own versions** of some behavior.
* It allows **code reuse + flexibility**.

**Example:**

```php
abstract class Animal {
    public function eat() {
        echo "I can eat\n";   // common code for all animals
    }
    abstract public function makeSound(); // every animal must implement
}

class Dog extends Animal {
    public function makeSound() {
        echo "Woof Woof\n";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow Meow\n";
    }
}

$dog = new Dog();
$dog->eat();       // ✅ uses parent code
$dog->makeSound(); // ✅ Dog-specific
```

🔹 **Why useful?**
You don’t repeat `eat()` in every class → shared code lives in abstract class.
But `makeSound()` is different per animal → force child to implement.

---

### 2. **Interface**

👉 Think of it as a **contract (promise)**.

* 100% abstract.
* No implementation, no properties.
* A class *must* follow the contract if it "implements" it.

**Why do we need it?**

* To enforce **rules** across classes that are not related.
* To achieve **multiple inheritance** in PHP (since PHP doesn’t allow extending multiple classes, but you can implement multiple interfaces).

**Example:**

```php
interface Flyable {
    public function fly();
}

interface Swimmable {
    public function swim();
}

class Duck implements Flyable, Swimmable {
    public function fly() {
        echo "Duck is flying\n";
    }
    public function swim() {
        echo "Duck is swimming\n";
    }
}

$duck = new Duck();
$duck->fly();
$duck->swim();
```

🔹 **Why useful?**
Duck can both **fly** and **swim**, but these abilities are not connected to "Animal" inheritance.
You can apply same contract to planes, birds, fish, etc.

---

# 🆚 When to Use What?

| Feature                  | Abstract Class                    | Interface                                                          |
| ------------------------ | --------------------------------- | ------------------------------------------------------------------ |
| Contains implementation? | ✅ Yes                             | ❌ No (only method signatures)                                      |
| Properties allowed?      | ✅ Yes                             | ❌ No                                                               |
| Multiple inheritance?    | ❌ Only 1 class                    | ✅ A class can implement many interfaces                            |
| Purpose                  | **Code reuse + partial contract** | **Contract only**                                                  |
| Use case                 | When classes share common logic   | When classes need to follow same rules but are otherwise unrelated |

---

# 📌 Important OOP Topics (with Why we need them)

### 1. **Encapsulation**

* Keep data safe inside a class (`private`, `protected`, `public`).
* Example: Hide a bank account balance, only allow `deposit()` and `withdraw()`.
* **Why?** → Security & controlled access.

---

### 2. **Inheritance**

* One class reuses another class’s code.
* Example: `Dog extends Animal`.
* **Why?** → Don’t repeat code, follow DRY principle.

---

### 3. **Polymorphism**

* Same method name, different behavior.
* Example: `makeSound()` → Dog barks, Cat meows.
* **Why?** → Flexible design, can handle different objects with same interface.

---

### 4. **Abstract Classes**

* Mix of shared code + enforced rules.
* **Why?** → Useful when subclasses are similar but not identical.

---

### 5. **Interfaces**

* Pure contract, no code.
* **Why?** → Enforce rules across unrelated classes, allow multiple inheritance.

---

### 6. **Traits**

* Code reusability across unrelated classes.
* Example: `LoggerTrait` can be used in `User`, `Order`, `Product`.
* **Why?** → Avoid copy-paste of methods in many classes.

---

### 7. **Magic Methods**

* Special methods (`__get`, `__set`, `__call`, `__toString`).
* **Why?** → Give flexibility & shortcuts in object behavior.
* Example: `__toString` allows echoing object directly.

---

### 8. **Static Methods**

* Belong to the class, not to an object.
* Example: `Math::add(2,3)`.
* **Why?** → Utility methods, no need to create an object.

---

✅ **Summary:**

* Use **abstract classes** when you want to share some code + enforce rules.
* Use **interfaces** when you just want to enforce rules (no shared code).
* Both together give **flexibility + power** in designing large applications (like Magento, Laravel).

---
✅ **Magic Method**

| Magic Method   | When Called                       | Why Useful            |
| -------------- | --------------------------------- | --------------------- |
| `__construct`  | On object creation                | Initialization        |
| `__destruct`   | On object destruction             | Cleanup               |
| `__get`        | Access undefined/private property | Dynamic getters       |
| `__set`        | Assign undefined/private property | Dynamic setters       |
| `__call`       | Call undefined method             | Flexible APIs         |
| `__callStatic` | Call undefined static method      | Static APIs           |
| `__toString`   | Echo/print object                 | String representation |
| `__clone`      | Clone object                      | Custom copy behavior  |
| `__sleep`      | Serialize object                  | Select properties     |
| `__wakeup`     | Unserialize object                | Reinitialize          |

---

# 🔹 Why Magic Methods Are Used in Magento?

Magento uses magic methods mainly for **flexibility, dynamic property access, and reducing boilerplate code**.

Let’s go one by one:

---

## 1. `__construct()` → Dependency Injection

* Every Magento class relies on **constructor injection**.
* Magento automatically creates objects and injects dependencies.

✅ Example:

```php
class MyClass {
    private $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger) {
        $this->logger = $logger;
    }
}
```

👉 Magento creates `LoggerInterface` instance and passes it automatically.
Without `__construct()`, dependency injection wouldn’t work.

---

## 2. `__destruct()` → Resource Cleanup

* Rarely used directly, but useful in **DB adapters** or **file handlers**.
* Example: when Magento closes DB connections after request ends.

---

## 3. `__get()` and `__set()` → Dynamic Data Models

* Used in **Models, Data Objects, and EAV Entities**.
* They let Magento handle properties without explicitly defining them.

✅ Example:

```php
$product = $this->productRepository->getById(1);
echo $product->getData('name');   // internally calls __get
$product->setData('custom_attr', 'value'); // internally calls __set
```

👉 Thanks to `__get()` / `__set()`, Magento can support **dynamic attributes** (like custom product attributes) without writing new code each time.

---

## 4. `__call()` → Virtual/Generated Methods

* Magento uses `__call()` for **magic getters & setters** (`getSomething`, `setSomething`) in models.
* You don’t have to define each getter manually.

✅ Example:

```php
$product->getSku(); // method not explicitly defined
```

👉 Internally handled via `__call()` → it looks into product data array.
This is why all `getXxx` / `setXxx` methods just *work* even if not written in the class.

---

## 5. `__toString()` → Debugging & Logging

* Some Magento objects implement this for easy logging.
* Example: Exception classes return meaningful messages when cast to string.

✅ Example:

```php
try {
    throw new \Exception("Something went wrong!");
} catch (\Exception $e) {
    echo $e; // __toString prints the exception message
}
```

---

## 6. `__clone()` → Deep Copy in Collections

* Used when Magento **clones entities** (e.g., product duplication in admin).
* Ensures things like IDs are reset, not just copied.

✅ Example: When you **Duplicate a product in admin**, Magento uses `__clone()` to create a new copy without reusing the same entity ID.

---

## 7. `__sleep()` and `__wakeup()` → Caching & Serialization

* Magento **serializes objects** when storing them in cache/session.
* `__sleep()` → decide which properties should be stored.
* `__wakeup()` → restore non-serializable data (like DB connections).

✅ Example:

```php
Magento\Framework\Serialize\Serializer\Json
```

uses serialization extensively for storing configs, sessions, cache.

---

# 🔹 Real Magento Examples

1. **Product Attributes**

   * Accessed via `__get()` / `__set()` → no need to define 500+ properties manually.

   ```php
   $product->getCustomAttribute('color');
   $product->setCustomAttribute('color', 'red');
   ```

2. **Repositories & Data Objects**

   * `__call()` used for `getXxx` / `setXxx` dynamic methods.

3. **Caching**

   * `__sleep()` / `__wakeup()` control what’s saved when objects are cached.

4. **Product Duplication**

   * `__clone()` ensures a new product copy with a new ID.

---