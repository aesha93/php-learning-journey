<?php
$product = [
  'sku'=>'BULK-SNACK',
  'price' => 120.00,
  'tier_prices' => [
    ['qty'=>5, 'price'=>115.00],
    ['qty'=>10, 'price'=>110.00],
    ['qty'=>20, 'price'=>100.00]
  ]
];
$requested_qty = 12;


// Step 1: Start with base price
$unitPrice = $product['price'];


// Step 2: Check each tier and choose the best applicable one
foreach ($product['tier_prices'] as $tier) {
    if ($requested_qty >= $tier['qty'] && $tier['price'] < $unitPrice) {
        $unitPrice = $tier['price'];
    }
}

// Step 3: Compute total cost
$totalCost = $unitPrice * $requested_qty;

// Step 4: Output
echo "SKU: {$product['sku']}"."<br>";
echo "Requested Qty: {$requested_qty}"."<br>";;
echo "Unit Price Used: {$unitPrice}"."<br>";;
echo "Total Cost: {$totalCost}"."<br>";;
