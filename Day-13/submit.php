<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF validation failed!");
    }

    // If token matches, process safely
    $name = htmlspecialchars($_POST['name']);
    echo "Form submitted safely by: " . $name;
}

