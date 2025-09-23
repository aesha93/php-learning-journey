<?php
include 'db_connect.php';

//Get search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

//Buid base Query
$sql = "SELECT * FROM movies";

//Add WHERE clause if search keyword is provided
if($search !== ''){
    $safeSearch = $conn->real_escape_string($search);
    $sql .= " WHERE title LIKE '%$safeSearch%' OR author LIKE '%$safeSearch%'";
}

//  Run the query
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Movie List -  Search</title>
</head>
<body>
    <h1>Movie Library</h1>


    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Search by Title or Director"
            value="<?= htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
        <a href="index.php">Clear</a> <!-- Link to reset search -->
    </form>
    <br>
    <a href="add.php">Add New Movie</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Director</th>
            <th>Year</th>
            <th>Poster Image</th>
            <th>Actions</th>
        </tr>

        <?php if($result->num_rows > 0): ?>
            <?php while($row =  $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['director']; ?></td>
                    <td><?= $row['release_year']; ?></td>
                    <td>
                        <?php if($row['poster_image']): ?>
                            <img src="uploads/<?= $row['poster_image']; ?>" width="60">
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                        <a href="delete.php?id=<?= $row['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
         <?php else: ?>
            <tr><td colspan="5">No movies found.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
