<?php
class Controller_Welcome extends Controller
{
	public function before()
	{
		//未ログインの場合、ログインページへリダイレクト
		if(!Auth::check()){
			Response::redirect('/');
		}
	}
	public function action_index()
	{
		return View::forge('main/message_app');
	}
}