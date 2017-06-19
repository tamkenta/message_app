<?php
namespace Model;

class Recentry extends \Model{
    
    public static function redate($me){
        /*$result = \DB::select('username','touser',array(\DB::expr('max(date)'),'recentry_date'))->from('message');
        $result->where('username',$me)->or_where('touser',$me);
        $result->group_by('username')->order_by('date','desc');
        $res = $result->as_assoc()->execute();
        return $res;*/
        $query = \DB::query("select username,touser,max(date) as recentry_date FROM message WHERE username = '$me' or touser = '$me' group by case username WHEN '$me' then touser else username END ORDER BY date");
        $res = $query->execute();
        return $res;
    }
}










