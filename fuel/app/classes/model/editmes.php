<?php
namespace Model;

class Editmes extends \Model{
    
    public static function edition($id,$edit,$user){
        $query = \DB::update('message');
        $query->value('contents',$edit);
        $query->where('message_id',$id);
        $query->and_where('username',$user);
        $result = $query->execute();
        return $result;
    }
}

