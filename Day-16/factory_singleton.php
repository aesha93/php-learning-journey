<?php
// ----- Factory -----
class OrderFactory {
    public static function create($id, $items, $total) {
        return ['id' => $id, 'items' => $items, 'total' => $total];
    }
}

// ----- Singleton -----
class OrderProcessor {
    private static $instance;

    private function __construct() {} // Prevent direct creation

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new OrderProcessor();
        }
        return self::$instance;
    }

    public function process($order) {
        echo "Processing Order #{$order['id']} with total {$order['total']}\n";
    }
}

// ----- Usage -----
$order1 = OrderFactory::create(1, ['itemA','itemB'], 300);
$order2 = OrderFactory::create(2, ['itemC'], 150);

$processorA = OrderProcessor::getInstance();
$processorB = OrderProcessor::getInstance();

// Verify Singleton
if ($processorA === $processorB) {
    echo "Same OrderProcessor instance used!\n";
}

$processorA->process($order1);
$processorB->process($order2);
?>
