<?php
$zones = [
  [
    'zone'=>'Local',
    'countries'=>['IN','NP'],
    'rates'=>[
      ['min'=>0, 'max'=>5, 'cost'=>50],
      ['min'=>6, 'max'=>10, 'cost'=>80]
    ]
  ],
  [
    'zone'=>'International',
    'countries'=>['US','GB'],
    'rates'=>[
      ['min'=>0, 'max'=>5, 'cost'=>150],
      ['min'=>6, 'max'=>20, 'cost'=>250]
    ]
  ]
];

$order = [
  'destination_country'=>'IN',
  'total_weight'=>7
];

$country = $order['destination_country'];
$weight = $order['total_weight'];

$shippingCost = null;
$zoneName = '';

foreach ($zones as $zone) {
    // Check if country is in zone
    foreach ($zone['countries'] as $c) {
        if ($c === $country) {
            // Found zone, now find matching weight rate
            foreach ($zone['rates'] as $rate) {
                if ($weight >= $rate['min'] && $weight <= $rate['max']) {
                    $shippingCost = $rate['cost'];
                    $zoneName = $zone['zone'];
                    break 2; // exit both loops
                }
            }
        }
    }
}

if ($shippingCost !== null) {
    echo "Zone: {$zoneName}\n";
    echo "Shipping Cost: {$shippingCost}\n";
} else {
    echo "No shipping rate found.\n";
}
