<?php
require_once __DIR__ . '/controllers/ProductController.php';

$route = $_GET['route'] ?? 'products';

if ($route === 'products') {
    $c = new ProductController();
    $c->index();
} else {
    echo "Route not found.";
}

?>