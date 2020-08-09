<?php

include 'app/account.php';

class AccountController extends Account 
{
    public function can_login($fields){
       $login = $this->login_account($fields);
       if($login){
            header('location:./index.php');
       }else{
            header('location:./index.php');
       }
    }
}