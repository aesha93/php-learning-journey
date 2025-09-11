<?php
require_once __DIR__ . '/controllers/OrderController.php';

$route = $_GET['route'] ?? null;

if ($route === 'order') {
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    $c = new OrderController();
    $c->show($id);
} else {
    echo "Please provide a route like ?route=order&id=1001";
}
