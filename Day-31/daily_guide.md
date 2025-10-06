# What is INNER JOIN?

An INNER JOIN in MySQL returns only the rows that have matching values in both tables.
If a row exists in one table but not in the other, it will not appear in the result.

# Syntax

SELECT columns
FROM table1
INNER JOIN table2
ON table1.column = table2.column;