<?php
class ProductModel {
    public static function all() {
        return [
            ['sku' => 'P001', 'name' => 'Basic T-Shirt', 'price' => 299],
            ['sku' => 'P002', 'name' => 'Denim Jeans',   'price' => 899],
            ['sku' => 'P003', 'name' => 'Sneakers',      'price' => 1299],
        ];
    }

    public static function findBySku($sku) {
        foreach (self::all() as $p) {
            if ($p['sku'] === $sku) {
                return $p;
            }
        }
        return null;
    }
}
