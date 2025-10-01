-- Find the book(s) with the highest price.

SELECT title,price FROM Books WHERE price = (SELECT MAX(price) FROM Books);

-- Find authors who have written books.

SELECT name FROM Authors WHERE author_id IN (SELECT author_id FROM Books);

-- Find the most expensive book of each author.
SELECT b1.title , b1.price, b1.author_id FROM Books b1 
WHERE price = (
    SELECT MAX(b2.price)
    FROM Books b2
    WHERE b2.author_id = b1.author_id
);


-- Find authors with avg book price > 500.

SELECT author_id, avg_price
FROM (SELECT author_id, AVG(price) AS avg_price
      FROM Books
      GROUP BY author_id) AS temp
WHERE avg_price > 500;

-- Multi-Row Subquery

SELECT name
FROM Authors
WHERE author_id IN (SELECT author_id FROM Books);

-- Find books priced above the average price

SELECT title,price
FROM Books
WHERE price > (SELECT AVG(price) FROM Books);

-- Find authors who wrote at least one book
SELECT name
FROM Authors
WHERE author_id IN  (SELECT author_id FROM Books);


-- Find books priced above the average price

SELECT title,price
FROM Books 
WHERE price > (SELECT AVG(price) FROM Books);

-- Find the most expensive book by each author

SELECT b1.title, b1.price, b1.author_id
FROM Books b1
WHERE b1.price = (
    SELECT MAX(b2.price)
    FROM Books b2
    WHERE b2.author_id = b1.author_id
);

-- Find authors with average book price > 500
SELECT a.name, t.avg_price
FROM (
    SELECT author_id, AVG(price) AS avg_price
    FROM Books
    GROUP BY author_id
)AS t
JOIN Authors a ON a.author_id = t.author_id
WHERE t.avg_price > 500;

-- Find the cheapest book

SELECT title, price
FROM Books
WHERE price = (SELECT MIN(price) FROM Books);

-- Find authors who have not written any book

SELECT name  
FROM Authors
WHERE author_id NOT IN (SELECT author_id FROM Books);

-- Find the cheapest book

SELECT title , price FROM Books
WHERE price = (SELECT MIN(price) FROM Books);

-- Find the book(s) that have the second cheapest price
SELECT title, price
FROM Books
WHERE price = (
    SELECT MIN(price)
    FROM Books
    WHERE price > (SELECT MIN(price) FROM Books)
);

-- Find the book(s) that have the second most expensive price
SELECT title, price
FROM Books
WHERE price = (
     SELECT MAX(price)
     FROM Books
     WHERE price < (SELECT MAX(price) FROM Books)
);

-- Find books that cost more than the average price

SELECT title, price
FROM Books
WHERE price > (SELECT AVG(price) FROM Books);

-- Find books that cost less than the average price

SELECT title ,  price
FROM Books
WHERE price < (SELECT AVG(price) FROM Books);

-- Find the names of authors who have not written any book
SELECT name
FROM Authors
WHERE author_id NOT IN(SELECT author_id FROM Books);

-- Find the book(s) that cost more than the average price of all books.

SELECT title, price
FROM Books
WHERE price > (SELECT AVG(price) FROM Books);

-- Find the book(s) that are more expensive than every book written by “Maya Singh”.
-- (Hint: Use ALL in the subquery with Authors join.)

SELECT title, price
FROM Books
WHERE price > ALL  (
   SELECT b.price
   FROM Books b
   JOIN Authors a ON b.author_id = a.author_id
   WHERE a.name = 'Maya Singh'
);

-- Find the book(s) that are cheaper than every book written by “John Smith”.
SELECT title, price
FROM Books
WHERE price < ALL(
    SELECT b.price
    FROM Books b
    JOIN Authors a ON b.author_id = a.author_id
    WHERE a.name = 'John Smith'
);

-- Find the author(s) who wrote the book with the highest price.
SELECT title, price
FROM Books
WHERE price > (SELECT MAX(price) FROM Books);