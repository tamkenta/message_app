<?php
namespace Model;

class Access extends \Model{
    
    public static function iplog($ip){
        // $me = Auth::get_screen_name();
        $query = \DB::insert('access_log');
        $query->set(array(
            'ip' => $ip,
            'date' => \DB::expr('now()'),//'now()',
            )
        );
        $query->execute();
    }
    public static function ipexist($ip){
      $query = \DB::select('ip')->from('access_log');
      $query->where('ip',$ip);
    }
}

