<?php
// Reuse small parts: ShippingFactory and EventDispatcher from previous exercise
class ShippingFactory {
    public static function create(string $code, string $label, float $rate): array {
        return ['code'=>$code, 'label'=>$label, 'rate'=>$rate];
    }
}
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

// ShippingObserver: suggests options based on a naive calculation
class ShippingObserver {
    public function __construct() {}
    public function handle(array $order) {
        $weight = 0;
        foreach ($order['items'] as $i) $weight += $i['weight'] * $i['qty'];
        $suggestions = [];
        if ($weight < 1.0) {
            $suggestions[] = ShippingFactory::create('light', 'Light Mail', 35.0);
        } else if ($weight <= 5.0) {
            $suggestions[] = ShippingFactory::create('std', 'Standard', 70.0);
            $suggestions[] = ShippingFactory::create('fast', 'Fast', 140.0);
        } else {
            $suggestions[] = ShippingFactory::create('freight', 'Freight', 400.0);
        }
        echo "ShippingObserver: options for order {$order['id']}:\n";
        var_export($suggestions);
        echo "\n";
    }
}

// AuditObserver: logs a brief audit record (printed as array)
class AuditObserver {
    public function handle(array $order) {
        $audit = ['order_id' => $order['id'], 'items_count'=>count($order['items']), 'total' => $order['total']];
        echo "AuditObserver: audit entry:\n";
        var_export($audit);
        echo "\n";
    }
}

// Controller triggers the event as before
class OrderController {
    public function createAndDispatch(array $order) {
        EventDispatcher::getInstance()->dispatch('order.created', $order);
    }
}

// Wiring and demo:
$dispatcher = EventDispatcher::getInstance();
$shipObs = new ShippingObserver();
$auditObs = new AuditObserver();
$dispatcher->addListener('order.created', [$shipObs, 'handle']);
$dispatcher->addListener('order.created', [$auditObs, 'handle']);



$orderExample = [
    'id' => 202,
    'items' => [
        ['sku'=>'toy-1','qty'=>1,'price'=>500,'weight'=>0.3],
        ['sku'=>'chair-2','qty'=>1,'price'=>1200,'weight'=>7.5],
    ],
    'total' => 1700.0
];




echo "=== Dispatching order.created for order 202 ===\n";
$controller = new OrderController();
$controller->createAndDispatch($orderExample);
