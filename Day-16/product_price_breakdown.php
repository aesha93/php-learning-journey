<?php
$product = [
    'sku' => 'TSHIRT-001',
    'name' => 'Basic Tee',
    'price' => 500.00,
    'discount_percent' => 10,
    'tax_percent' => 18
];

// 1. discount amount
$discountAmount = ($product['price'] * $product['discount_percent']) / 100;

// 2. price after discount
$priceAfterDiscount = $product['price'] - $discountAmount;

// 3. tax amount on discounted price
$taxAmount = ($priceAfterDiscount * $product['tax_percent']) / 100;

// 4. final price
$finalPrice = $priceAfterDiscount + $taxAmount;

echo "Product: {$product['name']} ({$product['sku']})"."<br>";
echo "Base Price: {$product['price']}"."<br>";
echo "Discount: {$discountAmount}"."<br>";
echo "Price after discount: {$priceAfterDiscount}"."<br>";
echo "Tax: {$taxAmount}"."<br>";
echo "Final Price: {$finalPrice}"."<br>";
