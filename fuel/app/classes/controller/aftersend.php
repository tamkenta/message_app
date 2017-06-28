<?php
use \Model\Sendmail;
use \Model\Betain;
class Controller_Aftersend extends Controller
{
    public function action_index(){
      //エラーメッセージ用変数初期化
        $error = '';
        //ビューテンプレートを呼び出し
        $view2 = View::forge('after/afterindex');
        $view = View::forge('login/index');
        if (Input::post()) {
          $bmail = Input::post('InputEmail');
          $code_bmail = 'http://192.168.17.96/register/mail?email='.password_hash($bmail,PASSWORD_DEFAULT);
          if(Sendmail::sendm($bmail,$code_bmail) == true){
            Betain::inbeta($bmail,$code_bmail);
            //$view2->set('add',$bmail);
            ///return $view2;
            Response::redirect("aftersend");
          }else{
            $error = '送信できないアドレスです';
            $view->set('error',$error);
            return $view;
          }
        }
        //エラーメッセージをビューにセット
        $view->set('error', $error);
        return $view2;
    }
}