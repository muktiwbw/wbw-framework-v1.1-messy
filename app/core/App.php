<?php

class App{

    public function __construct(){
        
        require_once('../app/routes.php');
        $route->filterUrl();

    }

}