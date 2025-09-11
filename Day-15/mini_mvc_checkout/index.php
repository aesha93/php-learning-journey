<?php
require_once __DIR__ . '/controllers/CheckoutController.php';

$route    = $_GET['route']    ?? null;
$sku      = $_GET['sku']      ?? null;
$shipping = $_GET['shipping'] ?? null;

if ($route === 'checkout') {
    $controller = new CheckoutController();
    $controller->summary($sku, $shipping);
} else {
    echo "Use ?route=checkout&sku=P001&shipping=flat";
}
