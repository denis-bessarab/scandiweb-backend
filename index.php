<?php
$routes = [
    'GET:/getProducts' => 'ProductController@getProducts',
    'POST:/createProduct' => 'ProductController@createProduct',
    'DELETE:/deleteProducts' => 'ProductController@deleteProducts',
];

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];
$baseUrl = 'api/';
$path = str_replace($baseUrl, '', $requestUri);
$routeKey = $requestMethod . ':' . $path;
$routeHandler = $routes[$routeKey] ?? null;


if ($routeHandler) {
    [$controllerName, $methodName] = explode('@', $routeHandler);
    require_once 'app/Controllers/' . $controllerName . '.php';
    $controller = new $controllerName();
    $controller->$methodName();
} else {
    echo '404 - Page not found';
}

