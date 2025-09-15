<?php
class Router{
    private $routes = [];

    public function add($method, $pattern, $callback){
        $this->routes[] = [$method,  $pattern, $callback];
    }

    public function dispatch($method, $url){
        foreach($this->routes as $route){
            [$routeMethod, $routePattern, $callback] = $route;

            // Step 2: Check HTTP method
            if ($method !== $routeMethod) continue;

            // Step 3: Convert pattern to regex to catch dynamic params
            $pattern = "@^" . preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $routePattern) . "$@";

            if (preg_match($pattern, $url, $matches)) {
                // Step 4: Extract named params
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                // Step 5: Call callback with params
                return call_user_func_array($callback, $params);
            }
        }
         echo "404 Not Found";
    }
}

// Step 6: Initialize Router
$router = new Router();

// Step 7: Add route
$router->add('GET', '/user/profile/{username}', function($username) {
    echo "Profile page of $username";
});

// Step 8: Dispatch route
// Example URL
$router->dispatch('GET', '/user/profile/Aesha'); // Output: Profile page of Aesha

?>