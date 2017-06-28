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
        if(!count($result)==0){
           
            return $this->response($result);
        }else{
            return $this->response(array(
                'array' => $result,
                'message' => 'Empty array.The point is,message is none'
                ));
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
        $pull = 'successful';
        return $this->response(array(
            'message' => $pull
            ));
    }

    public function get_all(){
        $me = Auth::get_screen_name();
        $click = $_GET['request'];
        $result = Allmes::all($me,$click);
        if(!count($result)==0){
           
            return $this->response($result);
        }else{
            $error = 'メッセージがありません';
            return $this->response(array(
                'error' => $error
                ));
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
        if(!count($result)==0){
            return $this->response($result);
        }else{
            $error = "no message";
            return $this->response(array
            (
               'error' => $error
            ));
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
            return $this->response(
                array(
                    'isUse'=>false,
                    "errorMessage"=>"既に使用されているアドレスです。"
                )
            );
        }
        return $this->response(
            array(
                "errorMessage"=>"DBに接続できません"
            )
        );
            
    }
}