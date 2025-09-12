<?php
class ProductFactory{
    public static function create(int $id, string $name, float $price):array{
        return['id' => $id, 'name' => $name, 'price' => $price];
    }
}

class ProductRepository{
    private $products;
    public function __construct(){
        $this->products = [
            ProductFactory::create(1,'Mug',199.00),
            ProductFactory::create(2,'Notebook',299.00),
            ProductFactory::create(3,'Pen Set',99.00),
        ];
    }

    public function findAll(): array{
        return $this->products;
    }

    public function findById($id): ?array {
        foreach($this->products as $p){
            if($p['id'] == $id) return $p;
        }
         return null;
    }

}

class ProductController{
    private $repo;
    public function __construct(ProductRepository $repo){
        $this->repo = $repo; 
    }

    public function index($params = []){
        $products = $this->repo->findAll();
        echo "Product list: \n";
        var_export($products);
    }

    public function show($params = []){
        $id = $params['id'] ?? null;
        $product = $this->repo->findById($id);  
        if($product){
            echo "Product detail (id={$id}).\n";
            var_export($product);
        }else{
            echo "Product not found (id = {$id}. \n";
        }
    }
}

// Singleton Router with simple dynamic parameter support
class Router {

    private static $instance;
    private $routes = [];
    private function __construct(){}
    public static function getInstance(){
        if(!self::$instance) self::$instance = new self();
        return self::$instance;
    }
    public function add(string $method, string $pattern, callable $handler) {
                $this->routes[] = ['method'=>strtoupper($method),'pattern'=>$pattern,'handler'=>$handler];
    }

    public function dispatch(string $method, string $uri){
        $method = strtoupper($method);
        foreach($this->routes as $r){
            if($r['method'] !== $method) continue;

            $regex = '@^' . preg_replace('@\{(\w+)\}@', '(?P<$1>[^/]+)', $r['pattern']) . '$@';
            if(preg_match($regex, $uri, $matches)){
                $params = [];
                foreach($matches as $k => $v){
                    if(!is_int($k)) $params[$k] = $v;
                }
                 call_user_func($r['handler'], $params);
                 return;


            }
        }
        echo "No route matched for $method $uri\n";
    }
    }
    // --- wiring and demo ---
$repo = new ProductRepository();
$controller = new ProductController($repo);
$router = Router::getInstance();

$router->add('GET', '/products', [$controller, 'index']);
$router->add('GET', '/products/{id}', [$controller, 'show']);

// Simulate requests:
echo "=== Simulate GET /products ===\n";
$router->dispatch('GET', '/products');
echo "\n\n=== Simulate GET /products/2 ===\n";
$router->dispatch('GET', '/products/2');
echo "\n\n=== Simulate GET /products/99 ===\n";
$router->dispatch('GET', '/products/99');


?>