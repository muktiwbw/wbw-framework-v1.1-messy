<?php

class Controller{

    protected function model($model)
    {
        require_once('../app/models/'.$model.'.php');
        $instance = new $model;
        
        return $instance;
    }

    protected function view($view, $data = [])
    {
        require_once('../app/views/'.$view.'.php');
    }
    
}