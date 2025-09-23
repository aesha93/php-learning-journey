<?php
$shippingOptions = [
    ['method_code'=>'flat','label'=>'Flat Rate','cost'=>60],
    ['method_code'=>'express','label'=>'Express','cost'=>120],
    ['method_code'=>'economy','label'=>'Economy','cost'=>40]
];


$cheapest = $shippingOptions[0];

foreach ($shippingOptions as $method) {
    if ($method['cost'] < $cheapest['cost']) {
        $cheapest = $method;
    }
}

echo "Cheapest Shipping: {$cheapest['label']} ({$cheapest['method_code']}) → Cost: {$cheapest['cost']}\n";


?>