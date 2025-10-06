-- Show each book with its author and publisher

SELECT b.title,a.name AS author_name,p.name AS publisher_name,b.price FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id;

-- Challenge 1 (Easy)
-- Show each book’s title, author name, and publisher name.
SELECT b.title,a.name AS author_name,p.name AS publisher_name
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id;


-- Challenge 2 (Medium)
-- Show all authors and the publishers they have worked with.
-- (Each author may appear multiple times if they have multiple publishers.)
SELECT 
    a.name AS author_name,
    p.name AS publisher_name
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
ORDER BY a.name;


-- 🔹 Challenge 3 (Medium)
-- Show each publisher and the total number of books they have published
-- 📊 Use GROUP BY on publisher name.

SELECT p.name AS publisher_name, COUNT(b.title) AS total_number_of_books
FROM Books b 
INNER JOIN Publishers p ON  b.publisher_id = p.publisher_id
GROUP BY publisher_name;

-- 🔹 Challenge 4 (Medium+)
-- Show each author and the average price of books they’ve published through each publisher.
-- 📊 Use GROUP BY author and publisher both.

SELECT 
    a.name AS author_name, 
    p.name AS publisher_name, 
    AVG(b.price) AS avg_price
FROM Books b
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
INNER JOIN Authors a ON a.author_id = b.author_id
GROUP BY a.name, p.name
ORDER BY a.name, p.name;



-- 🔹 Challenge 5 (Hard)
-- Find the most expensive book per publisher along with the author and publisher name.
-- 💡 Hint: Subquery + JOIN on price and publisher_id.

SELECT MAX(b.price) AS price, a.name AS author_name ,p.name AS publisher_name
FROM Books b 
INNER JOIN Publishers p ON b.publisher_id = p.publisher_id
INNER JOIN Authors a ON a.author_id = b.author_id;

-- 🔹 Challenge 6 (Hard)
-- List all authors who have published books with more than one publisher.
-- Show author name and number of distinct publishers.
-- 💡 Use COUNT(DISTINCT publisher_id) and HAVING > 1.

-- INNER JOIN

SELECT  a.name, b.title FROM  Authors a
INNER JOIN Books b ON a.author_id = b.author_id;

-- LEFT JOIN

SELECT a.name AS author_name , b.title AS book_title
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id;


-- RIGHT JOIN

SELECT a.name AS author_name , b.title AS book_title
FROM Authors a
RIGHT JOIN Books b ON a.author_id = b.author_id;

-- Show all authors and their books (include authors with no books).
SELECT a.name AS author_name, b.title AS book_title
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id;

-- Show all authors and publishers they have worked with.
SELECT a.name AS author_name, p.name AS publisher_name
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id
LEFT JOIN Publishers p ON b.publisher_id = p.publisher_id;

-- Show all authors and total number of books (include those with 0).

SELECT a.name AS author_name, COUNT(b.book_id) AS total_books
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id
GROUP BY a.name;

-- Show all books, even if they have no publisher assigned (LEFT JOIN with Publishers).
SELECT b.title, p.name AS publisher_name
FROM Books b
LEFT JOIN Publishers p ON b.publisher_id = p.publisher_id;


-- Show all books and their authors (even if book has no author).
SELECT b.title, a.name AS author_name
FROM Authors a
RIGHT JOIN Books b ON a.author_id = b.author_id;

-- Show all books and their publishers (include books without publishers).

SELECT b.title, p.name AS publisher_name
FROM Publishers p
RIGHT JOIN Books b ON p.publisher_id = b.publisher_id;

-- Show all publishers with total books they’ve published (RIGHT JOIN).

SELECT p.name AS publisher_name, COUNT(b.book_id) AS total_books
FROM Publishers p
RIGHT JOIN Books b ON p.publisher_id = b.publisher_id
GROUP BY publisher_name;


-- Show all authors and the titles of books they have written.
-- If an author has no books, still show the author (book title should be NULL).

SELECT a.name AS author_name, b.title AS book_title
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id;

-- Show all publishers and the books they’ve published.
-- Even if a publisher has published no books, show them.

SELECT p.name AS publisher_name, b.title AS book_title
FROM Publishers p
LEFT JOIN Books b ON p.publisher_id = b.publisher_id;

-- Show all books and their publishers.
-- Even if a book doesn’t have a valid publisher, show the book (publisher name should be NULL).

SELECT b.title AS book_title, p.name AS publisher_name
FROM Books b
LEFT JOIN Publishers p ON b.publisher_id = p.publisher_id;

-- List all authors along with the publishers they’ve worked with.
-- Show even authors who haven’t published anything yet.

SELECT a.name AS author_name, p.name AS publisher_name
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id
LEFT JOIN Publishers p ON b.publisher_id = p.publisher_id;

-- Show all publishers (even if they haven’t published any books yet)
-- and their authors’ names (if available).

SELECT p.name AS publisher_name, a.name AS author_name, b.title AS book_title
FROM Books b
RIGHT JOIN Publishers p ON b.publisher_id = p.publisher_id
LEFT JOIN Authors a ON b.author_id = a.author_id;

-- Challenge 1 (Easy)

-- Show all authors and the titles of the books they have written.
-- 👉 Even if an author hasn’t written any book, they should appear in the result.
-- Expected Columns: author_name, book_title

SELECT a.name AS author_name, b.title AS book_title 
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id;

-- Challenge 2 (Easy+)

-- List all publishers and the number of books they have published.
-- 👉 Publishers with zero books should also appear with 0 as total_books.
-- Expected Columns: publisher_name, total_books

-- Challenge 3 (Medium)

-- Display all books and their authors, but also include books that don’t have a valid author record.
-- Expected Columns: book_title, author_name

-- Challenge 4 (Medium+)

-- Show all authors along with the publishers they’ve worked with.
-- If an author hasn’t published any book yet, still show them with NULL publisher.
-- Expected Columns: author_name, publisher_name

-- Challenge 5 (Medium+)

-- Show all publishers and the authors who have published with them.
-- Even if a publisher has no books yet, show it.
-- Expected Columns: publisher_name, author_name

-- Challenge 6 (Hard)

-- Find all authors who have never published a book.
-- (Hint: You’ll use LEFT JOIN and WHERE book_id IS NULL.)
-- Expected Columns: author_name

-- Challenge 7 (Hard+)

-- Find all publishers who have never published any books.
-- (Hint: Use RIGHT JOIN or LEFT JOIN depending on the join direction.)
-- Expected Columns: publisher_name

-- Challenge 8 (Pro Level)

-- Show all possible combinations of authors and publishers — even if no books exist between them.
-- (Hint: Use a CROSS JOIN and optional LEFT JOIN to match books if you want bonus insight.)
-- Expected Columns: author_name, publisher_name