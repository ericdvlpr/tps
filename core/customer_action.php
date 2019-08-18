<?php

//user_action.php
include('database.php');

if(isset($_POST['btn_action']))
{

 if($_POST['btn_action'] == 'AddCustomer')
 {
 $query = "
  INSERT INTO customers (customer_name,customer_address,customer_contact) 
  VALUES (:customer_name, :customer_address,  :customer_contact)
  "; 
  $statement = $connect->prepare($query);
  $result = $statement->execute(
   array(
    ':customer_name'  => $_POST["customer_name"],
    ':customer_address'  => $_POST["address"],
    ':customer_contact'  => $_POST["number"]
   )
  );
  if(isset($result))
  {
   echo 'New Customer Added';
  }
 }
 if($_POST['btn_action'] == 'fetch_single')
 {
  $query = "
  SELECT * FROM customers WHERE customer_id = :customer_id
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':customer_id' => $_POST["customer_id"]
   )
  );
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output['customerID'] = $row['customer_id'];
   $output['customer_name'] = $row['customer_name'];
   $output['address'] = $row['customer_address'];
   $output['number'] = $row['customer_contact'];
  }
  echo json_encode($output);
 }

 if($_POST['btn_action'] == 'Edit')
 {
  $query = "
  UPDATE customers SET 
  customer_name = '".$_POST["customer_name"]."',
  customer_address = '".$_POST["address"]."',
  customer_contact = '".$_POST["number"]."'
   WHERE customer_id = '".$_POST["customer_id"]."'
  ";
  $statement = $connect->prepare($query);
  $result = $statement->execute();
  if(isset($result))
  {
    echo 'Customer detail edited';
   
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