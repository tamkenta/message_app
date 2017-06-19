<?php
use \Model\Check;
class Controller_Register extends Controller{
//登録が押されたらのメソッド
    public function action_index(){
        //エラーメッセージ用変数初期化
        
        try{

            // viewオブジェクトの作成
            $error = '';
            $view = View::forge('register/entry');
            $viewsu = View::forge('login/index');
            //ログイン用のオブジェクト生成
            $auth = Auth::instance();
            if(input::post()){
                if(!preg_match("/^[0-9]/", Input::post('name'))){
                    if(Check::tf(Input::post('password'), Input::post('confirm'))){
                        if($auth->create_user(Input::post('name'), Input::post('password'),Input::post('email'))) {
                            //登録完了
                            $error = 'Success';
                            $viewsu->set('error',$error);
                            return $viewsu;
                            // Response::redirect('/');
                        }else{
                            // 登録失敗時、エラーメッセージ作成
                            $error = 'Not Input';
                            $view->set('error',$error);
                            return $view;
                        }
                    }else{
                        $error = 'Password cannot be confirmed';
                        $view->set('error',$error);
                        return $view;
                    }
                }else{
                    $error = '先頭に数字は使えません';
                    $view->set('error',$error);
                    return $view;
                }
            }
            //return View::forge('register/entry');
            $view->set('error',$error);
            return $view;
        }catch(Exception $e){
            
            $error = "Username already exists'in";
            $view->set('error',$error);
            return $view;
        }
    }
}
