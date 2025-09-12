<?php

$products = [
    ['id' => 1, 'name' => 'Shoes', 'price' => 120],
    ['id' => 2, 'name' => 'Bag',   'price' => 80],
    ['id' => 3, 'name' => 'Watch', 'price' => 200],
];

$orders = [
    ['id' => 101, 'total' => 400, 'status' => 'Pending']
];

class ProductController {
    public function list($products) {
        foreach ($products as $p) {
            echo "Product: {$p['name']} - \${$p['price']}\n";
        }
    }
}

class OrderController {
    public function view($orders) {
        $o = $orders[0];
        echo "Order Total: \${$o['total']} | Status: {$o['status']}\n";
    }
}

// ----- Router -----
class Router{
    public function dispatch($path, $products, $orders){
        switch ($path) {
            case '/product/list':
                (new ProductController())->list($products);
                break;
            case '/order/view':
                (new OrderController())->view($orders);
                break;
            default:
                echo "404 Not Found\n";
            }

    }
}

// ----- Simulate Request -----
$path = "/product/list"; // try changing to "/order/view" or "/bad/url"
$router = new Router();
$router->dispatch($path, $products, $orders);

?>