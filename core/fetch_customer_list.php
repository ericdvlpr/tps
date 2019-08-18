<?php
include('database.php');

$query = '';
$data = '';
if(isset($_POST['action'])){
$query .= "SELECT * FROM customers ";
  
  
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  
  foreach($result as $row)
  {
    $data .= '<option value="'.$row["customer_name"].'" data-id="'.$row["customer_id"].'">'.$row["customer_name"].'</option>';
   
  }
  echo $data;
}




?>