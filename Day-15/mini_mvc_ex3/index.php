<?php
require_once __DIR__ . '/controllers/ShippingController.php';

$route = $_GET['route'] ?? 'shipping';

if ($route === 'shipping') {
    $c = new ShippingController();
    $c->index();
} else {
    echo "Route not found.";
}
