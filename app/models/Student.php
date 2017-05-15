<?php

class Student extends Model{

    public function getUser($id){
        $user = $this->all('question_choices');
        
        return $user;
    }

}