Sure 👍 Here are **short and clear notes on Index in MySQL** — perfect for quick revision 👇

---

## 🧠 **MySQL Index – Summary Notes**

### 🔹 What is an Index?

An **index** is a database structure that speeds up data retrieval from a table — like an index in a book that helps you find topics faster.

---

### 🔹 Why Use Index?

* Makes `SELECT`, `JOIN`, `ORDER BY`, `GROUP BY` faster
* Avoids **full table scans**
* Useful for **large tables**

---

### 🔹 How It Works

* MySQL stores indexed columns in a **sorted structure (B-Tree)**
* When you search using a `WHERE` clause, MySQL **navigates the tree** instead of scanning all rows

---

### 🔹 Types of Indexes

| Type                   | Description                             | Example              |
| ---------------------- | --------------------------------------- | -------------------- |
| **PRIMARY KEY**        | Unique & not null; one per table        | `id`                 |
| **UNIQUE INDEX**       | No duplicate values                     | `email`              |
| **INDEX / KEY**        | Normal index to speed lookups           | `price`              |
| **FULLTEXT INDEX**     | For text search (e.g., article content) | `description`        |
| **MULTI-COLUMN INDEX** | Combines multiple columns               | `(author_id, title)` |

---

### 🔹 Create Index

```sql
CREATE INDEX idx_title ON Books(title);
```

### 🔹 Remove Index

```sql
DROP INDEX idx_title ON Books;
```

### 🔹 View Indexes

```sql
SHOW INDEX FROM Books;
```

---

### 🔹 When Index Is Used

✅ Used when:

* Column is in `WHERE`, `JOIN`, `ORDER BY`, `GROUP BY`
* Search is selective (many unique values)

❌ Not used when:

* You use a function → `WHERE UPPER(name)`
* You start LIKE with `%` → `LIKE '%term'`
* You use `!=`, `<>, OR` improperly

---

### 🔹 Disadvantages

* Slows down `INSERT`, `UPDATE`, `DELETE` (index must be updated)
* Takes extra storage space
* Too many indexes can confuse optimizer

---
