<?php
require_once __DIR__ . '/../models/OrderModel.php';

class OrderController {
    public function listByCustomer($customer) {
        $orders = OrderModel::findByCustomer($customer);
        include __DIR__ . '/../views/order_list.php';
    }
}
