
<?php
include 'db_connect.php';

// Handle search input
$search = '';
$where = '';
if (!empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']); // Prevent SQL injection
    $where = "WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
}

// Fetch data with optional filtering
$sql = "SELECT * FROM books $where ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Library</title>
    <style>
        table { border-collapse: collapse; width: 70%; margin-top: 20px; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: left; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #d9edf7; }
        form { margin-bottom: 20px; }
        input[type="text"] { padding: 6px; width: 200px; }
        button { padding: 6px 10px; }
    </style>
</head>
<body>
    <h1>📚 Book Library</h1>
    <a href="add.php">➕ Add Book</a>

    <!-- 🔎 Search Form -->
    <form method="GET" action="">
        <input 
            type="text" 
            name="search" 
            placeholder="Search by title or author" 
            value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Search</button>
        <a href="index.php" style="margin-left:10px;">Clear</a>
    </form>

    <!-- 📊 Book Table -->
     
    <table>
        <tr>
            <th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Genre</th><th>Actions</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['author']) ?></td>
                <td><?= $row['year'] ?></td>
                <td><?= htmlspecialchars($row['genre']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">✏ Edit</a> |
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this book?')">❌ Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">No books found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
