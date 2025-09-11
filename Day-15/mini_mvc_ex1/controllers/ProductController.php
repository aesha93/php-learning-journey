<?php
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController{
    public function index(){
        $products = ProductModel::all();
        include __DIR__ . '/../views/product_list.php';
    }
}