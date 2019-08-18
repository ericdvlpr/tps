<?php

//user_action.php
include('database.php');

if(isset($_POST['btn_action']))
{
 if($_POST['btn_action'] == 'AddEmployee')
 {
 $query = "
  INSERT INTO employees (employee_name,employee_username,employee_password) 
  VALUES (:employee_name, :username, :password)
  "; 
  $statement = $connect->prepare($query);
  $result = $statement->execute(
   array(
    ':employee_name'  => $_POST["employee_name"],
    ':username'  => $_POST["employee_username"],
    ':password'  => password_hash($_POST["employee_password"],PASSWORD_DEFAULT)
   )
  );
  if(isset($result))
  {
   echo 'New Employee Added';
  }
 }
 if($_POST['btn_action'] == 'fetch_single')
 {
  $query = "
  SELECT * FROM employees WHERE employee_id = :employee_id
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':employee_id' => $_POST["employee_id"]
   )
  );
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output['employee_id'] = $row['employee_id'];
   $output['employee_name'] = $row['employee_name'];
   $output['employee_username'] = $row['employee_username'];
   $output['employee_password'] = $row['employee_password'];
  }
  echo json_encode($output);
 }

 if($_POST['btn_action'] == 'Edit')
 {
   if(!isset($_POST["employee_password"])){
   $query = "
    UPDATE employees SET 
    employee_id = '".$_POST["employee_id"]."', 
    employee_name = '".$_POST["employee_name"]."',
    employee_username = '".$_POST["employee_username"]."'
    WHERE employee_id = '".$_POST["employee_id"]."'
    ";
   }else{
   $query = "
    UPDATE employees SET 
    employee_id = '".$_POST["employee_id"]."', 
    employee_name = '".$_POST["employee_name"]."',
    employee_username = '".$_POST["employee_name"]."',
    employee_password = '".password_hash($_POST["employee_password"],PASSWORD_DEFAULT)."'
    WHERE employee_id = '".$_POST["employee_id"]."'
    ";
   }
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  if(isset($result))
  {
    echo 'Employee detail edited';
   
  }
 }
//  if($_POST['btn_action'] == 'delete')
//  {
//   $status = 'Active';
//   if($_POST['status'] == 'Active')
//   {
//    $status = 'Inactive';
//   }
//   $query = "
//   UPDATE user_details 
//   SET user_status = :user_status 
//   WHERE user_id = :user_id
//   ";
//   $statement = $connect->prepare($query);
//   $statement->execute(
//    array(
//     ':user_status' => $status,
//     ':user_id'  => $_POST["user_id"]
//    )
//   ); 
//   $result = $statement->fetchAll(); 
//   if(isset($result))
//   {
//    echo 'User Status change to ' . $status;
//   }
//  }
}

?>