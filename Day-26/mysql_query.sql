-- The Most Common Query (SELECT)
SELECT title,author,year_published  FROM books
WHERE year_published > 2015
ORDER BY year_published DESC
LIMIT 5;

-- Get all books by a specific author:
SELECT * FROM books WHERE author = 'J.K.Rowling';

-- Count how many books published each year
SELECT year_published,COUNT(*) AS total_books
FROM books
GROUP BY year_published
ORDER BY total_books DESC;

-- Find authors who wrote in more than 1 genre:
SELECT author, COUNT(DISTINCT genre) AS number_of_genres
FROM books
GROUP BY author
HAVING number_of_genres > 1;

-- Show me the title and author of all books published after 2015.

SELECT title, author
FROM books
WHERE year_published > 2015;

-- The LIMIT clause is used to restrict the number of rows returned.
SELECT title, year_published
FROM books
ORDER BY year_published DESC
LIMIT 2;

-- Write a query to get the 3 cheapest books (title, author, price) sorted by price ascending.

SELECT title,author, price FROM books
ORDER BY price ASC
LIMIT 3;

-- Count how many books each author has written:

SELECT author, COUNT(*) AS totals_books
FROM books
GROUP BY author;

-- Show authors who wrote more than 1 book:
SELECT author, COUNT(*) AS total_books
FROM books
GROUP BY author
HAVING total_books > 1;

-- Write a query to find the number of books per genre, and only show genres with more than 1 book.

SELECT genre, COUNT(*) AS total_books
FROM books
GROUP BY genre
HAVING total_books > 1;

-- Find genres with more than 1 book, and show the genre and total books, sorted by total books descending.

SELECT genre, COUNT(*) AS total_books
FROM books
GROUP BY genre
HAVING total_books > 1
ORDER BY total_books DESC;

-- Find authors who wrote more than 1 book after 2000, show author and number of books (total_books).

SELECT author, COUNT(*) AS total_books
FROM books
WHERE year_published > 2000
GROUP BY author
HAVING total_books > 1;

-- Find the average price per genre, and show only genres with average price > 15.

SELECT genre, AVG(price) AS avg_price
FROM books
GROUP BY genre
HAVING avg_price > 15;

-- Show the title and author of books published after 2000, sorted by newest first.

SELECT title,author
FROM books
WHERE year_published > 2000
ORDER BY ID DESC;

-- Find the 2 most expensive books, showing title, author, and price.

SELECT title,author, price
FROM books
ORDER BY price DESC
LIMIT 2;

-- Count the number of books per author. Only show authors with more than 1 book.

SELECT author , count(*) AS total_books
FROM books
GROUP BY author
HAVING total_books > 1;

-- Find the average price per genre, and show only genres with average price > 15, sorted by average price descending.

SELECT genre, AVG(price) AS avg_price
FROM books
GROUP BY genre
HAVING avg_price > 15
ORDER BY avg_price DESC;

-- Show the titles of Thriller books published after 2010, sorted by price ascending, and limit to 2 results.

SELECT title
FROM books 
WHERE year_published > 2010 AND genre = 'Thriller'
ORDER BY price ASC
LIMIT 2;

-- Find authors who wrote more than 1 book after 2000, show author and number of books, sorted by number of books descending, and limit to 2 authors.
SELECT author, COUNT(*) AS total_books
FROM books
WHERE year_published > 2000
GROUP BY author
HAVING total_books > 1
ORDER BY total_books DESC
LIMIT 2;

-- Find genres with average book price > 15, show genre and average price, sort by average price descending, and limit to 3 genres.
SELECT genre, AVG(price) AS avg_price
FROM books
GROUP BY genre
HAVING avg_price > 15
ORDER BY avg_price DESC
LIMIT 3;

=================================
Inner Join
=================================

-- Show the book title, author name, and author country for all books.
SELECT b.title , a.name AS author_name , a.country  
FROM books b
INNER JOIN author a
ON b.author_id = a.id;

-- show title, author_name, year_published for books published after 2000 by authors from USA.
SELECT b.title,a.name AS author_name,b.year_published
FROM books b
INNER JOIN authors a
  ON b.author_id = a.id
WHERE b.year_published > 2000
  AND a.country = 'USA';


-- Show the title, author_name, and year_published of all books written by authors from UK.
SELECT b.title,a.name AS author_name,b.year_published
FROM books b
INNER JOIN authors a
  ON b.author_id = a.id
WHERE a.country = 'UK';

-- how the 2 most expensive books with their title, author_name, and price.

SELECT b.title,
       a.name AS author_name,
       b.price
FROM books b
INNER JOIN authors a
  ON b.author_id = a.id
ORDER BY b.price DESC
LIMIT 2;


-- count books per author (show author_name, total_books) and show only authors with more than 1 book.
SELECT a.name AS author_name,
       COUNT(*) AS total_books
FROM authors a
INNER JOIN books b
  ON a.id = b.author_id
GROUP BY a.id, a.name
HAVING total_books > 1
ORDER BY total_books DESC;

-- compute average book price per author country, show only countries with average price > 15, sorted descending

SELECT a.country,
       ROUND(AVG(b.price), 2) AS avg_price
FROM authors a
INNER JOIN books b
  ON a.id = b.author_id
GROUP BY a.country
HAVING avg_price > 15
ORDER BY avg_price DESC;

=================================
Left Join
=================================

-- Show all books with their author name

SELECT b.title, a.name AS author_name
FROM books b
LEFT JOIN authors a
ON b.author_id = a.id;

-- Show all authors and their books

SELECT a.name AS author_name, b.title
FROM authors a
LEFT JOIN books b
    ON a.id = b.author_id;

-- Show authors from USA and their books.

SELECT a.name AS author_name, b.title, a.country
FROM authors a
LEFT JOIN books b
    ON a.id = b.author_id
WHERE a.country = 'USA';

-- Show all authors and their book titles (include authors with no books).
SELECT a.name AS author_name, b.title
FROM authors a 
LEFT JOIN books b
ON a.id = b.author_id;


-- Find authors who have not written any book.
SELECT a.name AS author_name
FROM authors a
LEFT JOIN books b
ON a.id = b.author_id
WHERE b.id IS NULL;

-- Show each author and how many books they have written (even if 0).

SELECT a.name AS author_name, COUNT(b.id) AS total_books
FROM authors a
LEFT JOIN books b
    ON a.id = b.author_id
GROUP BY a.id, a.name;

-- Show all USA authors and their books (even if they wrote none).

SELECT a.name AS author_name, b.title
FROM authors a
LEFT JOIN books b
    ON a.id = b.author_id
WHERE a.country = 'USA';

-- Show each author and their cheapest book price. If no books, show NULL.

SELECT a.name AS author_name, MIN(b.price) AS cheapest_book_price
FROM authors a
LEFT JOIN books b
ON a.id = b.author_id
GROUP BY a.id, a.name;

-- Show all authors and their books, even if the author has no books.

SELECT b.title , a.name AS author_name 
FROM books b
RIGHT JOIN authors a
ON b.author_id = a.id;

-- Show authors from USA and their books.
SELECT b.title, a.name AS author_name, a.country
FROM books b
RIGHT JOIN authors a
ON b.author_id = a.id
WHERE a.country = 'USA';

-- Show each author and the total number of books they have written (0 if none).
SELECT a.name AS author_name, COUNT(b.id) AS total_books
FROM books b
RIGHT JOIN authors a 
ON b.author_id = a.id
GROUP BY a.id, a.name;


===========================
INNER JOIN
Definition: Returns only rows that match in both tables.
===========================

SELECT b.title, a.name AS author_name
FROM books b
INNER JOIN authors a
ON b.author_id = a.id;

==========================
2️⃣ LEFT JOIN
Definition: Returns all rows from the left table, plus matching rows from the right table.
If there is no match, right table columns will be NULL.
==========================

SELECT a.name AS author_name, b.title
FROM authors a
LEFT JOIN books b
ON a.id = b.author_id;

======================
3️⃣ RIGHT JOIN
Definition: Returns all rows from the right table, plus matching rows from the left table.
If there is no match, left table columns will be NULL.
======================

SELECT b.title, a.name AS author_name
FROM books b
RIGHT JOIN authors a
ON b.author_id = a.id;

======================
4️⃣ FULL OUTER JOIN (Not directly supported in MySQL)
Definition: Returns all rows from both tables, with NULL where there is no match.
======================

SELECT b.title, a.name AS author_name
FROM books b
LEFT JOIN authors a
ON b.author_id = a.id
UNION
SELECT b.title, a.name AS author_name
FROM books b
RIGHT JOIN authors a
ON b.author_id = a.id;
