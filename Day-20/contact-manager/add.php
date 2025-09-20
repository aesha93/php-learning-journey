<?php
require_once 'functions.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');

    // Validate input using helper
    $error = validateContact($name, $email);

    if ($error === '') {
        // Read existing contacts
        $contacts = readContacts();

        // Assign new ID and append contact
        $id = getNextId($contacts);
        $contacts[] = [
            'id'    => $id,
            'name'  => $name,
            'email' => $email
        ];

        // Save back to CSV
        writeContacts($contacts);

        // Redirect to index
        header('Location: index.php');
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Add Contact</title>
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

<h1>Add New Contact</h1>
<p><a href="index.php">← Back to list</a></p>

<?php if ($error): ?>
  <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="post" action="">
  <label for="name">Name</label>
  <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>

  <label for="email">Email</label>
  <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

  <button type="submit">Save Contact</button>
</form>

</body>
</html>
