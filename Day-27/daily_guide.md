
---

# 🔹 1. INNER JOIN

**Definition:**

* Returns rows that have **matching values in both tables**.
* If no match → row is excluded.

**Syntax:**

```sql
SELECT columns
FROM table1
INNER JOIN table2
ON table1.column = table2.column;
```

**Example:**
Get authors **who have written books**.

```sql
SELECT a.name, b.title
FROM authors a
INNER JOIN books b 
ON a.id = b.author_id;
```

---

# 🔹 2. LEFT JOIN (or LEFT OUTER JOIN)

**Definition:**

* Returns **all rows from the left table** + matched rows from right.
* If no match → right side columns show `NULL`.

**Syntax:**

```sql
SELECT columns
FROM table1
LEFT JOIN table2
ON table1.column = table2.column;
```

**Example:**
Show all authors, even if they don’t have books.

```sql
SELECT a.name, b.title
FROM authors a
LEFT JOIN books b ON a.id = b.author_id;
```

---

# 🔹 3. RIGHT JOIN (or RIGHT OUTER JOIN)

**Definition:**

* Returns **all rows from the right table** + matched rows from left.
* If no match → left side columns show `NULL`.

**Syntax:**

```sql
SELECT columns
FROM table1
RIGHT JOIN table2
ON table1.column = table2.column;
```

**Example:**
Show all books, even if they don’t have authors.

```sql
SELECT a.name, b.title
FROM authors a
RIGHT JOIN books b ON a.id = b.author_id;
```

---

# 🔹 4. FULL OUTER JOIN (MySQL workaround using UNION)

**Definition:**

* Returns **all rows from both tables**.
* If no match → the missing side shows `NULL`.
* MySQL doesn’t support it directly → simulate with `LEFT JOIN + RIGHT JOIN + UNION`.

**Syntax (MySQL):**

```sql
SELECT columns
FROM table1
LEFT JOIN table2 ON table1.column = table2.column
UNION
SELECT columns
FROM table1
RIGHT JOIN table2 ON table1.column = table2.column;
```

**Example:**
Show all authors and all books, even if they don’t match.

---

# 🔹 5. CROSS JOIN

**Definition:**

* Returns **Cartesian product** = every row in first table × every row in second table.
* If table1 has `m` rows and table2 has `n` rows → result has `m × n` rows.

**Syntax:**

```sql
SELECT *
FROM table1
CROSS JOIN table2;
```

**Example:**
Pair every author with every book.

---

# 🔹 6. SELF JOIN

**Definition:**

* A table joins with **itself**.
* Used for **hierarchical relationships** (e.g., employees and their managers).

**Syntax:**

```sql
SELECT e1.column, e2.column
FROM table e1
JOIN table e2
ON e1.related_id = e2.id;
```

**Example:**
Show employees with their managers.

---

# 📝 Quick Comparison

| Join Type      | What it Returns                                                       |
| -------------- | --------------------------------------------------------------------- |
| **INNER JOIN** | Only matching rows from both tables                                   |
| **LEFT JOIN**  | All rows from left table + matched rows from right (NULL if no match) |
| **RIGHT JOIN** | All rows from right table + matched rows from left (NULL if no match) |
| **FULL OUTER** | All rows from both tables (NULL where no match)                       |
| **CROSS JOIN** | Cartesian product (every row with every row)                          |
| **SELF JOIN**  | Table joined with itself (hierarchy, comparisons within same table)   |

---

# 🔹 Visual Diagrams of Joins

---

## 1. **INNER JOIN**

➡️ Only the intersection (matching data).

```
   (A) ●●●●
        ◉◉
       ●●●● (B)

Result = Intersection (◉)
```

👉 Only rows where A = B.

---

## 2. **LEFT JOIN**

➡️ All rows from left + matching rows from right.

```
   (A) ●●●●●●●●●
        ◉◉
       ●●●● (B)

Result = Whole A (● + ◉) + matches
```

👉 Includes unmatched rows from left with NULLs.

---

## 3. **RIGHT JOIN**

➡️ All rows from right + matching rows from left.

```
   (A) ●●●●
        ◉◉
       ●●●●●●●●● (B)

Result = Whole B (● + ◉) + matches
```

👉 Includes unmatched rows from right with NULLs.

---

## 4. **FULL OUTER JOIN**

➡️ Everything from both sides.

```
   (A) ●●●●◉◉●●●● (B)
Result = All A + All B
```

👉 Matches + non-matches from both.

---

## 5. **CROSS JOIN**

➡️ Cartesian product (all possible combinations).

```
   (A) ●●
   (B) ■■■

Result = 2 × 3 = 6 pairs:
(●1, ■1), (●1, ■2), (●1, ■3)
(●2, ■1), (●2, ■2), (●2, ■3)
```

---

## 6. **SELF JOIN**

➡️ Table joined with itself (hierarchy/relations).

```
 Employees Table
 ----------------
 id | name   | manager_id
 1  | Aesha  | NULL
 2  | Rahul  | 1
 3  | Neha   | 1
 4  | Amit   | 2

Result (Self Join):
Employee → Manager
Rahul    → Aesha
Neha     → Aesha
Amit     → Rahul
```

---
