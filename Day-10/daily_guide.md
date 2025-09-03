
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
