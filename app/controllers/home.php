<?php

class Home extends Controller{ // It is not case sensitive here. however it becomes one for the file name.

    public function index(){
        echo "This is from home controller";
    }

    public function ora($name = ''){
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index', ['name' => $user->name]);
    }

    public function hello(){
        $this->view('home/index');
    }

    public function show_form(){
        $this->view('form');
    }

    public function handle_form($nama){
        echo "form dihandel oleh $nama";
    }

    public function getStudent($id){

        $student = $this->model('Student');
        $user = $student->getUser($id);
        var_dump($user);

    }

}