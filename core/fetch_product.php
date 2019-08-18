<?php
//  include 'database.php';
function fill_product_list($connect){
  $query = "
    SELECT *  FROM products";
    $statement = $connect->prepare($query);
    
    $statement->execute();
    
    $result = $statement->fetchAll();
    
    $data = '<option value="">Please Select</option>';
    
    
    foreach($result as $row)
    {
     $data .= '<option value="'.$row["product_id"].'" >'.$row["product_name"].'</option>';
      
    }
    return $data;
}
  // $query = '';

  // $output = array();
  
  // if(isset($_POST['action'])=='product'){
  //   $query .= "
  //   SELECT *  FROM products";
    
    
  //   $statement = $connect->prepare($query);
    
  //   $statement->execute();
    
  //   $result = $statement->fetchAll();
    
  //   $data = '<option value="">Please Select</option>';
    
    
  //   foreach($result as $row)
  //   {
  //    $data .= '<option value="'.$row["product_id"].'" >'.$row["product_name"].'</option>';
      
  //   }
  //   echo $data;
  // }
  





?>