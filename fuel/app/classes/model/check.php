<?php
namespace Model;

class Check extends \Model{
    
    public static function tf($password,$confirm){
        if($password == $confirm){
            return true;
        }else{
            return false;
        }
    }
   
}

