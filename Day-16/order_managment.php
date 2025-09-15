<?php 
// Step 1: Define Router class with middleware support

class Router{
    private $router = [];
    private $middleware = [];

    // Add route
    public function add($method, $pattern, $callback, $middleware = null){
        $this->routes[] = [$method, $pattern, $callback, $middleware];
    }

        // Dispatch URL
    public function dispatch($method, $url){
        foreach($this->routes as $route){
            [$routeMethod, $routePattern, $callback, $middleware] = $route;

            if ($method !== $routeMethod) continue;

            $pattern = "@^" . preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $routePattern) . "$@";

            if (preg_match($pattern, $url, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Step 2: Run middleware first
                if($middleware && !$middleware($params)){
                    echo "Invalid order ID";
                    return;
                }

                // Step 3: Run callback if middleware passes
                return call_user_func_array($callback, $params);
            }

        }
         echo "404 Not Found";
    }

}


// Step 4: Create middleware function
$isNumericMiddleware = function($params) {
    return isset($params['id']) && is_numeric($params['id']);
};

// Step 5: Create router instance
$router = new Router();

// Step 6: Add GET route for viewing orders
$router->add('GET', '/order/{id}', function($id) {
    echo "Viewing order $id";
}, $isNumericMiddleware);

// Step 7: Add POST route for updating orders
$router->add('POST', '/order/{id}', function($id) {
    echo "Updating order $id";
}, $isNumericMiddleware);

// --- Step 8: Dispatch examples ---
$router->dispatch('GET', '/order/25');    // Output: Viewing order 25
$router->dispatch('POST', '/order/25');   // Output: Updating order 25
$router->dispatch('GET', '/order/abc');   // Output: Invalid order ID
$router->dispatch('GET', '/order');       // Output: 404 Not Found


?>