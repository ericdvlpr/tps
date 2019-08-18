<?php
include('database.php');

$query = '';

$data = '<option value="">Please Select</option>';

if(isset($_POST['action'])){
  $query .= "
  SELECT *  FROM orders  ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $data .= '<option value="'.$row["order_id"].'" data-id ="'.$row['order_customer_id'].'">'.$row["order_id"].'</option>';
    
  }
}

echo $data;


?>