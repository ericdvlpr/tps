<?php

//user_action.php
include('database.php');


if(isset($_POST['btn_action']))
{
  if($_POST['btn_action'] == 'AddProduct')
  {
   $query = "
   INSERT INTO products (product_name,product_description,product_price,product_quantity,product_status) 
   VALUES (:product_name,:product_description,:product_price,:product_quantity,:product_status)
   ";
   $statement = $connect->prepare($query);
   $result=$statement->execute(
    array(
     ':product_name'    => $_POST['product_name'],
     ':product_description'  => $_POST['description'],
     ':product_price'  => $_POST['product_price'],
     ':product_quantity'  => $_POST['product_qty'],
     ':product_status'  => 'active',
    )
   );
    if(isset($result))
    {
     echo 'Product Added...';
    }
  }

 
 if($_POST['btn_action'] == 'fetch_single')
 {
  $query = "
  SELECT * FROM products WHERE product_id = :product_id
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':product_id' => $_POST["product_id"]
   )
  );
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $output['product_id'] = $row['product_id'];
   $output['product_name'] = $row['product_name'];
   $output['product_description'] = $row['product_description'];
   $output['product_quantity'] = $row['product_quantity'];
   $output['product_price'] = $row['product_price'];
  }
  echo json_encode($output);
 }

 if($_POST['btn_action'] == 'Edit')
 {
  $query = "
  UPDATE products SET 
  product_name = '".$_POST["product_name"]."',
  product_description = '".$_POST["description"]."',
  product_quantity = '".$_POST["product_qty"]."',
  product_price = '".$_POST["product_price"]."'
  WHERE product_id = '".$_POST["product_id"]."'
  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  if(isset($result))
  {
    echo 'Product Detail Updated';
   
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
function fetch_product_details($product_id, $connect)
{
  $output= '';
 $query = "
 SELECT * FROM product 
 WHERE product_id = '".$product_id."'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output['product_id'] = $row["product_id"];
  $output['product_name'] = $row["product_name"];
  $output['quantity'] = $row["quantity"];
  $output['price'] = $row['price'];
 }
 return $output;
}
?>