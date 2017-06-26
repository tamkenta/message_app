<?php
use Model\Message;
use Model\Intomes;
use Model\Allmes;
use Model\Delmes;
use Model\Recentry;
use Model\Editmes;
use Model\Exist;
class Controller_Api extends Controller_Rest{
    
    // HTTP メソッドが GET の場合
    public function get_create(){
        $me = Auth::get_screen_name();
        $click = $_GET['request'];
        $result = Message::mesquery($me,$click);
        if(!$result==null){
           
            return $this->response($result);
        }else{
            $error=null;
            $error = 'メッセージがありません';
            return $this->response($error);
        }
        // return $this->response($click);
        // if(isset($click)){
            
        //}
    }
    public function post_in(){
        // DBに挿入する値
        $me = Auth::get_screen_name();
        $cont = $_POST['mes'];
        $user = $_POST['user']; 

        Intomes::mesin($me,$user,$cont);

        $pull=null;
        $pull = 'successful';
        return $this->response($pull);
    }

    public function get_all(){
        $me = Auth::get_screen_name();
        $click = $_GET['request'];
        $result = Allmes::all($me,$click);
        if(!$result==null){
           
            return $this->response($result);
        }else{
            $error=null;
            $error = 'メッセージがありません';
            return $this->response($error);
        }
        // return $this->response($click);
        // if(isset($click)){
            
        //}
    }

    public function post_del(){
        $me = Auth::get_screen_name();
        $m_id = $_POST['id']; 
        $res = Delmes::delete($m_id,$me);
        return $this->response($res);
    }

    public function get_recentry(){
        $me = Auth::get_screen_name();
        $result = Recentry::redate($me);
        if(!$result==null){
            return $this->response($result);
        }else{
            $error = "no message";
            return $this->response($error);
        }
    }
    public function post_update(){
        $me = Auth::get_screen_name();
        $edit_id = $_POST['id'];
        $edit_value = $_POST['editval'];
        $edit_value = nl2br($edit_value);
        $res = Editmes::edition($edit_id,$edit_value,$me);
        return $this->response($res);
    }

    public function post_check(){
        $exist = $_POST['address'];
        $result = Exist::existion($exist);
        if(count($result) == 0){
            $res = ['isUse'=>true];
            return $this->response($res);
        }else{
            $res = ['isUse'=>false,"errorMessage"=>"既に使用されています。"];
            $res = ['isUse'=>false,"errorMessage"=>"メールアドレスの形式で入力してください。"];
            
            return $this->response($res);
        }
        // DB error
        $res = ["errorMessage"=>"処理に失敗しました。"];
            
    }
}