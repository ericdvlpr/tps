<?php
 include 'database.php';
class Account extends Database
{

    protected function login_account($fields){
        $sql = "SELECT * FROM accounts WHERE username = :username";
        $stmt = $this->database_connect()->prepare($sql);
        $stmt->execute([
            'username' => $fields['username'],
        ]);
        $count = $stmt->rowCount();
        $users = $stmt->fetchAll();
        
        if($count > 0)
        {
            foreach($users as $user){
                if(password_verify($fields['password'],$user['password'])){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['id'] = $row['username'];
                    $_SESSION['access'] = $row['access'];
                    return true;
                }else{
                    $this->error_logs('Login', 'Invalid Password');  
                }
             
            }  
        }else{
             $this->error_logs('Login', 'Username doesn\'t exist');   
        }
    }

    protected function create_account($query){
        return 'Hello';
    }

    protected function update_account($query){
        return 'Hello';
    }

    protected function show_account($username){
        $sql = "SELECT * FROM accounts WHERE username = ?";
        $stmt = $this->database_connect()->prepare($sql);
        $stmt->execute([$username]);
        $users = $stmt->fetch();
        return $users;
    }

    protected function delete_account($query){
        return 'Hello';
    }

}
