<?php
// OrderFactory: constructs an order array consistently
class OrderFactory {
    public static function create(int $id, array $items, string $destination): array {
        // items: each item is ['sku'=>..., 'qty'=>int, 'price'=>float, 'weight'=>float]
        $total = 0;
        foreach ($items as $it) { $total += ($it['price'] * $it['qty']); }
        return ['id'=>$id, 'items'=>$items, 'destination'=>$destination, 'total'=>$total];
    }
}

// Simple in-memory repository
class OrderRepository {
    private $orders = [];
    public function save(array $order): array {
        $this->orders[$order['id']] = $order;
        return $order;
    }
    public function findById($id): ?array {
        return $this->orders[$id] ?? null;
    }
}

// Singleton Event Dispatcher (Observer pattern)
class EventDispatcher {
    private static $instance;
    private $listeners = [];
    private function __construct() {}
    public static function getInstance() {
        if (!self::$instance) self::$instance = new self();
        return self::$instance;
    }
    public function addListener(string $event, callable $listener) {
        $this->listeners[$event][] = $listener;
    }
    public function dispatch(string $event, array $payload = []) {
        if (empty($this->listeners[$event])) return;
        foreach ($this->listeners[$event] as $l) {
            $l($payload);
        }
    }
}

// ShippingFactory: creates shipping option arrays
class ShippingFactory {
    public static function create(string $code, string $label, float $rate): array {
        return ['code'=>$code, 'label'=>$label, 'rate'=>$rate];
    }
}

// ShippingObserver: listens for order.created, computes shipping options from weight
class ShippingObserver {
    public function onOrderCreated(array $order) {
        $totalWeight = 0.0;
        foreach ($order['items'] as $item) {
            $totalWeight += ($item['weight'] * $item['qty']);
        }
        // very simple rules
        $options = [];
        if ($totalWeight < 1.0) {
            $options[] = ShippingFactory::create('light', 'Light Mail', 30.0);
        } else {
            $options[] = ShippingFactory::create('std', 'Standard Shipping', 60.0);
            $options[] = ShippingFactory::create('exp', 'Express Shipping', 120.0);
        }
        echo "Shipping suggestions for order {$order['id']} (weight={$totalWeight}kg):\n";
        var_export($options);
        echo "\n";
    }
}

// Controller that creates orders
class OrderController {
    private $repo;
    public function __construct(OrderRepository $repo) { $this->repo = $repo; }
    public function create(array $data) {
        $order = OrderFactory::create($data['id'], $data['items'], $data['destination']);
        $this->repo->save($order);
        // dispatch event
        EventDispatcher::getInstance()->dispatch('order.created', $order);
        return $order;
    }
}

// --- wiring & demo ---
$dispatcher = EventDispatcher::getInstance();
$shippingObserver = new ShippingObserver();
$dispatcher->addListener('order.created', [$shippingObserver, 'onOrderCreated']);

$orderRepo = new OrderRepository();
$orderController = new OrderController($orderRepo);

// sample order array (items are arrays)
$orderData = [
    'id' => 101,
    'destination' => 'Mumbai',
    'items' => [
        ['sku'=>'mug-1','qty'=>1,'price'=>199.00,'weight'=>0.4],
        ['sku'=>'book-2','qty'=>2,'price'=>350.00,'weight'=>0.6],
    ]
];

echo "=== Create order ===\n";
$order = $orderController->create($orderData);
echo "Order created, repository has it. Order total = " . $order['total'] . "\n";
?>