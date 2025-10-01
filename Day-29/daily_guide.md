## 🔹 What is a Subquery?

A **subquery** is a query **inside another query**.

* The inner query executes first.
* Its result is used by the outer query.
* Subqueries are often used with `SELECT`, `INSERT`, `UPDATE`, `DELETE`.

---

## 🔹 Types of Subqueries

1. **Single-row subquery** → returns **one value** (used with `=`, `<`, `>`, etc.)
2. **Multi-row subquery** → returns **multiple values** (used with `IN`, `ANY`, `ALL`)
3. **Multi-column subquery** → returns **multiple columns**.
4. **Correlated subquery** → inner query depends on outer query (runs row by row).
5. **Nested subquery in FROM** (used as a derived table).

---

## 🔹 Syntax

```sql
SELECT column1, column2
FROM table1
WHERE column3 = (SELECT columnX FROM table2 WHERE condition);
```

---

## 🔹 Examples

### 1. Single-row Subquery

Find the book(s) with the **highest price**:

```sql
SELECT title, price
FROM books
WHERE price = (SELECT MAX(price) FROM books);
```

---

### 2. Multi-row Subquery

Find authors who have written **at least one book**:

```sql
SELECT name
FROM authors
WHERE author_id IN (SELECT author_id FROM books);
```

---

### 3. Multi-column Subquery

Find author and book pairs that match:

```sql
SELECT author_id, title
FROM books
WHERE (author_id, title) IN (
    SELECT author_id, title FROM bestsellers
);
```

---

### 4. Correlated Subquery

Find books that are the **most expensive for each author**:

```sql
SELECT b1.title, b1.price, b1.author_id
FROM books b1
WHERE price = (
    SELECT MAX(b2.price)
    FROM books b2
    WHERE b2.author_id = b1.author_id
);
```

---

### 5. Subquery in FROM (Derived Table)

Find average book price per author:

```sql
SELECT author_id, AVG(price) AS avg_price
FROM books
GROUP BY author_id;

-- With subquery:
SELECT author_id, avg_price
FROM (SELECT author_id, AVG(price) AS avg_price
      FROM books
      GROUP BY author_id) AS temp
WHERE avg_price > 500;
```

---

## 🔹 When to Use Subqueries

✅ When the logic is easier with a nested query.
✅ When filtering results based on aggregated values.
✅ When comparing with another dataset.

❌ But: sometimes `JOIN` is faster than subquery.

---

👉 Do you want me to now give you **step-by-step practice exercises** on subqueries (like we did with joins)?
