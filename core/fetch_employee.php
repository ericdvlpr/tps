<?php
include('database.php');

$query = '';

$output = array();

if(isset($_POST['action'])){
  $query .= "
  SELECT *  FROM employees  ";
  
  
  $statement = $connect->prepare($query);
  
  $statement->execute();
  
  $result = $statement->fetchAll();
  
  $data = '<option value="">Please Select</option>';
  
  
  foreach($result as $row)
  {
   $data .= '<option value="'.$row["employee_id"].'">'.$row["employee_name"].'</option>';
  
  }
}

echo $data;


?>