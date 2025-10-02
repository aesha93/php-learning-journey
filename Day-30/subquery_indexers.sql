-- Scalar Subquery (returns single value)
--- Return the Scalar value

SELECT title, price
FROM Books
WHERE price > (SELECT AVG(price) FROM Books);

-- Row Subquery (returns one row with multiple columns)
-- Find the author of the cheapest book
SELECT name
FROM Authors
WHERE author_id = (
    SELECT author_id  FROM Books ORDER BY price ASC LIMIT 1
);


-- Column Subquery (returns multiple values, one column
-- Find authors who wrote at least one book
SELECT name
FROM Authors
WHERE author_id IN (SELECT author_id FROM Books);


-- Table Subquery (returns multiple rows & columns)
-- Used in FROM clause like a temporary table.

SELECT * FROM (SELECT title, price FROM Books ORDER BY price DESC LIMIT 2) AS TopBooks;


-- Correlated Subquery (runs for each row of outer query)
SELECT title,year_published, price
FROM Books b1
WHERE price = (
    SELECT MAX(price)
    FROM Books b2
    WHERE b1.year_published = b2.year_published
);

-- EXISTS / NOT EXISTS Subquery

-- Find authors who have written at least one book
SELECT name 
FROM Authors a
WHERE EXISTS (SELECT 1 FROM Books b WHERE b.author_id = a.author_id);

-- Authors who never wrote a book
SELECT name 
FROM Authors a
WHERE NOT EXISTS  (SELECT 1 FROM Books b WHERE b.author_id = a.author_id);

-- Find the book(s) with the second highest price
-- Method 1: Use MAX() Twice
SELECT title, price
FROM Books
WHERE price = (
    SELECT MAX(price) 
    FROM Books
    WHERE price < (SELECT MAX(price) FROM Books)
);


-- Method 2: Use LIMIT + ORDER BY
SELECT title, price
FROM Books
ORDER BY price DESC
LIMIT 1 OFFSET 1;

-- Find the book(s) with the lowest price.
SELECT title, price
FROM Books
WHERE price = (SELECT MIN(price) FROM Books);

-- Find the books that cost more than the average price.

SELECT title,price
FROM Books
WHERE price > (SELECT AVG(price) FROM Books);

-- Challenge 1
-- Find the second most expensive book.
SELECT title, price
FROM Books
WHERE price < (SELECT MAX(price) FROM Books);

-- Challenge 2
-- Find the authors who wrote the most expensive book(s).
SELECT title, price 
FROM Books
WHERE price > ANY (
    SELECT MAX(price) FROM Books b
    JOIN Authors a ON b.author_id = a.author_id
);

SELECT title, price
FROM Books
WHERE price > ANY (
    SELECT price FROM Books b
    JOIN Authors a ON b.author_id = a.author_id
    WHERE a.name = 'Maya Singh'
);

-- Find the author(s) who wrote more than one book priced above the average price.


