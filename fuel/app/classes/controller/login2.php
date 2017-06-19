<?php
class Controller_Login extends Controller
{
    public function action_index()
    {
        $error = null;

        $view = View::forge('login/index2');

        $form = Fieldset::forge();

        $form->add('username', 'アカウント', array('maxlength' => 8))
            ->add_rule('required')
            ->add_rule('max_length', 8);

        $form->add('password', 'パスワード', array('type' => 'password'))
            ->add_rule('required')
            ->add_rule('max_length', 8);
        $form->add('submit', '', array('type' => 'submit', 'value' => 'ログイン'));

        $form->repopulate();

        $auth = Auth::instance();

        Auth::logout();

        if (Input::post()) {
            if ($form->validation()->run()) {
                if ($auth->login(Input::post('username'), Input::post('password'))) {
                    // ログイン成功時
                    Response::redirect('welcome/index');
                }
                $error = 'ログイン失敗に失敗しました';
            } else {
                $error = 'ログイン失敗に失敗しました';
            }
        }

        $view->set_safe('form', $form->build(Uri::create('login/index2')));
        $view->set('error', $error);

        return $view;
    }
}