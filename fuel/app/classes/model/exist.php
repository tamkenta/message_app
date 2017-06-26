<?php
namespace Model;

class Exist extends \Model{
    
    public static function existion($m){
        $query = \DB::select('email')->from('users');
        $query->where('email',$m);
        $res = $query->execute();
        return $res;
    }
}

