<?php
use \Model\User;
class Controller_Mainuser extends Controller{
    public function action_index(){
            if(!Auth::check() and !Auth::guest_login()){
                 Response::redirect('/');
            }else{
            $result = User::user(Auth::get_screen_name());
            $view = View::forge('main/message_app');
            $view->set("data",$result);
            return $view;
            }
        }
}