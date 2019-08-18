<?php
//TODO view and deliveries
//TODO create delivery scheduler calendar?
//user_action.php
include('database.php');

if(isset($_POST['btn_action']))
{
 if($_POST['btn_action'] == 'AddDelivery')
 {
  $status = 0;
  $query = "
  INSERT INTO deliveries (delivery_order_id,delivery_customer,delivery_address,delivery_date_assigned,delivery_assigned,delivery_status) 
  VALUES (:order_id,:customer_name,:address,:deldate,:employee_id,:status)
  "; 
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':order_id'  => $_POST["orderID"],
    ':customer_name'  => $_POST["customerName"],
    ':address'  => $_POST["customerLocation"],
    ':deldate'  => date('Y-m-d'),
    ':employee_id'  => $_POST["employeeID"],
    ':status' => $status
   )
  );
  $result = $statement->fetchAll();
  if(isset($result))
  {
  $query = "
  UPDATE orders SET 
  order_status = '2'
  WHERE order_id = '".$_POST["orderID"]."'
  ";
  
  $statement = $connect->prepare($query);
  $statement->execute();
   echo 'New Delivery Added';
  }
 }
 if($_POST['btn_action'] == 'fetch_single')
 {
  $query = "
  SELECT * FROM deliveries WHERE delivery_id = :delivery_id
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':delivery_id' => $_POST["delivery_id"]
   )
  );
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output['delivery_id'] = $row['delivery_id'];
   $output['order_id'] = $row['delivery_order_id'];
   $output['customer_name'] = $row['delivery_customer'];
   $output['address'] = $row['delivery_address'];
   $output['date'] = $row['delivery_date_assigned'];
   $output['employee_id'] = $row['delivery_assigned'];
  }
  echo json_encode($output);
 }

 if($_POST['btn_action'] == 'Edit')
 {
  $query = "
  UPDATE deliveries SET 
  delivery_assigned = '".$_POST["employeeID"]."',
  delivery_order_id = '".$_POST["orderID"]."',
  delivery_customer = '".$_POST["customerName"]."',
  delivery_address = '".$_POST["customerLocation"]."',
  delivery_date_assigned = '".date('Y-m-d')."'
  WHERE delivery_id = '".$_POST["delivery_id"]."'
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  if(isset($result))
  {
    echo 'Delivery detail edited';
   
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