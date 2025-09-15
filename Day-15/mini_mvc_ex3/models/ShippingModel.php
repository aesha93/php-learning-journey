<?php
class ShippingModel {
    public static function all() {
        return [
            ['code' => 'flat',    'label' => 'Flat Rate',    'cost' => 50],
            ['code' => 'express', 'label' => 'Express',      'cost' => 150],
            ['code' => 'pickup',  'label' => 'Store Pickup', 'cost' => 0],
        ];
    }
}
