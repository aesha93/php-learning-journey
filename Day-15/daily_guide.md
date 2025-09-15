
---

## 🧩 **What is MVC?**

**MVC** = **Model – View – Controller**
It’s a way to organize your code so **each part has a single job**:

* **Model** → Manages **data and business logic** (e.g., product details, orders).
* **View** → Handles **what the user sees** (HTML, templates).
* **Controller** → Acts as a **traffic director**, receives requests, talks to the model, and chooses which view to show.

> Think of a restaurant:
>
> * **Controller** = Waiter (takes your order, talks to kitchen, brings your food).
> * **Model** = Kitchen (prepares the food).
> * **View** = Table setup/plate (how the food is presented).

---

## 📂 **Basic Directory Structure**

```
mini_mvc/
  index.php          (Front controller & router)
  controllers/
    ProductController.php
  models/
    ProductModel.php
  views/
    product_list.php
```

---

## 🖥 **Step-by-Step Example**

### 1️⃣ **Model (Data + Logic)**

*File: `models/ProductModel.php`*

```php
<?php
class ProductModel {
    private $products = [
        ['sku'=>'A123','name'=>'Bag','price'=>500],
        ['sku'=>'B456','name'=>'Shoes','price'=>1200],
    ];

    public function getAll() {
        return $this->products;
    }
}
```

---

### 2️⃣ **Controller (Traffic Director)**

*File: `controllers/ProductController.php`*

```php
<?php
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController {
    public function list() {
        $model = new ProductModel();
        $data = $model->getAll();    // Fetch product data
        include __DIR__ . '/../views/product_list.php'; // Send data to the view
    }
}
```

---

### 3️⃣ **View (Presentation)**

*File: `views/product_list.php`*

```php
<?php foreach ($data as $product): ?>
  <p>
    <?php echo $product['name']; ?> — ₹<?php echo $product['price']; ?>
  </p>
<?php endforeach; ?>
```

---

### 4️⃣ **Front Controller / Router**

*File: `index.php`*

```php
<?php
require_once __DIR__ . '/controllers/ProductController.php';

// Decide which controller/action to run
$route = $_GET['route'] ?? 'products';

switch($route) {
    case 'products':
        $controller = new ProductController();
        $controller->list();
        break;
    default:
        echo "404 - Page Not Found";
}
```

---

## ▶ **How the Flow Works**

1. Browser requests: `http://localhost/mini_mvc/index.php?route=products`.
2. **index.php** routes to `ProductController::list()`.
3. Controller uses **ProductModel** to get data.
4. Controller passes `$data` to **product\_list.php**.
5. View renders HTML back to the browser.

---

## ❌ **Common Beginner Mistakes**

| Mistake                                        | Why It’s a Problem             | Fix                                                      |
| ---------------------------------------------- | ------------------------------ | -------------------------------------------------------- |
| Mixing HTML and database code in the same file | Hard to maintain, not reusable | Move HTML to views and logic to controllers/models       |
| Not reusing models                             | Duplicated logic everywhere    | Always fetch and process data in models                  |
| Controllers doing too much                     | Hard to test or update         | Keep controllers small: delegate heavy lifting to models |

---

Here’s a **beginner-friendly, detailed explanation** of the four concepts in PHP—keeping the Magento-style mindset but using plain language and simple examples.

---

## 🧩 **1. Separation of Concerns**

**What it means**

* Break your code into **distinct sections**, each responsible for a single job.
* Prevents “all-in-one” spaghetti code where HTML, database logic, and request handling are mixed together.

**Example**
❌ *Without separation:*

```php
<?php
// Bad: HTML, DB logic, and request handling mixed
$conn = new PDO(...);
$data = $conn->query("SELECT * FROM products");
echo "<ul>";
foreach ($data as $row) {
  echo "<li>{$row['name']} - {$row['price']}</li>";
}
echo "</ul>";
```

✅ *With separation:*

```php
// model/ProductModel.php
class ProductModel {
  public function all() { /* fetch data only */ }
}

// controller/ProductController.php
class ProductController {
  public function list() {
    $model = new ProductModel();
    $products = $model->all();
    include 'view/products.php'; // only passes data
  }
}

// view/products.php
<?php foreach ($products as $p): ?>
  <li><?= $p['name'] ?> - <?= $p['price'] ?></li>
<?php endforeach; ?>
```

**Why important**

* Easier maintenance and testing.
* Each piece can change without breaking others.

---

## 📂 **2. Directory Structure**

**What it means**

* Organizing files/folders consistently so you can locate controllers, models, and views quickly.
* PHP doesn’t enforce structure, but frameworks (like Magento) have conventions.

**Basic PHP MVC structure**

```
mini_app/
  index.php           (front controller)
  controllers/
    ProductController.php
  models/
    ProductModel.php
  views/
    products.php
  assets/
    css/
    js/
```

**Magento hint**
Magento uses:

```
app/code/Vendor/Module/
  Controller/
  Model/
  view/frontend/templates/
```

---

## 🛣 **3. Routing Basics**

**What it means**

* **Routing** maps a URL or route parameter to a **controller action**.
* A **front controller** (often `index.php`) inspects the request and decides which piece of code to run.

**Simple router**

```php
<?php
$route = $_GET['route'] ?? 'home';

switch($route) {
  case 'products':
    $controller = new ProductController();
    $controller->list();
    break;
  case 'orders':
    $controller = new OrderController();
    $controller->summary();
    break;
  default:
    echo "404 Page not found";
}
```

**Best practices**

* Keep routing logic in one place.
* Provide a default route and a 404 handler.
* Use clear, human-readable URLs.

---

## 🔄 **4. Request/Response Flow**

**What it means**

* **Request** = The browser asks your server for something (e.g., `GET /products`).
* **Response** = Your server sends back HTML, JSON, or another format.
* MVC organizes *what happens* between request and response.

**Flow steps**

1. **Browser Request** – e.g., `GET /index.php?route=products`.
2. **Front Controller** – Receives request, chooses the correct controller.
3. **Controller** – Calls the model for data.
4. **Model** – Talks to the database or data source and returns data.
5. **Controller** – Passes data to the view.
6. **View** – Renders HTML using the data.
7. **Response** – HTML is sent back to the browser.

**Illustration**

```
Browser → index.php (router) → Controller → Model
        → Controller → View → Browser
```

---

## ✅ **Key Takeaways**

| Concept                | Core Idea                                        |
| ---------------------- | ------------------------------------------------ |
| Separation of Concerns | Each part does one job: data, logic, or display. |
| Directory Structure    | Organized folders for easy maintenance.          |
| Routing Basics         | URLs mapped to controller actions.               |
| Request/Response Flow  | Steps from browser request to returned response. |

---
