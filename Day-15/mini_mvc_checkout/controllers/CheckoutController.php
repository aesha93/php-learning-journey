<?php
require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/ShippingModel.php';

class CheckoutController {
    public function summary($sku, $shippingCode) {
        $product = ProductModel::findBySku($sku);
        $shipping = ShippingModel::findByCode($shippingCode);

        include __DIR__ . '/../views/checkout_summary.php';
    }
}
