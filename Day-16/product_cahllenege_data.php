<?php
class ProductFactory{
    public static function create(int $id, string $slug, float $price, string $category): array {
        return ['id'=>$id, 'slug'=>$slug, 'price'=>$price, 'category'=>$category];
    }
}
class ProductRepository {
    private $products;
    public function __construct() {
        $this->products = [
            ProductFactory::create(1, 'mug', 199.00, 'kitchen'),
            ProductFactory::create(2, 'notebook', 299.00, 'stationery'),
            ProductFactory::create(3, 'pen-set', 99.00, 'stationery'),
            ProductFactory::create(4, 'plate', 149.00, 'kitchen'),
        ];
    }
    public function findByIdAndCategory(int $id, string $category): ?array {
        foreach ($this->products as $p) {
            if ($p['id'] === $id && $p['category'] === $category) {
                return $p;
            }
        }
        return null;
    }
}

class ProductController {
    private $repo;
    public function __construct(ProductRepository $repo) { $this->repo = $repo; }

    public function showByCategory($params) {
        $category = $params['category'] ?? '';
        $id = isset($params['id']) ? (int)$params['id'] : 0;
        $product = $this->repo->findByIdAndCategory($id, $category);
        if ($product) {
            echo "Found product in category '{$category}' with id {$id}:\n";
            var_export($product);
        } else {
            echo "Product not found for category '{$category}' and id {$id}.\n";
        }
    }
}

// ---------- Singleton Router ----------
class Router {
    private static $instance;
    private $routes = [];
    private function __construct() {}
    public static function getInstance() {
        if (!self::$instance) self::$instance = new self();
        return self::$instance;
    }
    public function add($method, $pattern, $handler) {
        $this->routes[] = ['method'=>strtoupper($method),'pattern'=>$pattern,'handler'=>$handler];
    }
    public function dispatch($method, $uri) {
        $method = strtoupper($method);
        foreach ($this->routes as $r) {
            if ($r['method'] !== $method) continue;
            $regex = '@^' . preg_replace('@\{(\w+)\}@', '(?P<$1>[^/]+)', $r['pattern']) . '$@';
            if (preg_match($regex, $uri, $matches)) {
                $params = [];
                foreach ($matches as $k=>$v) if (!is_int($k)) $params[$k]=$v;
                call_user_func($r['handler'], $params);
                return;
            }
        }
        echo "No route matched for $method $uri\n";
    }
}

// ---------- Wiring and Test ----------
$repo = new ProductRepository();
$controller = new ProductController($repo);
$router = Router::getInstance();

// Add our advanced route
$router->add('GET', '/store/{category}/products/{id}', [$controller, 'showByCategory']);

echo "=== Case 1: Valid category & id ===\n";
$router->dispatch('GET', '/store/stationery/products/2');

echo "\n\n=== Case 2: Wrong category ===\n";
$router->dispatch('GET', '/store/kitchen/products/2');

echo "\n\n=== Case 3: Nonexistent id ===\n";
$router->dispatch('GET', '/store/stationery/products/99');

?>