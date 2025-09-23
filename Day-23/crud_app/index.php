<?php
include 'db_connect.php';

// 1️⃣ Get search keyword from URL (if any)
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// 2️⃣ Build base query
$sql = "SELECT * FROM books";

// 3️⃣ Add WHERE clause if search keyword is provided
if ($search !== '') {
    // Escape the search string to prevent SQL injection
    $safeSearch = $conn->real_escape_string($search);
    $sql .= " WHERE title LIKE '%$safeSearch%' OR author LIKE '%$safeSearch%'";
}

// 4️⃣ Run the query
$result = $conn->query($sql);
?>
<!DOCTYPE html>z
<html>
<head>
    <title>Book Library - Search</title>
</head>
<body>
<h2>Book Library</h2>

<!-- 🔎 Search Form -->
<form method="GET" action="index.php">
    <input type="text" name="search" placeholder="Search by Title or Author"
           value="<?= htmlspecialchars($search); ?>">
    <button type="submit">Search</button>
    <a href="index.php">Clear</a> <!-- Link to reset search -->
</form>
<br>

<a href="add.php">Add New Book</a>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Year</th>
        <th>Actions</th>
    </tr>

    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['title']; ?></td>
                <td><?= $row['author']; ?></td>
                <td><?= $row['published_year']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?= $row['id']; ?>" 
                       onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="5">No books found.</td></tr>
    <?php endif; ?>
</table>
</body>
</html>
