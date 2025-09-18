<?php include 'db.php'; ?>
<h2>Add New User</h2>
<form method="POST">
  Name: <input type="text" name="name" required><br>
  Email: <input type="email" name="email" required><br>
  City: <input type="text" name="city" required><br>
  <button type="submit">Add</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO users (name, email, city) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['email'], $_POST['city']]);
    echo "✅ User added successfully!";
}
?>
<a href="index.php">⬅ Back to List</a>
