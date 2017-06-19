<?php

class Controller_Main extends Controller
{
    /*private function test(){
        return "aaa";
    }
    public function action_user(){
        $result = User::user(Auth::get_screen_name());
        var_dump($result);
        /*$view = View::forge('main/message_app');
        foreach($result as $row){
            $view->set(array($row));
            $view = View::forge('main/message_app');
            $view->set("data",$result);
            
        
        $a = this.test();
        print($a);
        return $view;
    }
    private function open(){
        $rset = User::user(Auth::get_screen_name());
        return $rset;
    }*/


    public function action_index()
    {
        if(!Auth::check() and !Auth::guest_login()){
            Response::redirect('/');
        }else{
            /*$us = array();
            $us->open();
            $view = View::forge('main/message_app');
            $view->set('user',$us);
            return $view;*/
            Response::redirect('mainuser');
        }
    }

    


        //すでにログイン済であればログイン後のページへリダイレクト
        //Auth::check() and Response::redirect('login2');
        //エラーメッセージ用変数初期化
        //$error = null;
        //ログイン用のオブジェクト生成
        //$auth = Auth::instance();
        //ログインボタンが押されたら、ユーザ名、パスワードをチェックする
        //if (Input::post()) {
            //if ($auth->login(Input::post('mail'), Input::post('password'))) {
                
                
                // ログイン成功時、ログイン後のページへリダイレクト
                //Response::redirect('../../view/main/message_app');
            //}else{
                // ログイン失敗時、エラーメッセージ作成
                //$error = 'ユーザ名かパスワードに誤りがあります';
            //}
        //}
        //ビューテンプレートを呼び出し
        //$view = View::forge('login/index');
        //エラーメッセージをビューにセット
        //$view->set('error', $error);
        //return $view;
    #}
}