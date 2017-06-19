<?php
namespace Model;

class Editmes extends \Model{
    
    public static function edition($id,$edit){
        $query = \DB::update('message');
        $query->value('contents',$edit);
        $query->where('message_id',$id);
        $query->execute();
    }
}

