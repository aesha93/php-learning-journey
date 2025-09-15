<?php

$order = [
    'order_id' => 'ORD1001',
    'items' => [
        ['sku' => 'TSHIRT-001', 'name'=>'Basic Tee', 'unit_price' => 500.00, 'qty' => 2],
        ['sku' => 'MUG-002', 'name'=>'Coffee Mug', 'unit_price' => 250.00, 'qty' => 1]
    ],
    'shipping_methods' => [
        ['method_code' => 'flat_rate', 'label' => 'Flat Rate', 'cost' => 50.00],
        ['method_code' => 'express', 'label' => 'Express', 'cost' => 120.00]
    ]
];

// Calculate items subtotal
$itemsSubtotal = 0.0;
foreach ($order['items'] as $item) {
    $itemsSubtotal += $item['unit_price'] * $item['qty'];
}

// Choose first shipping method (simple rule)
$chosenShipping = $order['shipping_methods'][0];
$shippingCost = $chosenShipping['cost'];

// Grand total
$grandTotal = $itemsSubtotal + $shippingCost;

echo "Order: {$order['order_id']}"."<br>";
echo "Items Subtotal: {$itemsSubtotal}"."<br>";
echo "Shipping ({$chosenShipping['label']}): {$shippingCost}"."<br>";
echo "Grand Total: {$grandTotal}"."<br>";

?>