<?php

class Router
{
    private array $roots = [
        'GET:/getProducts' => 'ProductController@getProducts',
        'POST:/createProduct' => 'ProductController@createProduct',
        'DELETE:/deleteProducts' => 'ProductController@deleteProducts',
    ];

    public function handleRequest($uri, $method): void
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $baseUrl = 'api/';
        $path = str_replace($baseUrl, '', $uri);
        $routeKey = $method . ':' . $path;
        $routeHandler = $this->roots[$routeKey] ?? null;

        if ($routeHandler) {
            [$controllerName, $methodName] = explode('@', $routeHandler);
            require_once 'app/Controllers/' . $controllerName . '.php';
            $controller = new $controllerName();
            echo $controller->$methodName();
        } else {
            echo '404 - Page not found';
        }
    }
}