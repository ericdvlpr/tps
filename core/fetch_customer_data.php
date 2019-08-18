<?php
include('database.php');

$query = '';

$output = array();

if(isset($_POST['action'])){
$query .= "
  SELECT * FROM customers WHERE customer_id=:customer_id  ";
  
  
  $statement = $connect->prepare($query);
  
  $statement->execute(
    array(
      ':customer_id' => $_POST['customer_id']
    )
  );
  
  $result = $statement->fetchAll();
  
  foreach($result as $row)
  {

    $output['name'] = $row['customer_name'];
    $output['address'] = $row['customer_address'];
    $output['contact_number'] = $row['customer_contact'];
   
  }
  echo json_encode($output);
}




?>