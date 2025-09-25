### Step 1: Filtering Data with WHERE

Syntax:

SELECT column1, column2
FROM table_name
WHERE condition;


### Step 2: Sorting with ORDER BY

The ORDER BY clause is used to sort results.

Syntax:

SELECT column1, column2
FROM table_name
WHERE condition
ORDER BY column_name ASC|DESC;


### Step 3: Limiting Results with LIMIT

The LIMIT clause is used to restrict the number of rows returned.

Syntax:

SELECT column1, column2
FROM table_name
WHERE condition
ORDER BY column_name
LIMIT number;


### Step 4: Grouping Data with GROUP BY and Filtering Groups with HAVING 

GROUP BY is used when you want to aggregate data (count, sum, average) per category.
HAVING is like WHERE but works after grouping.

Syntax:

SELECT column1, AGGREGATE_FUNCTION(column2)
FROM table_name
GROUP BY column1
HAVING condition;

===========================================
 **why joins are needed** in MySQL.

---

### **1️⃣ The Problem Without Joins**

Suppose you have **two tables**:

**Authors table**

| id | name         | country |
| -- | ------------ | ------- |
| 1  | J.K. Rowling | UK      |
| 2  | Dan Brown    | USA     |

**Books table**

| id | title        | author_id | price |
| -- | ------------ | --------- | ----- |
| 1  | Harry Potter | 1         | 20    |
| 2  | Inferno      | 2         | 18    |

Now, if you want to **see book title with author name**, the data is split:

* Books table has `title` and `author_id`
* Authors table has `name` and `id`

❌ Without joins, you’d have to manually look up author names for each book — impossible in real scenarios with hundreds of rows.

---

### **2️⃣ What Joins Do**

A **join combines rows from two or more tables** based on a **related column**.

* It allows you to **query related data together** in one result set.
* Example: Combine `books` and `authors` using `author_id = id`.

✅ Result of join:

| title        | author_name  | price |
| ------------ | ------------ | ----- |
| Harry Potter | J.K. Rowling | 20    |
| Inferno      | Dan Brown    | 18    |

---

### 3.INNER JOIN Definition

Inner join returns only the rows where there is a match in both tables.

## synatx

SELECT b.title, a.name
FROM books b
INNER JOIN authors a
    ON b.author_id = a.id;


### 4.LEFT JOIN Definition

All rows from left table (books), and matching rows from authors.

## synatx

SELECT b.title, a.name
FROM books b
LEFT JOIN authors a
    ON b.author_id = a.id;


### 5.RIGHT JOIN Definition

All rows from right table (authors), and matching rows from books.

## synatx

SELECT b.title, a.name
FROM books b
RIGHT JOIN authors a
    ON b.author_id = a.id;


### 6. Visual Venn Diagram Style

* **INNER JOIN** → Intersection (common part)
* **LEFT JOIN** → Everything from left + matches from right
* **RIGHT JOIN** → Everything from right + matches from left

Great question 👍 Let’s understand **INNER JOIN, LEFT JOIN, and RIGHT JOIN** visually, step by step.

---

## 🟢 1. INNER JOIN

👉 Returns only the rows where there is a **match in both tables**.

```
Table A        Table B
+---+---+      +---+---+
| A | 1 |      | 1 | X |
| B | 2 |      | 2 | Y |
| C | 3 |      | 4 | Z |
+---+---+      +---+---+

INNER JOIN ON column = column

Result:
+---+---+
| A | X |
| B | Y |
+---+---+
```

✅ Only `1` and `2` matched → we keep those.
❌ `3` (from A) and `4` (from B) are ignored.

---

## 🟡 2. LEFT JOIN

👉 Returns **all rows from the left table (A)**, plus matched rows from right table (B).
If no match, show `NULL` for right table values.

```
Table A        Table B
+---+---+      +---+---+
| A | 1 |      | 1 | X |
| B | 2 |      | 2 | Y |
| C | 3 |      | 4 | Z |
+---+---+      +---+---+

LEFT JOIN

Result:
+---+---+
| A | X |
| B | Y |
| C | NULL |
+---+---+
```

✅ All rows from A are included.
❌ `C (3)` had no match → `NULL`.

---

## 🔵 3. RIGHT JOIN

👉 Returns **all rows from the right table (B)**, plus matched rows from left table (A).
If no match, show `NULL` for left table values.

```
Table A        Table B
+---+---+      +---+---+
| A | 1 |      | 1 | X |
| B | 2 |      | 2 | Y |
| C | 3 |      | 4 | Z |
+---+---+      +---+---+

RIGHT JOIN

Result:
+---+---+
| A | X |
| B | Y |
| NULL | Z |
+---+---+
```

✅ All rows from B are included.
❌ `Z (4)` had no match → `NULL` from A.

---

✅ Visual Summary


| Join Type  | Rows Returned                  | Example Context                 |
| ---------- | ------------------------------ | ------------------------------- |
| INNER JOIN | Only matching rows             | Books with valid authors        |
| LEFT JOIN  | All left table rows + matches  | All authors + their books       |
| RIGHT JOIN | All right table rows + matches | All authors + their books       |
| FULL OUTER | All rows from both tables      | Combine unmatched books/authors |
| CROSS JOIN | All combinations               | Every author × every book       |
| SELF JOIN  | Join table to itself           | Employee → Manager              |
