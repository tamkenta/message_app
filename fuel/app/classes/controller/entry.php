<?php

class Controller_Entry extends Controller{
    public function action_index(){
       return View::forge('register/entry');
    }
    //ログインボタンが押されたらのメソッド
    /*public function post_index(){
        //エラーメッセージ用変数初期化
        $error = null;
        //ログイン用のオブジェクト生成
        $auth = Auth::instance();
       
       try{
           if(input::post('register')){
            if(Check::tf(Input::post('password'), Input::post('confirm'))){
                if ($auth->create_user(Input::post('name'), Input::post('password'),Input::post('email'))) {
                    //登録完了
                    Response::redirect('/');
                }else{
                    // ログイン失敗時、エラーメッセージ作成
                    $error = '入力されていません';
                    return View::forge('entry/entry');
                }
            }
           }
       }catch(SimpleUserUpdateException $e){
            $error = $e->getMessage();
       }
    }*/
}