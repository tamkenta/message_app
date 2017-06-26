<?php
namespace Model;

class Delmes extends \Model{
    
    public static function delete($id,$user){
        // $me = Auth::get_screen_name();
        $query = \DB::delete('message');
        $query->where('message_id',$id);
        $query->and_where('username',$user);
        $result = $query->execute();
        return $result; 
    }
}

