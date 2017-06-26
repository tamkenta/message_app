<?php
namespace Model;

class Betain extends \Model{
    
    public static function inbeta($m,$m_h){
        $query = \DB::insert('beta_mail');
        $query->set(array(
            'email' => $m,
            'hash' => $m_h,
            )
        );
        $query->execute();
    }

    public static function betacheck($h){
        $query = \DB::select('email')->from('beta_mail');
        $query->where('hash','like','%'.$h.'%');
        $result = $query->distinct(true)->execute();
        return $result;
    }
    
    public static function uri($url){
        $query = \DB::select('hash')->from('beta_mail');
        $query->where('hash',$url);
        $result = $query->execute();
        return $result;
    }
}   

