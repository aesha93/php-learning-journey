<?php
// exercise1.php

// --- Tiny Container (closure-based) ---
class Container {
    protected $bindings = [];
    protected $instances = [];

    public function bind(string $id, callable $resolver) {
        $this->bindings[$id] = $resolver;
    }

    public function singleton(string $id, callable $resolver) {
        $this->bindings[$id] = function($c) use ($resolver, $id) {
            if (!isset($this->instances[$id])) {
                $this->instances[$id] = $resolver($c);
            }
            return $this->instances[$id];
        };
    }

    public function get(string $id) {
        if (isset($this->bindings[$id])) {
            return $this->bindings[$id]($this);
        }
        throw new Exception("Service not bound: {$id}");
    }
}

// --- ProductProvider (receives array in constructor) ---
class ProductProvider {
    protected $products;

    public function __construct(array $products) {
        $this->products = $products; // products array is just data, no array ops taught here
    }

    public function getBySku(string $sku) {
        foreach ($this->products as $p) {
            if (isset($p['sku']) && $p['sku'] === $sku) {
                return $p;
            }
        }
        return null;
    }
}

// --- Bootstrap / usage ---
$container = new Container();

// register products array as a singleton service
$container->singleton('products', function($c) {
    return [
        ['sku' => 'P001', 'name' => 'Red Shirt', 'price' => 499],
        ['sku' => 'P002', 'name' => 'Blue Jeans', 'price' => 1299],
        ['sku' => 'P003', 'name' => 'Sneakers', 'price' => 1999],
    ];
});

// register the ProductProvider, injecting the 'products' array
$container->singleton('product_provider', function($c) {
    return new ProductProvider($c->get('products'));
});

// Now use it
$provider = $container->get('product_provider');
$product = $provider->getBySku('P002');

echo "Found product:\n";
print_r($product);
