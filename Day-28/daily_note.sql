-- Customers table with Primary Key
CREATE TABLE Customers(
   customer_id INT PRIMARY KEY,
   name VARCHAR(100) NOT NULL,
   email VARCHAR(100) UNIQUE
);

-- Orders table with Foreign Key
CREATE TABLE Orders(
    order_id INT PRIMARY KEY,
    order_date DATE,
    customer_id INT,
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
);

-- Authors with the primary key
CREATE TABLE Authors(
    authors_id  INT(11) PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE
);

-- Books with the Foreign key
CREATE TABLE Book(
     book_id INT(11) PRIMARY KEY,
     name VARCHAR(100) NOT NULL,
     genre VARCHAR(100),
     authors_id INT,
     FOREIGN KEY (authors_id) REFERENCES Authors(authors_id)
);


-- customers table 
CREATE TABLE Customers(
    customer_id INT(11) PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);

--- orders table
CREATE TABLE Orders(
    order_id INT(11) PRIMARY KEY,
    order_date VARCHAR(100),
    amount VARCHAR(100),
    customer_id VARCHAR(100)
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
);

-- insert sample data
INSERT INTO Customers (customer_id, name, email) VALUES
(1, 'ALice', 'alice@example.com'), 
(2, 'Bob', 'bob@example.com'), 
(3, 'Charlie', 'charlie@example.com'), 
(4, 'Diana', 'diana@example.com'),
(5, 'Eve', 'eve@example.com');

INSERT INTO Orders (order_id, order_date, amount, customer_id) VALUES
(101, '2025-09-01', 250.00, 1),
(102, '2025-09-02', 400.00, 1),
(103, '2025-09-03', 150.00, 2),
(104, '2025-09-04', 700.00, 3),
(105, '2025-09-05', 200.00, 3),
(106, '2025-09-06', 500.00, 3),
(107, '2025-09-07', 350.00, 4),
(108, '2025-09-08', 600.00, NULL); -- order without a customer


---student table
CREATE TABLE Students (
    student_id INT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100)
);

CREATE TABLE Enrollments (
 enroll_id INT PRIMARY KEY,
 course_name VARCHAR(100),
 student_id INT,
 FOREIGN KEY (student_id) REFERENCES Students(student_id)
 ON DELETE SET NULL
);


INSERT INTO Students (student_id, name, email) VALUES 
(1, 'Aesha', 'aesha@gmail.com'),
(2, 'Niraj', 'niraj@gmail.com'),
(3, 'Tiya', 'tiya@gmail.com'),
(4, 'Dhyan', 'dhyan@gmail.com');


INSERT INTO Enrollments(enroll_id, course_name, student_id) VALUES
(101,'IT', 1)
(102,'CE', 2)
(103,'EC', 3);

-- INNER JOIN
SELECT 
    b.book_id,
    b.title,
    a.name AS author_name
FROM Books b
INNER JOIN Authors a ON b.author_id = a.author_id;


-- LEFT JOIN

SELECT 
    a.author_id,
    a.name AS author_name,
    b.title AS book_title
FROM Authors a
LEFT JOIN Books b ON a.author_id = b.author_id;

-- RIGHT JOIN

SELECT 
    b.book_id,
    b.title,
    a.name AS author_name
FROM Books b
RIGHT JOIN Authors a ON b.author_id = a.author_id;

-- Inner Join

SELECT 
    b.book_id,
    b.title,
    IFNULL(a.name, 'Unknown') AS author_name
FROM Authors a
RIGHT JOIN Books b 
    ON a.author_id = b.author_id;
