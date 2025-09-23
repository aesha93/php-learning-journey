 
 CRUD Application  
 ========================
  
  
          +----------------+
          |   index.php    |  <-- Read all records
          |  (List Table)  |
          +--------+-------+
                   |
        +----------+----------+
        |                     |
        v                     v
  +-----------+         +------------+
  |  add.php  |         | edit.php   | <-- Update a record
  |  (Create) |         | (Update)   |
  +-----------+         +------------+
        |                     |
        v                     v
  +----------------+   +----------------+
  | Insert record  |   | Update record  |
  | into MySQL     |   | in MySQL       |
  +----------------+   +----------------+
        |                     |
        +----------+----------+
                   |
                   v
            +--------------+
            | Redirect to  |
            | index.php    |
            +--------------+
                   |
                   v
            +--------------+
            | Delete record|
            | (via index) |
            +--------------+
                   |
                   v
            +--------------+
            | Redirect to  |
            | index.php    |
            +--------------+


Practical CRUD Application (MYSQL)
=================================
Step: 1 db_connect.php

```
<?php
$host = 'db';
$user = 'magento';
$pass = 'magento';
$db = 'magento';

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
    die('connection failed:');
}
?>

```


Step: 2 index.php

```
<?php
include 'db_connect.php';

if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM employees WHERE id = $id");
}

//Fetch all employees

$result = $conn->query("SELECT * FROM employees");
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD App</title>
</head>
<body>
    <h2>Employees</h2>
    <a href="add.php">Add New</a>
    <table border="1" cellpadding = "8">
         <tr>
            <th>ID</th><th>Name</th><th>Department</th><th>Salary</th><th>Action</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['department']) ?></td>
                <td><?= $row['salary'] ?></td>
                 <td>
                        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                        <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this?')">Delete</a>
                 </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

```

Step: 3 add.php

```
<?php
include 'db_connect.php';

if($_SERVER['REQUEST_METHOD']  == 'POST'){
    $name = $conn->real_escape_string($_POST['name']);
    $department = $conn->real_escape_string($_POST['department']);
    $salary = floatval($_POST['salary']);

    $conn->query("INSERT INTO employees (name, department, salary) VALUES ('$name','$department',$salary)");
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
    <h2>Add Employee</h2>
    <form method="post">
        Name:<input type="text" name="name" required><br><br>
        Department: <input type="text" name="department"><br><br>
        Salary: <input type="number" step="0.01" name="salary"><br><br>
        <button type="submit">Save</button>
    </form>
    <a href="index.php">Back</a>
</body>
</html>
```
Step: 4 edit.php

```
<?php
include 'db_connect.php';

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM employees WHERE id=$id");
$employee = $result->fetch_assoc();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $conn->real_escape_string($_POST['name']);
    $department = $conn->real_escape_string($_POST['department']);
    $salary = floatval($_POST['salary']);

    $conn->query("UPDATE employees SET name='$name', department='$department', salary=$salary WHERE id=$id");
    header('Location: index.php');

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h2>Edit Employee</h2>
    <form method="post">
        Name:  <input type="text" name="name" value="<?= htmlspecialchars($employee['name']) ?>" required><br><br>
        Department: <input type="text" name="department" value="<?= htmlspecialchars($employee['department']) ?>"><br><br>
        Salary: <input type="number" step="0.01" name="salary" value="<?= $employee['salary'] ?>"><br><br>
        <button type="submit">Update</button>
    </form>
<a href="index.php">Back</a>
</body>
</html>

```


Practical CRUD Application (CSV)
=================================

step : 1 create the books.csv

```
id,title,author,genre,price
1,"5 AM Club",Rebort,"5 Edition",50
```


step : 2 create the csv_functions.php
```
<?php
$csv_file = 'books.csv';

//Read all students

function readCSV(){
    global $csv_file;
    $rows =[];

    if(($handle = fopen($csv_file, 'r')) !== false){
        $header = fgetcsv($handle);
        while(($data = fgetcsv($handle)) !== false){
            $rows[] = array_combine($header, $data);
        }
        fclose($handle);
    }
    return $rows;
}

function writeCSV($rows){
    global $csv_file;
    if(($handle = fopen($csv_file, 'w')) !== false){
        fputcsv($handle, array_keys($rows[0])); 
        foreach ($rows as $row) {
            fputcsv($handle, $row);
        }
        fclose($handle);
    }
}

?>
```


step : 3 create the index.php

```
<?php
include 'csv_functions.php';

// Delete student
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
    $books = readCSV();
    $books = array_filter($students, fn($s) => $s['id'] != $id);
    if (!empty($books)) {
        writeCSV(array_values($books));
    } else {
        file_put_contents('books.csv', "id,title,author,genre,price\n");
    }
}

// Read all students
$books = readCSV();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Books CSV</title>
</head>
<body>
    <h2>Books</h2>
    <a href="add.php">Add New Book</a>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th><th>Title</th><th>Author</th><th>Genre</th><th>Price</th><th>Action</th>
        </tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?= $book['id'] ?></td>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['author']) ?></td>
            <td><?= htmlspecialchars($book['genre']) ?></td>
            <td><?= $book['price'] ?></td>
            <td>
                <a href="edit.php?id=<?= $book['id'] ?>">Edit</a> |
                <a href="?delete=<?= $book['id'] ?>" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

```

step : 4 create the add.php

```
<?php
include 'csv_functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $students = readCSV();
    $id = empty($students) ? 1 : max(array_column($students, 'id')) + 1;
    
    $students[] = [
        'id' => $id,
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'genre' => $_POST['genre'],
        'price' => $_POST['price']
    ];
    
    writeCSV($students);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Books</title>
</head>
<body>
<h2>Add Books</h2>
<form method="post">
    Title: <input type="text" name="title" required><br><br>
    Author: <input type="text" name="author" required><br><br>
    Genre: <input type="text" name="genre" required><br><br>
    Price: <input type="number" step="0.01" name="price"><br><br>
    <button type="submit">Add</button>
</form>
<a href="index.php">Back</a>
</body>
</html>

```

step : 5 create the edit.php

```
<?php
include 'csv_functions.php';

$id = intval($_GET['id']);
$books = readCSV();
$book = null;

foreach ($books as $b) {
    if ($b['id'] == $id) { $book = $b; break; }
}

if (!$book) { die("Book not found"); }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($books as &$book) {
        if ($book['id'] == $id) {
            $book['title'] = $_POST['title'];
            $book['author'] = $_POST['author'];
            $book['genre'] = $_POST['genre'];
            $book['price'] = $_POST['price'];
            break;
        }
    }
    writeCSV($books);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
<h2>Edit Book</h2>
<form method="post">
    Title: <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required><br><br>
    Author: <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>" required><br><br>
    Genre: <input type="text" name="genre" value="<?= htmlspecialchars($book['genre']) ?>" required><br><br>
    Price: <input type="number" step="0.01" name="price" value="<?= $book['price'] ?>"><br><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Back</a>
</body>
</html>

```

