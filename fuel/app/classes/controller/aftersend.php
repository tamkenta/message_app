<?php
use \Model\Sendmail;

class Controller_Aftersend extends Controller
{
    public function action_index(){
      //エラーメッセージ用変数初期化
        $error = '';
        //ビューテンプレートを呼び出し
        $view2 = View::forge('register/entry');
        $view = View::forge('login/index');
        if (Input::post()) {
          if(Sendmail::sendm(Input::post('InputEmail')) == true){
            $error='メールを送信しました';
            $view->set('error',$error);
            return $view;
            
          }else{
            $error = '送信できないアドレスです';
            $view->set('error',$error);
            return $view;
          }
        }
        //エラーメッセージをビューにセット
        $view->set('error', $error);
        return $view;
    }
}