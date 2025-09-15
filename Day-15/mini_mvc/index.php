<?php
require_once __DIR__ . '/controllers/ProductController.php';

// Decide which controller/action to run
$route = $_GET['route'] ?? 'products';

switch($route) {
    case 'products':
        $controller = new ProductController();
        $controller->list();
        break;
    default:
        echo "404 - Page Not Found";
}
