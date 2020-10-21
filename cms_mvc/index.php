<?php

require 'app.php';

$route = explode('/', strtolower($_SERVER['REQUEST_URI']));

//remove first empty element;
array_shift($route);

$controller = 'Home';
$method = 'index';
$params = [];

if(isset($route[0]) && $route[0] != '') {
    $controller = ucfirst(array_shift($route));

    if(isset($route[0])) {
        $method = array_shift($route);  
    }

    $params = $route;
} 

require_once BASE_DIR . '/controllers/' . $controller . '.php';
$controller_name = $controller . 'Controller';

$controller = new $controller_name();

$controller->{$method}($params);
