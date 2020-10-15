<?php

class App {
    public function __construct() {
        $query = $_GET;
        $m = $query['model'] ?? 'page';
        $a = $query['action'] ?? 'index';
        $controllerName = ucfirst(strtolower($m)) . 'Controller';
        
        if(file_exists('Controllers/' . $controllerName . '.php')) {
            $controller = new $controllerName();
            $action = strtolower($a);
            print_r($action);
            if(!method_exists($controller, $action)) {
                $action = 'index';
            }
            $controller->{$action}($query);
        }
    }
}