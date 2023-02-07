<?php

class user{
    private $id;
    private $name;
    private $grade;
    private $fee;


 
    //////////////////// get //////////////////
    function get_id(){
        return $this->id;
    }
    function get_name(){
        return $this->name;
    }
    function get_grade(){
        return $this->grade;
    }
    function get_fee(){
        return $this->fee;
    }

    ///////////////// set ///////////////////
    function set_id($new_id){
        $this->id = $new_id;
    }
    function set_name($new_name){
        $this->name = $new_name;
    }
    function set_grade($new_grade){
        $this->grade = $new_grade;
    }
    function set_fee($new_fee){
        $this->fee = $new_fee;
    }


}


 







?>