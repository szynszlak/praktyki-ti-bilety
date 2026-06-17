<?php

class Router {
    private $routes = [];

    public function get($path, $action) {
        $this->routes['GET'][$path] = $action;
    }

    public function post($path, $action) {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch($url) {

        $method = $_SERVER['REQUEST_METHOD'];
        $url = parse_url($url, PHP_URL_PATH);

        foreach ($this->routes[$method] ?? [] as $route => $action) {

            // zamiana {id} → regex
            $pattern = preg_replace('#\{id\}#', '([0-9]+)', $route);

            if (preg_match("#^$pattern$#", $url, $matches)) {

                array_shift($matches); // usuń pełny match

                [$controllerName, $methodName] = explode('@', $action);

                require_once ROOT . "/app/controllers/$controllerName.php";

                $controller = new $controllerName();

                call_user_func_array([$controller, $methodName], $matches);

                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}