<?php
require_once 'functions.php';

// 1. Validate ID
if (!isset($_GET['id'])) {
    die('No contact ID specified.');
}

$id = (int) $_GET['id'];

// 2. Read all contacts
$contacts = readContacts();

// 3. Filter out the contact to delete
$newContacts = array_filter($contacts, function($contact) use ($id) {
    return $contact['id'] != $id;
});

// 4. Save updated contacts back to CSV
writeContacts($newContacts);

// 5. Redirect back to index.php
header('Location: index.php');
exit;
?>
