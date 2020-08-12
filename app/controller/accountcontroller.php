<?php

include 'app/account.php';

class AccountController extends Account 
{
    public function can_login($fields){
       $login = $this->login_account($fields);
       if(!empty($login)){
          $_SESSION['username'] = $login['username'];
          $_SESSION['id'] = $login['username'];
          $_SESSION['access'] = $login['access'];
          switch($login['access']){
               case 1:
                    header('location:/admin');
               break;
               case 2:
                    header('location:index.php');
               break;
               default:
                    header('location:login.php');
          }
          //   header('location:./index.php');
       }else{
            header('location:./index.php');
       }
    }
}