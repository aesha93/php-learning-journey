<?php
session_start();

//    1) Initialize storage

if(!isset($_SESSION['contacts'])){
    $_SESSION['contacts'] = [];
    $_SESSION['next_id'] = 1;
}

$error = '';
$editContact = null;

//    2) Handle POST (add / update)

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST['action'] ?? '';
     $name   = trim((string)($_POST['name'] ?? ''));
    $email  = trim((string)($_POST['email'] ?? ''));

        // Basic validation

        if($name === '' || $email === ''){
            $error = 'Both name and email are required.';
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = 'Please enter a valid email address.';
        }else{
            if($action === 'add'){
                $id = $_SESSION['next_id']++;
                $_SESSION['contacts'][$id] = [
                    'id' => $id,
                    'name' => $name,
                    'email' =>  $email
                ];

                header('Location: ' . htmlspecialchars($_SERVER['PHP_SELF']));
                exit;
            }
        }
}

//    3) Handle GET actions (edit / delete)

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = intval($_GET['id'] ?? 0);
    if ($id && isset($_SESSION['contacts'][$id])) {
        unset($_SESSION['contacts'][$id]);
    }
    header('Location: ' . htmlspecialchars($_SERVER['PHP_SELF']));
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $id = intval($_GET['id'] ?? 0);
    if ($id && isset($_SESSION['contacts'][$id])) {
        $editContact = $_SESSION['contacts'][$id];
    }
}

//    4) Helper: escape output

function e($str) {
    return htmlspecialchars((string)$str, ENT_QUOTES, 'UTF-8');
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Contacts CRUD (Session)</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
  body { font-family: Arial, sans-serif; max-width:900px;margin:30px auto;padding:0 16px; }
  h1 { font-size:20px }
  form { margin-bottom:20px; padding:12px; border:1px solid #ddd; border-radius:6px; }
  label { display:block; margin:6px 0 2px; }
  input[type="text"], input[type="email"] { width:100%; padding:8px; box-sizing:border-box; }
  button { padding:8px 12px; margin-top:8px; }
  table { width:100%; border-collapse:collapse; margin-top:12px; }
  th, td { border:1px solid #eee; padding:8px; text-align:left; }
  .error { color:#b00020; margin-bottom:8px; }
  .actions a { margin-right:8px; text-decoration:none; }
  .small { font-size:0.9em; color:#555; }
</style>
</head>
<body>
<h1>Simple Contacts Manager (CRUD) — using <code>$_SESSION</code></h1>

<?php if ($error): ?>
  <div class="error"><?= e($error) ?></div>
<?php endif; ?>

<!-- Form: used for Add and for Edit (when $editContact is set) -->
<form method="post" action="<?= e($_SERVER['PHP_SELF']) ?>">
  <input type="hidden" name="action" value="<?= $editContact ? 'update' : 'add' ?>">
  <?php if ($editContact): ?>
    <input type="hidden" name="id" value="<?= e($editContact['id']) ?>">
    <div class="small">Editing contact #<?= e($editContact['id']) ?> — <a href="<?= e($_SERVER['PHP_SELF']) ?>">Cancel</a></div>
  <?php endif; ?>

  <label for="name">Name</label>
  <input id="name" name="name" type="text" required value="<?= e($editContact['name'] ?? '') ?>">

  <label for="email">Email</label>
  <input id="email" name="email" type="email" required value="<?= e($editContact['email'] ?? '') ?>">

  <button type="submit"><?= $editContact ? 'Update Contact' : 'Add Contact' ?></button>
</form>

<!-- List / Read -->
<?php if (!empty($_SESSION['contacts'])): ?>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th style="width:160px">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['contacts'] as $c): ?>
        <tr>
          <td><?= e($c['id']) ?></td>
          <td><?= e($c['name']) ?></td>
          <td><?= e($c['email']) ?></td>
          <td class="actions">
            <a href="?action=edit&id=<?= e($c['id']) ?>">Edit</a>
            <a href="?action=delete&id=<?= e($c['id']) ?>" onclick="return confirm('Delete contact <?= e(addslashes($c['name'])) ?>?')">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <p>No contacts yet. Use the form above to add one.</p>
<?php endif; ?>

</body>
</html>
