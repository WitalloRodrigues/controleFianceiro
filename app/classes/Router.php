<?php
class Router {
    private $routes = [];

    public function get($uri, $action) {
        $this->routes[] = [
            'method' => 'GET',
            'uri' => $uri,
            'action' => $action,
        ];
    }

    public function post($uri, $action) {
        $this->routes[] = [
            'method' => 'POST',
            'uri' => $uri,
            'action' => $action,
        ];
    }

    public function dispatch() {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = strtok($requestUri, '?');

        foreach ($this->routes as $route) {
            $pattern = '/^' . str_replace('/', '\/', $route['uri']) . '$/';
            

            if ($requestMethod === $route['method'] && preg_match($pattern, $requestUri, $matches)) {
                array_shift($matches);
                list($controllerName, $methodName) = explode('@', $route['action']);
                $controllerInstance = new $controllerName();
                call_user_func_array([$controllerInstance, $methodName], $matches);
                return;
            }
        }

        echo 'Página não encontrada';
    }
}
