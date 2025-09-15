<?php
$orders = [
    ['order_id'=>'O101','status'=>'pending','grand_total'=>250],
    ['order_id'=>'O102','status'=>'processing','grand_total'=>500],
    ['order_id'=>'O103','status'=>'complete','grand_total'=>150],
    ['order_id'=>'O104','status'=>'processing','grand_total'=>300]
];

echo "Processing Orders:\n";
foreach ($orders as $order) {
    if ($order['status'] === 'processing') {
        echo "- Order ID: {$order['order_id']} | Total: {$order['grand_total']}\n";
    }
}

?>