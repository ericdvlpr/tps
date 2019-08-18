<?php
 //action.php
 include 'database.php';
 if(isset($_POST['login'])){
  if(empty($_POST["username"]) || empty($_POST["password"]))  
  {  
       $message = '<label>All fields are required</label>';  
  }  
  else  
  {  
    $query = "
    SELECT * FROM users 
     WHERE username = :username
    ";
    $statement = $connect->prepare($query);
       $statement->execute(  
          array( 
          "username" => $_POST['username']
          )  
      );
       echo $count = $statement->rowCount();  
       if($count > 0)  
       {  
          $result = $statement->fetchAll();
          foreach($result as $row){
            if(password_verify($_POST['password'],$row['password'])){
              // TODO: change to status when deployed
              if($row['access'] == 1)
                  {
                  $_SESSION['access'] = $row['access'];
                  $_SESSION['id'] = $row['id'];
                  // $_SESSION['uid'] = $row['uid'];
                  $_SESSION['username'] = $row['username'];
                  // $_SESSION['name'] = $row['name'];
                  header("location:../index.php");
                  }
                  else
                  {
                  $message = "<label>Account Inactive</label>";
                  }
            }else{
              $message = "<label>Invalid Password</label>";
            }

          }
          
       }  
       else  
       {  
            $message = '<label>Wrong Data</label>';  
       }  
  }  

 }

 ?>
