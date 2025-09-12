<?php
// ---------- Observer Interface ----------
interface StockObserver {
    public function update($productName, $stock);
}

// ---------- Concrete Observer ----------
class StockAlert implements StockObserver {
    public function update($productName, $stock) {
        echo "Alert: Product {$productName} stock is low ({$stock} left)!\n";
    }
}

// ---------- Subject ----------
class StockMonitor {
    private $observers = []; // Registered observers

    // Register a new observer
    public function addObserver(StockObserver $observer) {
        $this->observers[] = $observer;
    }

    // Notify all observers
    public function notifyObservers($productName, $stock) {
        foreach ($this->observers as $observer) {
            $observer->update($productName, $stock);
        }
    }
}

// ---------- Example Product Data ----------
$products = [
    ['name' => 'Shoes', 'stock' => 4],
    ['name' => 'Bag',   'stock' => 10],
    ['name' => 'Watch', 'stock' => 2],
];

// ---------- Usage ----------
$monitor = new StockMonitor();
$alert   = new StockAlert();

// Register the observer
$monitor->addObserver($alert);

// Check each product and notify if stock is low
foreach ($products as $product) {
    if ($product['stock'] < 5) {
        $monitor->notifyObservers($product['name'], $product['stock']);
    }
}
?>
