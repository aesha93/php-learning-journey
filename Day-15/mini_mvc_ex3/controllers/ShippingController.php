<?php
require_once __DIR__ . '/../models/ShippingModel.php';

class ShippingController {
    public function index() {
        $methods = ShippingModel::all();
        include __DIR__ . '/../views/shipping_options.php';
    }
}
