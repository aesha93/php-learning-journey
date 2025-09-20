<?php
require_once 'functions.php';

$error = '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$contacts = readContacts();
$contact = findContactById($contacts, $id);

if (!$contact) {
    die("Contact not found. <a href='index.php'>Back to list</a>");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $error = validateContact($name, $email);

    if ($error === '') {
        // Update contact in array
        foreach ($contacts as &$c) {
            if ($c['id'] === $id) {
                $c['name'] = $name;
                $c['email'] = $email;
                break;
            }
        }
        unset($c); // break reference

        // Write updated contacts back to CSV
        writeContacts($contacts);

        header('Location: index.php');
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit Contact</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body { font-family: Arial, sans-serif; max-width:700px; margin:30px auto; padding:0 16px; }
    form { padding:16px; border:1px solid #ccc; border-radius:6px; }
    label { display:block; margin-top:8px; }
    input[type="text"], input[type="email"] { width:100%; padding:8px; }
    button { margin-top:12px; padding:8px 14px; }
    .error { color:#b00020; margin-bottom:10px; }
    a { text-decoration:none; color:#007BFF; }
  </style>
</head>
<body>

<h1>Edit Contact #<?= htmlspecialchars($contact['id']) ?></h1>
<p><a href="index.php">← Back to list</a></p>

<?php if ($error): ?>
  <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="post" action="">
  <label for="name">Name</label>
  <input type="text" id="name" name="name"
         value="<?= htmlspecialchars($_POST['name'] ?? $contact['name']) ?>" required>

  <label for="email">Email</label>
  <input type="email" id="email" name="email"
         value="<?= htmlspecialchars($_POST['email'] ?? $contact['email']) ?>" required>

  <button type="submit">Update Contact</button>
</form>

</body>
</html>
