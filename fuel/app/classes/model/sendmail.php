<?php
namespace Model;


class Sendmail extends \Model{
    
  public static function sendm($mail){
    
    $email = \Email::forge();
    $email->from('k-tanaka@sig-c.co.jp','管理人');
    $email->to($mail);
    $email->subject('登録メール');
    $email->body('http://192.168.17.96/register?email='.$mail);
    
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