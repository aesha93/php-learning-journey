## Array

# Concepts Explained

## Indexed Arrays

**What it is:** A simple list where each item has a number index starting at `0`.
**Where you’ll see it in Magento:** Lists like product SKUs, enabled shipping methods, or order IDs.

**Example (product image gallery):**

```php
<?php
$gallery = ['img_main.jpg', 'img_side.jpg', 'img_back.jpg'];
echo $gallery[0]; // img_main.jpg
echo $gallery[2]; // img_back.jpg
```

**Common mistakes**

* Using 1-based indexes (`$gallery[1]` as “first” item). PHP starts at `0`.
* Mixing unrelated data in one list (e.g., putting a number inside a list of SKUs).

**Best practices**

* Keep one clear purpose per list (all SKUs, all image names, etc.).
* Use plural nouns for list names: `$skus`, `$methodCodes`, `$orderIds`.

---

## Associative Arrays

**What it is:** A key → value map (like labeled fields).
**Where you’ll see it in Magento:** A single product, a single order, or one shipping method’s data.

**Example (a Magento-like product):**

```php
<?php
$product = [
    'sku'   => 'TEE-BLK-XS',
    'name'  => 'Black T-Shirt - XS',
    'price' => 499.00,
    'status'=> 'enabled'
];

echo $product['sku'];   // TEE-BLK-XS
echo $product['price']; // 499
```

**Common mistakes**

* Typos in keys (`'prcie'` instead of `'price'`).
* Mixing numeric and string keys without reason.

**Best practices**

* Keep keys consistent with Magento-like field names (`sku`, `name`, `price`, `qty`).
* Use one associative array to model one entity (one product, one address, etc.).

---

## Multidimensional Arrays

**What it is:** An array that contains other arrays inside it (nesting).
**Where you’ll see it in Magento:** Entity fields that are themselves structured, e.g., a product with a nested `dimensions` array or order `addresses`.

**Example (product with nested data):**

```php
<?php
$product = [
    'sku'   => 'MUG-RED',
    'name'  => 'Red Mug',
    'price' => 299.00,
    'dimensions' => [
        'width'  => 8,
        'height' => 10,
        'unit'   => 'cm'
    ]
];

echo $product['dimensions']['height']; // 10
```

**Common mistakes**

* Forgetting the second set of brackets when accessing nested values.
* Over-nesting when a flat structure would be clearer.

**Best practices**

* Nest when the data naturally belongs together (e.g., `dimensions`, `address`).
* Keep nesting shallow and meaningful.

---

## 2D Associative Arrays (Arrays of Entities)

**What it is:** A list (indexed array) where each item is an associative array with the same keys.
**Where you’ll see it in Magento:** Collections like order items, cart items, product lists.

**Example (order items):**

```php
<?php
$items = [
    ['sku' => 'TEE-BLK-XS', 'name' => 'T-Shirt XS', 'qty' => 1, 'price' => 499.00],
    ['sku' => 'MUG-RED',    'name' => 'Red Mug',   'qty' => 2, 'price' => 299.00],
];

echo $items[0]['name']; // T-Shirt XS
echo $items[1]['qty'];  // 2
```

**Common mistakes**

* Inconsistent keys across rows (one item has `qty`, another has `quantity`).
* Assuming order of rows never changes; always access by index intentionally.

**Best practices**

* Use identical keys for every row.
* Treat each row as “one entity record”.

---

## Allowed Array Functions (Beginner Use)

### `array_push($array, $value1, $value2, ...)`

Add value(s) to the **end** of an indexed array.

```php
<?php
$methods = ['freeshipping_freeshipping'];
array_push($methods, 'flatrate_flatrate', 'cashondelivery');
echo $methods[2]; // cashondelivery
```

**Mistake:** Trying to push into an associative array to “set a key”. `array_push` doesn’t set keys; it appends numeric-indexed values.

---

### `array_pop($array)`

Remove and **return** the last value from an indexed array.

```php
<?php
$gallery = ['img1.jpg', 'img2.jpg', 'img3.jpg'];
$last = array_pop($gallery); // 'img3.jpg' removed
echo $last; // img3.jpg
```

**Mistake:** Expecting it to remove from the start. It removes from the end.

---

### `array_merge($array1, $array2, ...)`

Combine arrays. For **indexed arrays**, it appends values. For **associative arrays**, later keys overwrite earlier ones.

```php
<?php
$a = ['freeshipping_freeshipping'];
$b = ['flatrate_flatrate', 'cashondelivery'];
$all = array_merge($a, $b);
// ['freeshipping_freeshipping', 'flatrate_flatrate', 'cashondelivery']
```

**Mistake:** Using `array_merge` on associative arrays without realizing identical keys will be overwritten.

---

### `array_keys($assoc)`

Get all keys from an associative array.

```php
<?php
$product = ['sku'=>'TEE-BLK-XS', 'name'=>'T-Shirt XS', 'price'=>499.00];
$keys = array_keys($product);
// ['sku','name','price']
```

### `array_values($assoc)`

Get all values from an associative array.

```php
<?php
$values = array_values($product);
// ['TEE-BLK-XS','T-Shirt XS',499.00]
```

### `array_search($needle, $haystack)`

Find the index/key of a value in an array (returns the index/key or `false` if not found).

```php
<?php
$methods = ['freeshipping_freeshipping', 'flatrate_flatrate', 'cashondelivery'];
$pos = array_search('flatrate_flatrate', $methods); // 1
```

**Mistake:** Comparing the result loosely to `true/false`. Check `=== false` when testing “not found”.

