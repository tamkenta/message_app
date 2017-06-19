<?php
namespace Model;

class User extends \Model{
    
    public static function user($name){
       $query = \DB::select('username')->from('users');
       $query->where('username','!=',$name);
       $result = $query->execute();
       return $result;
    }

    public static function recentry($name){
       $query = \DB::select('date')->from('message');
       $query->where('username','!=',$name);
       $result = $query->execute();
       return $result;
    }
}

