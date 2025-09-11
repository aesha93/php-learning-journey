<?php
class ProductModel {
    private $products = [
        ['sku'=>'A123','name'=>'Bag','price'=>500],
        ['sku'=>'B456','name'=>'Shoes','price'=>1200],
    ];

    public function getAll() {
        return $this->products;
    }
}
