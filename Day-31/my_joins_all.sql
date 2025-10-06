-- Show all books along with their author names.
-- Challenge 1 (Easy)

SELECT b.title, a.name AS author_name
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id; 

-- Find all books that cost more than 250, and show their title, price, and author name.
--  Challenge 2 (Medium)

SELECT b.title, b.price , a.name AS author_name
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
WHERE b.price > 250;

-- Show each author and the total number of books they have written.
-- Challenge 3 (Medium)

SELECT COUNT(b.title) AS total_books, a.name AS author_name
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
GROUP BY a.name;

-- Challenge 4 (Harder)
-- Find the author(s) who wrote the most expensive book(s).

SELECT b.title, b.price , a.name AS author_name
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
WHERE b.price = (SELECT MAX(price) FROM Books);


-- Show all authors with the titles of their books, ordered by author name.
-- Challenge 9

SELECT a.name AS author_name, b.title
FROM Books b
INNER JOIN Authors a ON  b.author_id = a.author_id
ORDER BY a.name ASC;

-- Find all books priced between 200 and 400, along with their author names.
-- Challenge 10

SELECT b.title,  b.price,  a.name AS author_name
FROM Books b
INNER JOIN Authors a ON  b.author_id = a.author_id
WHERE b.price BETWEEN 200 AND 400;

-- Show each author’s name with the average price of their books.
-- Challenge 11

SELECT a.name AS author_name ,AVG(b.price) AS avg_price
FROM Books b
INNER JOIN Authors a ON  b.author_id = a.author_id
GROUP BY author_name;

-- Find the book(s) and their author(s) where the book has the longest title.

SELECT a.name AS author_name ,LENGTH(b.title)
FROM Books b
INNER JOIN Authors a ON  b.author_id = a.author_id
LIMIT 1;

-- Challenge 13
-- Show the author name and the most expensive book written by that author.

SELECT a.name AS author_name, b.title, b.price
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
WHERE b.price = (
    SELECT MAX(b2.price) 
    FROM Books b2 
    WHERE b2.author_id = b.author_id
);



-- 🔹 Challenge 14
-- List the authors who have written more than 1 book and show how many books each has written.

SELECT  a.name AS author_name , COUNT(*) AS total_books
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
GROUP BY author_name
HAVING total_books > 1;


-- Challenge 15
-- Show the cheapest book(s) along with their author names.

SELECT a.name AS author_name, b.title, b.price
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
WHERE b.price = (SELECT MIN(price) FROM Books);


-- Challenge 16
-- Find the total value of books (sum of prices) written by each author.

SELECT a.name AS author_name, SUM(b.price) AS total_value
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
GROUP BY a.name;

-- Challenge 17
-- Show each author’s highest-priced book (title and price).

SELECT a.name AS author_name, b.title, b.price
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
WHERE b.price = (
SELECT MAX(price) FROM Books WHERE author_id = a.author_id
);

-- Challenge 18
-- Find the average price of books across all authors, then show authors whose average book price is above this overall average.

SELECT a.name AS author_name, AVG(b.price) AS avg_price
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
GROUP BY a.author_id
HAVING AVG(b.price) > (
    SELECT AVG(price) FROM Books
);

-- 🔹 Challenge 19
-- Show the authors who wrote books in the same year as another author.

SELECT DISTINCT a.name AS author_name, b.year_published
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
WHERE b.year_published IN(
    SELECT year_published
    FROM Books
    GROUP BY year_published
    HAVING COUNT(DISTINCT author_id) > 1
)
ORDER BY b.year_published;

-- Challenge 20
-- Find the author who has the maximum total value of books.

SELECT a.name AS author_name, SUM(b.price) AS total_value
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
GROUP BY a.author_id
ORDER BY total_value DESC
LIMIT 1;


-- 🔹 Challenge 21
-- List the authors and the count of distinct years in which they have published books.

SELECT a.name AS author_name, COUNT(DISTINCT b.year_published) AS distinct_years
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
GROUP BY a.author_id;


-- 🔹 Challenge 22
-- Show the author(s) who wrote the cheapest book(s).

SELECT a.name AS author_name, b.title, b.price
FROM Books b
INNER JOIN Authors a  ON a.author_id = b.author_id
WHERE b.price  = (SELECT MIN(price) FROM Books);


-- Challenge 23
-- Show all books published before 1950 along with their author names.

SELECT b.title, a.name AS author_name, b.year_published AS year_published
FROM Books b
INNER JOIN Authors a  ON a.author_id = b.author_id
WHERE b.year_published < 1950;

-- Challenge 24
-- Show each author and the number of books priced above 300.

SELECT a.name AS author_name, COUNT(*) AS books_above_300
FROM Books b
INNER JOIN Authors a ON a.author_id = b.author_id
WHERE b.price > 300
GROUP BY author_name;

-- 🔹 Challenge 25
-- Find the author(s) who have written books in the earliest year.
SELECT b.title, a.name AS author_name, b.year_published
FROM Books b
INNER JOIN Authors a ON a.author_id = b.author_id
WHERE b.year_published = (SELECT MIN(year_published) FROM Books);



-- Challenge 26
-- Show the total number of books published per year (across all authors).

SELECT b.year_published, COUNT(*) AS total_books
FROM Books b
INNER JOIN Authors a ON a.author_id = b.author_id
GROUP BY year_published
ORDER BY year_published ASC;

-- Challenge 27
-- Find the book(s) with the longest title length and their authors.

SELECT b.title , LENGTH(b.title) AS title_length
FROM Books b
INNER JOIN Authors a ON a.author_id = b.author_id
WHERE LENGTH(b.title) = (
    SELECT MAX(LENGTH(title)) FROM Books
);

-- Challenge 28
-- Show each author and the minimum price of their books.

SELECT a.name AS author_name, MIN(b.price) AS min_price
FROM Books b
INNER JOIN Authors a ON a.author_id = b.author_id
GROUP BY a.author_id, a.name;

-- Challenge A (like 22)
-- Find the most expensive book(s) and their authors.


SELECT a.name AS author_name, b.title, b.price
FROM Books b
INNER JOIN Authors a  ON a.author_id = b.author_id
WHERE b.price  = (SELECT MAX(price) FROM Books);


-- Challenge B (like 25)
-- Find the latest (most recent) book(s) published and their authors.
 
SELECT a.name AS author_name, b.title, b.year_published
FROM Books b 
INNER JOIN Authors a ON a.author_id = b.author_id
ORDER BY year_published DESC;

-- Challenge C (like 28)
-- Show each author and the highest price of their books.

SELECT a.name AS author_name,  MAX(b.price) AS max_price
FROM Books b 
INNER JOIN Authors a ON a.author_id = b.author_id
GROUP BY a.author_id, a.name;

-- Challenge D
-- Find the author(s) who wrote the globally cheapest book(s) AND the author(s) who wrote the globally most expensive book(s).

SELECT a.name AS author_name,b.title, b.price
FROM Books b 
INNER JOIN Authors a ON a.author_id = b.author_id
WHERE b.price = (SELECT MIN(price) FROM Books)
   OR b.price = (SELECT MAX(price) FROM Books);

-- ✅ Exercise 1 (Easy)
-- Show all books with their author name and publisher name.

SELECT b.title , a.name AS author_name, p.name AS publisher_name 
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN publishers p ON b.publisher_id  = p.publisher_id;

-- Exercise 2 (Medium)
-- Find the total number of books published by each publisher.

SELECT p.name AS publisher_name , COUNT(b.book_id) AS total_books
FROM publishers p
INNER JOIN Books b ON p.publisher_id = b.publisher_id
GROUP BY p.name;

-- Exercise 3 (Harder)
-- Show the author(s) and publisher(s) who have the most expensive book(s).

SELECT a.name AS author_name, b.title, b.price, p.name AS publisher_name
FROM Book b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
WHERE b.price = (SELECT MAX(price) FROM Books);

-- Exercise 1 – List all books with author and publisher info

SELECT b.title, a.name AS author_name, p.name AS publisher_name
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id;


-- ✅ Exercise 2 – Count how many books each publisher has, grouped by author

SELECT p.name AS publisher_name, a.name AS author_name, COUNT(b.book_id) AS total_books
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
GROUP BY p.name, a.name
ORDER BY p.name;


-- Exercise 3 – Show the most recent book(s) with author and publisher

SELECT b.title, b.year_published, a.name AS author_name, p.name AS publisher_name
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
WHERE b.year_published = (SELECT MAX(year_published) FROM Books);

-- Exercise 4 – Find average price of books per publisher

SELECT p.name AS publisher_name, AVG(b.price) AS avg_price
FROM Books b
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
GROUP BY p.name;

-- Exercise 5 – Find the author(s) who worked with multiple publishers

SELECT a.name AS author_name, COUNT(DISTINCT p.publisher_id) AS publishers_count
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
GROUP BY a.name 
HAVING COUNT(DISTINCT p.publisher_id) > 1;

-- Example 1 – List all books with author and publisher

SELECT b.title, a.name AS author_name, p.name AS publisher_name
FROM Books b 
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id;

-- Example 2 – Show all authors, their publishers, and published year

SELECT a.name AS author_name, p.name AS publisher_name, b.year_published
FROM Authors a
INNER JOIN Books b ON a.author_id = b.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id;


-- Example 3 – Find the cheapest book with its author & publisher

SELECT b.title, b.price, a.name AS author_name, p.name AS publisher_name
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
WHERE b.price = (SELECT MIN(price) FROM Books);


-- Example 4 – Show publishers and how many books each has, grouped by author

SELECT p.name AS publisher_name, a.name AS author_name, COUNT(b.book_id) AS total_books
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
GROUP BY p.name, a.name;


-- Example 5 – Find authors who worked with more than one publisher

SELECT a.name AS author_name, COUNT(DISTINCT p.publisher_id) AS publisher_count
FROM Authors a
INNER JOIN Books b ON a.author_id = b.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
GROUP BY a.name
HAVING COUNT(DISTINCT p.publisher_id) > 1;
