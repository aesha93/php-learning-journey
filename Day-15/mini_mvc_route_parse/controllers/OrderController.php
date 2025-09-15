<?php
require_once __DIR__ . '/../models/OrderModel.php';

class OrderController {
    public function show($id) {
        $order = OrderModel::find($id);
        include __DIR__ . '/../views/order_detail.php';
    }
}