<?php
/**
 * Router Class
 * Handles URL routing and dispatching to controllers
 */

class Router {
    private $routes = [];
    private $params = [];

    /**
     * Add a route to the routing table
     */
    public function add($route, $controller) {
        $this->routes[$route] = $controller;
    }

    /**
     * Match the current URL to a route
     */
    private function match($url) {
        // Remove query string and trailing slash
        $url = strtok($url, '?');
        $url = rtrim($url, '/');
        if (empty($url)) $url = '/';

        // Check for direct match first
        if (isset($this->routes[$url])) {
            return $this->routes[$url];
        }

        // Check for dynamic routes
        foreach ($this->routes as $route => $controller) {
            // Convert route to regex pattern
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_-]+)', $route);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $url, $matches)) {
                // Extract parameters
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $this->params[$key] = $value;
                    }
                }
                return $controller;
            }
        }

        return null;
    }

    /**
     * Dispatch the request to the appropriate controller
     */
    public function dispatch() {
        $url = $_SERVER['REQUEST_URI'];
        $controller = $this->match($url);

        if ($controller === null) {
            $this->error404();
            return;
        }

        // Parse controller and action
        list($controllerName, $action) = explode('@', $controller);
        
        // Load the controller
        $controllerFile = APP_PATH . '/controllers/' . $controllerName . '.php';
        
        if (!file_exists($controllerFile)) {
            $this->error404();
            return;
        }

        require_once $controllerFile;
        
        if (!class_exists($controllerName)) {
            $this->error404();
            return;
        }

        $controllerInstance = new $controllerName();
        
        if (!method_exists($controllerInstance, $action)) {
            $this->error404();
            return;
        }

        // Call the controller action with parameters
        call_user_func_array([$controllerInstance, $action], $this->params);
    }

    /**
     * Display 404 error page
     */
    private function error404() {
        http_response_code(404);
        require_once APP_PATH . '/views/errors/404.php';
        exit;
    }
}
