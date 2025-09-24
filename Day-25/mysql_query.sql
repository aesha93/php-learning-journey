-- create Table

CREATE TABLE books(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    author VARCHAR(50),
    year_published INT

);

-- Insert Data
INSERT INTO books (title, author, year_published)
VALUES
  ('The Alchemist', 'Paulo Coelho', 1988),
  ('1984', 'George Orwell', 1949),
  ('To Kill a Mockingbird', 'Harper Lee', 1960),
  ('The Great Gatsby', 'F. Scott Fitzgerald', 1925);

-- View All Data
SELECT * FROM books;

-- View Only Titles and Authors
SELECT title, author FROM books;

-- Find Books Published After 1950
SELECT * FROM books
WHERE year_published > 1950;

-- Update a Book’s Year
UPDATE books
SET year_published = 1990
WHERE title = 'The Alchemist';

-- Delete a Book
DELETE FROM books
WHERE title = 'The Great Gatsby';

---add new column in existence table

ALTER TABLE books
ADD COLUMN genre VRACHAR(50);

--- Check your updated table structure

DESCRIBE books;

OR

SHOW COLUMNS FROM books;


--- Check your updated table structure
UPDATE books
SET genre = 'Fiction'
WHERE title = 'The Alchemist';

UPDATE books 
SET genre = 'Dystopian'
WHERE title = '1984';

UPDATE books
SET genre = 'Classic Fiction'
WHERE title = 'To Kill a Mockingbird';

UPDATE books 
SET genre = 'Classic Fiction'
WHERE title = 'The Great Gatsby';

--View all records to confirm your changes.

SELECT * FROM books;

--Find all books published before 1970

SELECT * FROM books WHERE year_published < 1970;

--Sort them by year_published in descending order.

SELECT * FROM books WHERE year_published < 1970 ORDER BY year_published DESC;

--Count how many books are currently in the table.
SELECT COUNT(*) AS total_books FROM books;

--Count how many books belong to the genre 'Fiction'.
SELECT COUNT(*) AS Fiction_books FROM books WHERE genre='Fiction';

-- Retrieve a list of all books published after 1950 with genre 'Fiction' or 'Fantasy'.

SELECT * FROM books WHERE year_published > 1950 AND (genre = 'Fiction' OR genre = 'Fantasy');

OR 

SELECT * FROM books WHERE year_published >1950 AND genre IN ('Fiction', 'Fantasy');

-- Show only title, author, and year_published.
SELECT title,author,year_published FROM books;

-- Sort the results by year_published ascending sql query
SELECT * FROM books
WHERE year_published > 1950
AND genre IN('Fiction','Fantasy')
ORDER BY year_published ASC;

-- Retrieve all books not in the genres 'Fantasy' or 'Dystopian' and published before 1990, sorted alphabetically by title.

SELECT title, author, year_published FROM books
WHERE year_published < 1990
AND genre NOT IN('Fantasy','Dystopian')
ORDER BY title ASC;

-- Find the number of books in each genre. Display two columns: genre and total_books. Sort the results by total_books descending.

SELECT genre, COUNT(*) AS total_books 
FROM books
GROUP BY genre
ORDER BY total_books DESC;


-- Insert 3 new books into the books table with all details (title, author, year_published, genre).


INSERT INTO books (title, author, year_published, genre) 
VALUES
('Jumanji-3', 'Phoony', 2001, 'Dystopian'),
('Jumanji-1', 'Phoony', 2011, 'Dystopian'),
('Jumanji-2', 'Phoony', 2020, 'Dystopian');

-- Retrieve a list of all books published after 1950, showing only title, author, and year_published.

SELECT title, author,year_published FROM books WHERE year_published > 1950;

-- Filter the list to include only books with genre 'Fiction' or 'Fantasy'.

SELECT * FROM books WHERE genre IN('Fiction', 'Fantasy');

-- Sort the results first by genre alphabetically, then by year_published ascending.

SELECT * FROM books
ORDER BY genre ASC , year_published ASC;

-- Sort the results first by genre alphabetically, then by year_published ascending.

SELECT title, author, year_published, genre
FROM books
WHERE year_published > 1950
  AND genre IN ('Fiction', 'Fantasy')
ORDER BY genre ASC, year_published ASC;

-- Count how many books belong to each genre in this filtered list.

SELECT genre, COUNT(*) AS total_books
FROM books
WHERE year_published > 1950
  AND genre IN ('Fiction', 'Fantasy')
GROUP BY genre;

-- Retrieve the authors who have written more than 2 books. Show author and total_books, sorted by total_books descending.

SELECT author, COUNT(*) AS total_books
FROM books
GROUP BY author
HAVING total_books > 2
ORDER BY total_books DESC;

-- Find all books published between 2000 and 2020 with genre 'Dystopian' or 'Fantasy'. Show only title, author, year_published, sorted by year_published descending.

SELECT title,author,year_published
FROM books
WHERE (year_published >= 2000 AND year_published <= 2020 )
ORDER BY year_published DESC;

-- Find all books where the title contains the word 'Jumanji'. Show title and year_published.

SELECT title,year_published FROM books
WHERE title  LIKE '%Jumanji%';

-- Retrieve the latest (most recent) book for each genre. Show genre, title, and year_published.

SELECT genre,title, year_published FROM books
GROUP BY  genre
ORDER BY id DESC;

-- Find how many books were published each year. Show year_published and total_books, sorted by total_books descending.

