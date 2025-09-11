<?php
class OrderModel {
    public static function find($id) {
        $orders = [
            1001 => [
                'order_id' => 1001,
                'customer' => 'Aesha',
                'items' => [
                    ['sku'=>'P001','name'=>'Basic T-Shirt','qty'=>2,'price'=>299],
                    ['sku'=>'P003','name'=>'Sneakers','qty'=>1,'price'=>1299],
                ]
            ],
            1002 => [
                'order_id' => 1002,
                'customer' => 'Raj Kumar',
                'items' => [
                    ['sku'=>'P002','name'=>'Denim Jeans','qty'=>1,'price'=>899],
                ]
            ],
        ];
        return $orders[$id] ?? null;
    }
}
