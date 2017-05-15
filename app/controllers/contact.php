<?php

class Contact extends Controller{

    public function index()
    {
        echo "Hi, this is from contact";
    }

    public function name($fname = '', $lname = '')
    {
        echo $fname." ".$lname;
    }

}