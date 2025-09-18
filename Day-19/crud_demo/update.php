<?php include 'db.php';
$id = $_GET['id'];
$user = $pdo->prepare("SELECT * FROM users WHERE id=?");
$user->execute([$id]);
$data = $user->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE users SET name=?, email=?, city=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['email'], $_POST['city'], $id]);
    header("Location: index.php");
}
?>
<form method="POST">
    Name: <input type="text" name="name" value="<?= $data['name'] ?>">
    Email: <input type="email" name="email" value="<?= $data['email'] ?>">
    City: <input type="text" name="city" value="<?= $data['city'] ?>">
    <button type="submit">Update</button>
</form>
