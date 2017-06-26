<?php
namespace Model;


class Sendmail extends \Model{
    
  public static function sendm($mail,$code){
    
    $email = \Email::forge();
    $email->from('k-tanaka@sig-c.co.jp','管理人');
    $email->to($mail);
    $email->subject('登録メール');
    $body = "こちらから登録お願いします。\n".$code;
    $email->body($body);
    try{
      $decision = $email->send();
      if($decision){
        return true;
      }else{
        return false;
      }
    }catch(\EmailSendingFailedException $e){
      return false;
    }catch(\EmailValidationFailedException $e){
      return false;
    }catch(Exception $e){
      return false;
    }
  }
}