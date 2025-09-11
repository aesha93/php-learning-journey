<?php
require_once __DIR__ . '/controllers/OrderController.php';

$route = $_GET['route'] ?? '';

if (strpos($route, 'order/') === 0) {
    // Split the route on slash
    $parts = explode('/', $route);
    // Expecting exactly two parts: ["order","ID"]
    if (count($parts) === 2 && is_numeric($parts[1])) {
        $id = (int)$parts[1];
        $controller = new OrderController();
        $controller->show($id);
    } else {
        echo "Invalid route format. Use order/{id}.";
    }
} else {
    echo "Route not found. Example: ?route=order/1002";
}
