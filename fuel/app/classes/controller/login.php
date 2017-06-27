<?php
use Model\Access;
class Controller_Login extends Controller
{
    public function action_index()
    {

        $access_ip = $_SERVER["REMOTE_ADDR"];
        Access::iplog($access_ip);
       
        //すでにログイン済であればログイン後のページへリダイレクト
        Auth::check() and Response::redirect('main');
        //エラーメッセージ用変数初期化
        $error = '';
        //ログイン用のオブジェクト生成
        $auth = Auth::instance();
        //ログインボタンが押されたら、ユーザ名、パスワードをチェックする
        if (Input::post()) {
            if ($auth->login(Input::post('mail'), Input::post('password'))) {
                
                
                // ログイン成功時、ログイン後のページへリダイレクト
                Response::redirect('main');
            }else{
                // ログイン失敗時、エラーメッセージ作成
                $error = 'The entered value not found';
            }
        }
        //ビューテンプレートを呼び出し
        $view = View::forge('login/index');
        //エラーメッセージをビューにセット
        $view->set('error', $error);
        return $view;
    }

    public function checkbox_index(){
        if(Input::pram('remember')){
            $error = null;
            if(\Auth::force_login(input::post('mail'))){    
            // ログイン成功
                Response::redirect('main');
            }else{
            // ログイン失敗
                $error = '失敗しました';
            }
        }
        $view = View::forge('login/index');
        //エラーメッセージをビューにセット
        $view->set('error', $error);
        return $view;
    }

}