<?php
include 'db.php'; ?>
<form method="POST">
     Name: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    City: <input type="text" name="city" required>
    <button type="submit">Add</button>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $stmt = $pdo->prepare("INSERT INTO users (name, email, city) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['email'], $_POST['city']]);
    echo "User added!";
}
?>