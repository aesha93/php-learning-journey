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

