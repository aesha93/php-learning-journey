Perfect 👌 You’re doing great — and subqueries are one of the **most powerful parts of SQL**.
Let’s go **deep into subqueries** step by step with concepts + examples + practice.

---

# 🔹 What is a Subquery?

A **subquery** is a query inside another query.
It’s used when the result of one query is needed by another.

Syntax:

```sql
SELECT column
FROM table
WHERE column OPERATOR (SELECT column FROM table WHERE condition);
```

---
# 🔹 OFFSET in MySQL

In MySQL, when you use LIMIT, you can also use OFFSET.
It tells the database: “Skip N rows, then return the next rows.”

# 🔹 What is DISTINCT?

DISTINCT is used in SQL to remove duplicate rows from the result set.

It tells MySQL: “Show me only unique values, no repeats.”

# 🔹 Types of Subqueries in MySQL


## 1. **Scalar Subquery** (returns single value)

* Used in `WHERE` or `SELECT`.

```sql
-- Find books more expensive than average
SELECT title, price 
FROM Books
WHERE price > (SELECT AVG(price) FROM Books);
```

👉 Subquery returns **one value (avg price)**.

---

## 2. **Row Subquery** (returns one row with multiple columns)

```sql
-- Find the author of the cheapest book
SELECT name
FROM Authors
WHERE author_id = (
    SELECT author_id FROM Books ORDER BY price ASC LIMIT 1
);
```

👉 Subquery returns **one row with author_id**.

---

## 3. **Column Subquery** (returns multiple values, one column)

```sql
-- Find authors who wrote at least one book
SELECT name
FROM Authors
WHERE author_id IN (SELECT author_id FROM Books);
```

👉 Subquery returns **list of author_id values**.

---

## 4. **Table Subquery** (returns multiple rows & columns)

Used in `FROM` clause like a temporary table.

```sql
-- Find top 2 expensive books
SELECT * 
FROM (SELECT title, price FROM Books ORDER BY price DESC LIMIT 2) AS TopBooks;
```

👉 Subquery acts like a **table**.

---

## 5. **Correlated Subquery** (runs for each row of outer query)

```sql
-- Find books that are the most expensive per year
SELECT title, year_published, price
FROM Books b1
WHERE price = (
    SELECT MAX(price)
    FROM Books b2
    WHERE b1.year_published = b2.year_published
);
```

👉 Subquery depends on outer query (`b1.year_published`).

---

## 6. **EXISTS / NOT EXISTS Subquery**

```sql
-- Find authors who have written at least one book
SELECT name
FROM Authors a
WHERE EXISTS (SELECT 1 FROM Books b WHERE b.author_id = a.author_id);

-- Authors who never wrote a book
SELECT name
FROM Authors a
WHERE NOT EXISTS (SELECT 1 FROM Books b WHERE b.author_id = a.author_id);
```

👉 Checks if subquery returns rows (`TRUE` or `FALSE`).

---

## 7. **ANY / ALL Subquery**

* `> ANY` → greater than at least one value
* `> ALL` → greater than all values

```sql
-- Books cost more than ANY book by Maya Singh
SELECT title, price
FROM Books
WHERE price > ANY (
    SELECT price FROM Books b
    JOIN Authors a ON b.author_id = a.author_id
    WHERE a.name = 'Maya Singh'
);

-- Books cost more than ALL books by Maya Singh
SELECT title, price
FROM Books
WHERE price > ALL (
    SELECT price FROM Books b
    JOIN Authors a ON b.author_id = a.author_id
    WHERE a.name = 'Maya Singh'
);
```

---

# 🔹 How to Think About Subqueries (Step-by-Step)

1. **What do I want to find?**
   (Example: books more expensive than average)

2. **Can I calculate it with a simple query?**

   ```sql
   SELECT AVG(price) FROM Books;
   ```

   ✅ Yes → this is your subquery.

3. **Where do I use this result?**
   → Put it inside the main query.

   ```sql
   SELECT title, price FROM Books
   WHERE price > (SELECT AVG(price) FROM Books);
   ```

---