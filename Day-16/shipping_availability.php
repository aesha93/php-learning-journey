<?php
$shippingMethods = [
    ['method_code' => 'flat', 'label' => 'Flat Rate', 'cost' => 40.00, 'allowed_countries' => ['US','IN','GB']],
    ['method_code' => 'intl', 'label'=>'International', 'cost'=>200.00, 'allowed_countries' => ['US','GB']],
    ['method_code' => 'local', 'label'=>'Local', 'cost'=>20.00, 'allowed_countries' => ['IN']]
];

$destinationCountry = 'IN';

$available = [];

foreach($shippingMethods as $method){
    foreach($method['allowed_countries'] as $c){
        if ($c === $destinationCountry) {
            $available[] = $method;
            break;
        }
    }
}

echo "Available shipping methods for {$destinationCountry}:"."<br>";

foreach ($available as $m) {
    echo "- {$m['label']} ({$m['method_code']}): Cost {$m['cost']}"."<br>";
}

?>