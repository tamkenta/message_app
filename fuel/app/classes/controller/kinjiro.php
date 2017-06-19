<?php

class Controller_Kinjiro extends Controller
{
    public function action_index()
    {
       $view = View::forge('kinjiro/kintai');
       return $view;
    }

}