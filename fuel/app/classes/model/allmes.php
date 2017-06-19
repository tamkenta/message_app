<?php
namespace Model;

class Allmes extends \Model{
    
    public static function all($me,$you){
        $array = array($me,$you);
        $result = \DB::select()->from('message');
        $result->where('username', 'in', $array);
        $result->and_where('touser', 'in', $array);
        $result->order_by('date', 'desc');
        $res = $result->as_assoc()->execute();
        return $res;
    }
}

