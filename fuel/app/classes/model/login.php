<?php
namespace Model;

class Crud extends \Model_Curd{
    
    public static function select($mail){
        $query = DB::select('password')->from('users');
        $query->where('mail',$mail);
        $res = $query->execute();
        return $res;
    }
}

?>