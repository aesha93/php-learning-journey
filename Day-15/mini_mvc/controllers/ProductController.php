<?php
require_once __DIR__ . '/../models/ProductModel.php';

class ProductController {
    public function list() {
        $model = new ProductModel();
        $data = $model->getAll();    // Fetch product data
        include __DIR__ . '/../views/product_list.php'; // Send data to the view
    }
}
