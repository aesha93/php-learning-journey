-- Show all books with their authors.
-- INNER JOIN Exercise

SELECT b.title , a.name AS author
FROM Books  b
INNER JOIN Authors a ON b.author_id = a.author_id;

-- Show all authors, even those without books

SELECT a.name AS author, b.title
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id;


-- Show all books, even if they don’t have authors.

SELECT b.title, a.name AS author
FROM Books b
RIGHT JOIN Authors a ON b.author_id = a.author_id;

-- FULL OUTER JOIN (MySQL workaround with UNION)

SELECT a.name AS author, b.title
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id

UNION

SELECT a.name AS author, b.title
FROM Authors a
RIGHT JOIN Books b ON a.author_id = b.author_id;


-- Show all possible pairings of authors and books.

SELECT a.name AS author, b.title
FROM Authors a
CROSS JOIN Books b;


-- SELF JOIN (Extra example with Employees table)

CREATE TABLE Employees (
    emp_id INT PRIMARY KEY,
    name VARCHAR(50),
    manager_id INT
);

INSERT INTO Employees VALUES
(1, 'Aesha', NULL),
(2, 'Rahul', 1),
(3, 'Neha', 1),
(4, 'Amit', 2);

SELECT e.name AS employee, m.name AS manager
FROM Employees e
LEFT JOIN Employees m ON e.manager_id = m.emp_id;


-- Show all books with their authors (exclude books without author).

SELECT b.title, a.name AS author
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id;

-- Show all authors and their books. Include authors with no books.

SELECT a.name AS author, b.title
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id;

-- Show all books and authors, including books without author.

SELECT b.title, a.name AS author
FROM Books b
RIGHT JOIN Authors a ON b.author_id = a.author_id;

-- FULL OUTER JOIN (UNION)

SELECT a.name AS author, b.title
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id

UNION

SELECT a.name AS author, b.title
FROM Authors a
RIGHT JOIN Books b ON a.author_id = b.author_id;

-- Show all possible author–book pairings.

SELECT a.name AS author, b.title
FROM Authors a
CROSS JOIN Books b;

-- SELF JOIN (Employees)

CREATE TABLE Employees (
    emp_id INT PRIMARY KEY,
    name VARCHAR(50),
    manager_id INT
);

INSERT INTO Employees VALUES
(1, 'Aesha', NULL),
(2, 'Rahul', 1),
(3, 'Neha', 1),
(4, 'Amit', 2);

SELECT e.name AS employee, m.name AS manager
FROM Employees e
LEFT JOIN Employees m ON e.manager_id = m.emp_id;


-- LEFT JOIN + Filtering
-- Show authors with no books.

SELECT a.name
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id
WHERE b.book_id IS NULL;

-- INNER JOIN + Filtering
-- Show books written by 'George Orwell'.

SELECT b.title
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
WHERE a.name = 'George Orwell';

-- AGGREGATE + JOIN
-- Show authors and the number of books they have written. Include authors with zero books.

SELECT a.name, COUNT(b.book_id) AS total_books
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id
GROUP BY a.author_id;

-- CROSS JOIN + Filter
-- Show all authors paired with books they did NOT write.

SELECT a.name AS author, b.title AS book
FROM Authors a
CROSS JOIN Books b
WHERE a.author_id <> b.author_id OR b.author_id IS NULL;

