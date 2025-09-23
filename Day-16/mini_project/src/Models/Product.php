<?php
namespace App\Models;

class Product {
    private static $data = [
        1 => ['name' => 'Magento Hoodie', 'price' => 29.99],
        2 => ['name' => 'Magento Mug', 'price' => 9.99]
    ];

    public static function find($id) {
        return self::$data[$id] ?? null;
    }
}
