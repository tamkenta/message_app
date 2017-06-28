<?php
use \Model\Check;
use \Model\Sendmail;
use \Model\Betain;
class Controller_Register extends Controller{
//登録が押されたらのメソッド
    public function post_user(){
        //エラーメッセージ用変数初期化
        
        try{
            
            // viewオブジェクトの作成
            $error = '';
            $res =Input::post('mail');
            $view = View::forge('register/entry');
            $viewsu = View::forge('login/index');
            //ログイン用のオブジェクト生成
            $auth = Auth::instance();
            if(input::post()){
                if(!preg_match("/^[0-9]/", Input::post('name'))){
                    if(Check::tf(Input::post('password'), Input::post('confirm'))){
                        if($auth->create_user(Input::post('name'), Input::post('password'),$res)) {
                            //登録完了
                            $error = 'Success';
                            $viewsu->set('error',$error);
                            return $viewsu;
                            // Response::redirect('/');
                        }else{
                            // 登録失敗時、エラーメッセージ作成
                            $error = 'Not Input';
                            $view->set('error',$error);
                            $view->set('mail', $res);
                            return $view;
                        }
                    }else{
                        //Response::redirect('/');
                        $error = 'Password cannot be confirmed';
                        $view->set('error',$error);
                        $view->set('mail', $res);
                        return $view;
                    }
                }else{
                    $error = '先頭に数字は使えません';
                    $view->set('error',$error);
                    $view->set('mail', $res);
                    return $view;
                }
            }
            //return View::forge('register/entry');
            $view->set('mail', $res);
            $view->set('error',$error);
            return $view;
        }catch(Exception $e){
            $error = "Username already exists'in or Typing error";
            $view->set('error',$error);
            // $res =Input::post('mail');
            $view->set('mail',$res);
            //$view->set('error',$e);
            return $view;
        }
    }

    public function get_mail(){
        $error = '';
        $viewlog = View::forge('login/index');
        $view = View::forge('register/entry');
        $uri = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $b_url = Betain::uri($uri);
        if(count($b_url) == 0){
            $error = "URLの変更はできません";
            $viewlog->set('error',$error);
            return $viewlog;
        }

        $mail = $_GET['email'];
        $res = Betain::betacheck($mail);
        $res = $res[0]['email'];
        //URLを変更していないかの確認
        $view->set('error',$error);
        $view->set('mail',$res);
        return $view;
    }
}
