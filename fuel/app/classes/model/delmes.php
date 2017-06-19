<?php
namespace Model;

class Delmes extends \Model{
    
    public static function delete($id){
        // $me = Auth::get_screen_name();
        $query = \DB::delete('message');
        $query->where('message_id',$id);
        $query->execute();
    }
}

