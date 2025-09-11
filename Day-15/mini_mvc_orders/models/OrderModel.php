<?php
class OrderModel {
    public static function all() {
        // Magento-like order arrays
        return [
            ['order_id' => 1001, 'customer' => 'Aesha',      'total' => 1599],
            ['order_id' => 1002, 'customer' => 'Raj Kumar',  'total' => 899],
            ['order_id' => 1003, 'customer' => 'Aesha',      'total' => 299],
            ['order_id' => 1004, 'customer' => 'Meera Shah', 'total' => 450],
        ];
    }

    public static function findByCustomer($customer) {
        $results = [];
        foreach (self::all() as $order) {
            if ($order['customer'] === $customer) {
                $results[] = $order;
            }
        }
        return $results;
    }
}
