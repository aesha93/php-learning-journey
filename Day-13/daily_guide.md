
---

# **PHP Step-by-Step: Forms, Sessions, Files, and Security**

## **Concepts Explained**

### 1. **`$_GET`**

* **Definition:** `$_GET` is a superglobal array in PHP that collects data sent via the URL query string.
* **Use case:** When a user clicks a link like `example.com?product_id=10`, PHP can read `product_id` using `$_GET`.

# 🔹 1. What is `$_GET`?

* `$_GET` is a **superglobal array** in PHP.
* It collects **data sent via the URL query string** (the part after `?`).
* Data is always sent as **text**.

# 🔹 2. Characteristics of `$_GET`

* Data is visible in the URL (not secure).
* Useful for **search, filters, pagination, navigation**.
* Max length depends on browser/server (usually \~2000 chars).
* Values are always **strings** (you need to validate/convert).


* **Example:**

```php
<?php
$product = ['id' => 101, 'name' => 'T-shirt', 'price' => 499];
$productId = $_GET['product_id'] ?? null; // Fetch product_id from URL
if ($productId == $product['id']) {
    echo "Product Name: " . $product['name'];
}
?>
```

* **Common mistakes:**

  * Assuming the `$_GET` key always exists → can cause "undefined index".
  * Not validating the input → can lead to security issues.

* **Best practice:** Always check if the key exists and sanitize the input.

---

### 2. **`$_POST`**

* **Definition:** `$_POST` collects data sent via HTML forms using `method="post"`.
* **Use case:** When a user submits a form with order details.
* **Example:**

```php
<?php
$order = ['product_id' => 101, 'quantity' => 2];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantity = $_POST['quantity'] ?? 1; // Default to 1 if not set
    echo "Order Quantity: " . htmlspecialchars($quantity);
}
?>
<form method="post">
    Quantity: <input type="number" name="quantity">
    <button type="submit">Order</button>
</form>
```

* **Common mistakes:**

  * Trusting raw input → may lead to XSS attacks.
* **Best practice:** Always sanitize input using `htmlspecialchars()` or `filter_var()`.

---

### 3. **`$_SESSION`**

* **Definition:** `$_SESSION` allows you to store data across multiple pages for a user (like a shopping cart).
* **Use case:** Keep a user’s cart items during a session.
* **Example:**

```php
<?php
session_start(); // Always start session first
$_SESSION['cart'] = [
    ['product_id' => 101, 'quantity' => 2],
    ['product_id' => 102, 'quantity' => 1]
];
print_r($_SESSION['cart']);
?>
```

* **Common mistakes:**

  * Forgetting `session_start()` → session data won’t work.
  * Storing sensitive data without care → security risk.

---

### 4. **`$_FILES`**

* **Definition:** `$_FILES` handles file uploads from forms.
* **Use case:** Uploading product images in Magento.
* **Example:**

```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['product_image'])) {
    $fileName = $_FILES['product_image']['name'];
    $fileTmp = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($fileTmp, "uploads/" . $fileName);
    echo "Uploaded: " . $fileName;
}
?>
<form method="post" enctype="multipart/form-data">
    Product Image: <input type="file" name="product_image">
    <button type="submit">Upload</button>
</form>
```

* **Common mistakes:**

  * Not using `enctype="multipart/form-data"` in the form.
  * Not checking file size/type → security risk.

---

### 5. **Input Validation**

* **Definition:** Checking whether user input is in the expected format/type.
* **Use case:** Ensure quantity is a positive integer.
* **Example:**

```php
$quantity = $_POST['quantity'] ?? 0;
if (filter_var($quantity, FILTER_VALIDATE_INT, ["options" => ["min_range"=>1]])) {
    echo "Valid quantity: $quantity";
} else {
    echo "Invalid quantity!";
}
```

* **Best practice:** Always validate before processing data.

---

### 6. **Sanitization**

* **Definition:** Cleaning input to remove unwanted characters.
* **Example:**

```php
$productName = $_POST['product_name'] ?? '';
$cleanName = filter_var($productName, FILTER_SANITIZE_STRING);
echo "Sanitized Name: $cleanName";
```

* **Common mistakes:** Confusing validation with sanitization.
* **Best practice:** Validate first, then sanitize.

---

### 7. **CSRF Protection**

* **Definition:** Prevent Cross-Site Request Forgery by ensuring that the form submission comes from your site.
* **Implementation example:**

```php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
?>
<form method="post">
    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    Quantity: <input type="number" name="quantity">
    <button type="submit">Order</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die('CSRF validation failed!');
    }
    echo "CSRF check passed!";
}
?>
```

* **Best practice:** Always generate a unique token per session and verify on form submission.

---

## **Exercises**

### **Exercise 1: Collect product ID via `$_GET`**

**Task:** Use `$_GET` to fetch a product ID and print its name from an array.

```php
<?php
$products = [
    ['id'=>101,'name'=>'T-shirt'],
    ['id'=>102,'name'=>'Jeans']
];

$productId = $_GET['product_id'] ?? null;

if ($productId) {
    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            echo "Product: " . $product['name'];
        }
    }
}
?>
```

**Step-by-step:**

1. Define an array of products.
2. Get `product_id` from the URL using `$_GET`.
3. Loop through products and match the ID.
4. Print the product name.

---

### **Exercise 2: Submit order quantity using `$_POST` with validation**

**Task:** Create a form to input quantity. Validate it's a positive integer.

```php
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantity = $_POST['quantity'] ?? 0;
    if (filter_var($quantity, FILTER_VALIDATE_INT, ["options"=>["min_range"=>1]])) {
        echo "Order Quantity: $quantity";
    } else {
        echo "Invalid quantity!";
    }
}
?>
<form method="post">
    Quantity: <input type="number" name="quantity">
    <button type="submit">Order</button>
</form>
```

**Step-by-step:**

1. Check if form is submitted via POST.
2. Retrieve quantity.
3. Validate using `filter_var`.
4. Print quantity if valid, else show error.

---

### **Exercise 3: Upload product image with CSRF protection**

**Task:** Upload a product image while verifying a CSRF token.

```php
<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die('CSRF validation failed!');
    }
    if (isset($_FILES['product_image'])) {
        $fileName = $_FILES['product_image']['name'];
        move_uploaded_file($_FILES['product_image']['tmp_name'], "uploads/".$fileName);
        echo "Uploaded: $fileName";
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    Product Image: <input type="file" name="product_image">
    <button type="submit">Upload</button>
</form>
```

**Step-by-step:**

1. Start session and generate CSRF token.
2. On POST, verify CSRF token.
3. Check `$_FILES` for uploaded file.
4. Move file to `uploads/` folder.
5. Confirm upload success.

---

