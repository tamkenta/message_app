<?php
namespace Model;

class Message extends \Model{
    
    public static function mesquery($me,$you){
        $array = array($me,$you);
        $result = \DB::select()->from('message');
        $result->where('username', 'in', $array);
        $result->and_where('touser', 'in', $array);
        $result->order_by('date', 'desc')->limit(20);
        $res = $result/*->as_assoc()*/->execute();
        return $res;
    }
}

