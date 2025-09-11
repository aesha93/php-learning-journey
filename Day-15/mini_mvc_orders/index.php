<?php
require_once __DIR__ . '/controllers/OrderController.php';

$route    = $_GET['route']    ?? null;
$customer = $_GET['customer'] ?? null;

if ($route === 'orders' && $customer) {
    $controller = new OrderController();
    $controller->listByCustomer($customer);
} else {
    echo "Use ?route=orders&customer=Aesha";
}
