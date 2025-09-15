<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    public function view($id) {
        $product = Product::find($id);
        if (!$product) {
            http_response_code(404);
            return "Product not found";
        }
        include __DIR__ . '/../Views/product-view.php';
    }
}
?>