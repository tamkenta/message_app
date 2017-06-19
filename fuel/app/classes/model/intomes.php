<?php
namespace Model;

class Intomes extends \Model{
    
    public static function mesin($me,$you,$cont){
        // $me = Auth::get_screen_name();
        $query = \DB::insert('message');
        $query->set(array(
            'username' => $me,
            'contents' => $cont,
            'date' => \DB::expr('now()'),//'now()',
            'touser' => $you
            )
        );
        $query->execute();
    }
}

