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

