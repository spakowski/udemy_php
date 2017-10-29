<?php
require __DIR__ . "/../init.php";
//var_dump($_SERVER);

if (isset($_SERVER['PATH_INFO'])) 
    {$pathInfo = $_SERVER['PATH_INFO'];}
else {$pathInfo = "/index";}

$routes = [
    '/index' => [
        'controller' => 'postsController',
        'method' => 'index'
    ],
    '/post' => [
        'controller' => 'postsController',
        'method' => 'showPost'
    ]
];

if (isset($routes[$pathInfo])) {
    $route = $routes[$pathInfo];
    $controller = $container->make($route['controller']);
    $method = $route['method'];
    $controller->$method();
    }

    ?>
