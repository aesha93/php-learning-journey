
---

### 1️⃣ **Advanced Routing**

* **What you know:**

  * How to create a **basic router** that maps URL paths like `/product/list` or `/order/view` to specific controller actions.
  * Handling unknown routes gracefully (e.g., printing `404 Not Found`).
  * You can extend routing by supporting multiple paths and even nesting logic for different resources.

---

### 2️⃣ **MVC Integration**

* **What you know:**

  * You can separate **Model** (data arrays for products/orders), **View** (HTML output), and **Controller** (routing and business logic).
  * You understand why this separation makes the code cleaner and easier to maintain.
  * You practiced moving product data handling into a “model-like” area, views into functions that format output, and controllers to glue everything together.

---

### 3️⃣ **Repository Pattern**

* **What you know:**

  * A **Repository** acts as a **middle layer** between your data source (arrays or later MySQL) and the rest of your application.
  * You created `ProductRepository` and `ShippingRepository` to fetch all data or specific entries (like `getById`).
  * You handled missing data safely (returning `null` or `"Method not found"`).
  * You understand that repositories decouple data storage details from the rest of the app.

---

### 4️⃣ **Factory Pattern**

* **What you know:**

  * A **Factory** centralizes object (or array) creation.
  * You built an `OrderFactory` to generate orders consistently.
  * You saw that a Factory makes it easy to update creation logic in one place if the structure changes.

---

### 5️⃣ **Observer Pattern**

* **What you know:**

  * Observers **listen** for events and react without changing the main logic.
  * You simulated an `InventoryObserver` that updated stock when a new order was “processed.”
  * You understand the benefit: it reduces coupling—controllers don’t need to know every side effect.

---

### 6️⃣ **Singleton Pattern**

* **What you know:**

  * You created a **Singleton** `OrderProcessor` so all orders use the **same instance**.
  * You verified that multiple `getInstance()` calls return the exact same object.
  * You understand when to use Singleton (shared state or resources like logging, config) and when **not** to overuse it (can make testing harder if abused).

---
