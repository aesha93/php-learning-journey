# Concepts Explained

## 1) Function declaration & return

**What it is:** A function is a reusable block of code. You “declare” it once and then “call” it whenever you need it.
**Return:** A function can send a value back to the caller using `return`.

**Example (order subtotal):**

```php
<?php
function order_subtotal($order) {
    // $order is an array with an 'items' list
    $sum = 0;
    foreach ($order['items'] as $item) {
        $sum = $sum + ($item['qty'] * $item['price']);
    }
    return $sum; // send the result back
}

$order = [
    'items' => [
        ['sku' => 'MH01', 'qty' => 2, 'price' => 1500],
        ['sku' => 'MH02', 'qty' => 1, 'price' => 800],
    ]
];

echo order_subtotal($order); // Expected: 3800
```

**Common mistakes**

* Forgetting `return` (then the function gives `NULL`).
* Mixing `echo` and `return` (printing is not returning).
* Using variables inside a function that were never defined there (scope issue).

**Best practices**

* Give the function a **clear name** (verb + what it does).
* Return a **single, well-defined value**.

---

## 2) Parameters (inputs)

**What it is:** Parameters let you pass data **into** a function.

**Example (add shipping to total):**

```php
<?php
function add_shipping($total, $shippingCost) {
    return $total + $shippingCost;
}

echo add_shipping(3800, 50); // Expected: 3850
```

**Common mistakes**

* Passing parameters in the wrong order.
* Expecting a parameter to exist when you didn’t pass it.

**Best practices**

* Order parameters from most important to least.
* Keep parameter names descriptive.

---

## 3) Default parameters

**What it is:** If a caller doesn’t supply a parameter, use a **default**.

**Example (grand total with default shipping and tax):**

```php
<?php
function grand_total($subtotal, $shipping = 50, $taxRate = 0.18) {
    $tax = $subtotal * $taxRate;
    return $subtotal + $shipping + $tax;
}

echo grand_total(3800);              // Expected: 4534  (3800 + 50 + 684)
echo "\n";
echo grand_total(3800, 0, 0.10);     // Expected: 4180  (3800 + 0 + 380)
```

**Common mistakes**

* Putting a non-default parameter after a default one. (Defaults must come **after** required params.)

**Best practices**

* Use defaults for “typical” values (e.g., standard shipping, standard tax).

---

## 4) Variable arguments (variadic)

**What it is:** Accept a **flexible number** of arguments using `...$args`.

**Example (sum product prices from multiple product arrays):**

```php
<?php
function sum_product_prices(...$products) {
    $sum = 0;
    foreach ($products as $p) {
        $sum = $sum + $p['price'];
    }
    return $sum;
}

$p1 = ['sku' => 'MUG01', 'price' => 200];
$p2 = ['sku' => 'TSHIRT1', 'price' => 499];
$p3 = ['sku' => 'CAP01', 'price' => 150];

echo sum_product_prices($p1, $p2, $p3); // Expected: 849
```

**Common mistakes**

* Forgetting that `...$products` is a **list of arguments**, not a single array.

**Best practices**

* Use variadics when “N items” is natural (e.g., sum of many prices).

---

## 5) Scope (local, global, static)

**Local:** Variables inside a function exist **only** there.
**Global:** Variables outside need `global $var;` inside a function to use them.
**Static:** A function-level variable that **remembers** its value between calls.

**Example:**

```php
<?php
$globalTaxRate = 0.18;

function compute_tax_with_global($amount) {
    global $globalTaxRate; // bring in the global (use sparingly)
    return $amount * $globalTaxRate;
}

function count_shipments_processed() {
    static $count = 0; // remembers between calls
    $count = $count + 1;
    return $count;
}

echo compute_tax_with_global(1000);       // Expected: 180
echo "\n";
echo count_shipments_processed();         // 1
echo "\n";
echo count_shipments_processed();         // 2
```

**Common mistakes**

* Assuming outside variables are visible inside (they’re not, unless `global`).
* Overusing `global` (makes code harder to reason about).

**Best practices**

* Prefer **parameters** over globals.
* Use **static** for simple counters/state that naturally lives in the function.

---

## 6) Anonymous functions

**What it is:** A function **without a name** stored in a variable.

**Example (apply discount):**

```php
<?php
$discount10 = function($price) {
    return $price * 0.90;
};

$product = ['sku' => 'SHOE1', 'price' => 2000];
echo $discount10($product['price']); // Expected: 1800
```

**Common mistakes**

* Forgetting the trailing semicolon after the function definition when assigning to a variable.

**Best practices**

* Use for small, one-off behaviors you want to pass around.

---

## 7) Closures

**What it is:** An anonymous function that **captures** variables from the surrounding scope using `use`.

**Example (coupon closure):**

```php
<?php
function percent_coupon($rate) {
    return function($price) use ($rate) {
        return $price - ($price * $rate);
    };
}

$coupon = percent_coupon(0.15); // 15% off
echo $coupon(2000); // Expected: 1700
```

**Common mistakes**

* Forgetting `use ($variable)` when the closure needs outside data.

**Best practices**

* Great for creating small, configurable behaviors (e.g., different coupons).

---

## 8) Arrow functions (short syntax)

**What it is:** Compact function form. It **automatically captures** outer variables by value, no `use` needed.

**Example (arrow version of discount):**

```php
<?php
$rate = 0.20;
$discount = fn($price) => $price - ($price * $rate);

echo $discount(1500); // Expected: 1200
```

**Common mistakes**

* Trying to write multiple statements (arrow functions are single-expression only).

**Best practices**

* Use for short, clear calculations.

---
