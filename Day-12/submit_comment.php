<?php
// submit_comment.php
session_start();

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("CSRF attack blocked!");
}

echo "Comment posted safely: " . htmlspecialchars($_POST['comment']);
?>
