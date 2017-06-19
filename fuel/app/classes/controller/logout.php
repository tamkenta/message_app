<?php
class Controller_Logout extends Controller
{
    public function post_index()
    {
       # if (Input::post('logout')) {
            //ログイン用のオブジェクト生成
            $auth = Auth::instance();
            $auth->logout();
            Response::redirect('login');
         
       # }
    }
}