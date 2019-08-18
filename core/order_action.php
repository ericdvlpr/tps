<?php


//TODO order option to pickup of deliveried
//user_action.php
include 'database.php';
include 'fetch_product.php';
$output = '';

if(isset($_POST['btn_action']))
{
  if($_POST['btn_action'] == 'AddOrder')
  {
  $query = "
   INSERT INTO orders (order_customer_id,order_customer_name,order_customer_address,order_date, order_total, order_status) 
   VALUES (:order_customer_id,:order_customer_name,:order_customer_address,:order_date,:order_total,:order_status)
   ";
   $statement = $connect->prepare($query);
   $statement->execute(
    array(
     ':order_customer_id'   => $_POST['customer_id'],
     ':order_customer_name'   => $_POST['customer_name'],
     ':order_customer_address'    => $_POST['customer_address'],
     ':order_date'    => $_POST['order_date'],
     ':order_total'  => 0,
     ':order_status' => 0,
    )
   );
   $result = $statement->fetchAll();
   $statement = $connect->query("SELECT LAST_INSERT_ID()");
   $order_id = $statement->fetchColumn();
   if(isset($order_id))
   {
    $total_amount = 0;
    for($count = 0; $count<count($_POST["product_id"]); $count++)
    {
      $product_details = fetch_product_details($_POST["product_id"][$count], $connect);
      $sub_query = "
     INSERT INTO order_products (order_id, product_id, order_quantity, order_price) VALUES (:order_id, :product_id, :quantity, :price)
     ";
     $statement = $connect->prepare($sub_query);
     $statement->execute(
      array(
       ':order_id' => $order_id,
       ':product_id'   => $_POST["product_id"][$count],
       ':quantity'    => $_POST["quantity"][$count],
       ':price'    => $product_details['price']
      )
     );
     $base_price = $product_details['price'] * $_POST["quantity"][$count];
     $total_amount = $total_amount + $base_price;
     $update_product = "
     UPDATE products 
     SET product_quantity = product_quantity - '".$_POST["quantity"][$count]."' 
     WHERE product_id = '".$_POST["product_id"][$count]."'
     ";
     $statement = $connect->prepare($update_product);
     $statement->execute();
    }
    $update_query = "
    UPDATE orders 
    SET order_total = '".$total_amount."' 
    WHERE order_id = '".$order_id."'
    ";
    $statement = $connect->prepare($update_query);
    $statement->execute();
    $result = $statement->fetchAll();
    if(isset($result))
    {   

     echo 'Order Created...';
    }
   }
  }

 
  if($_POST['btn_action'] == 'fetch_single') {
    $query = "
    SELECT * FROM orders WHERE order_id = :order_id
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
      array(
      ':order_id' => $_POST["order_id"]
      )
    );
    $result = $statement->fetchAll();
    $output = array();
    foreach($result as $row)
    {
      $output['customer_id'] = $row['order_customer_id'];
      $output['customer_name'] = $row['order_customer_name'];
      $output['customer_address'] = $row['order_customer_address'];
      $output['order_date'] = $row['order_date'];
      $output['order_total'] = $row['order_total'];
      $output['order_status'] = $row['order_status'];
    }
    $sub_query = "
    SELECT * FROM order_products 
    WHERE order_id = '".$_POST["order_id"]."'
    ";
    $statement = $connect->prepare($sub_query);
    $statement->execute();
    $sub_result = $statement->fetchAll();
    $product_details = '';
    $count = 0;
    foreach($sub_result as $sub_row)
    {
      $product_details .= '
      <script>
      $(document).ready(function(){
      $("#product_id'.$count.'").val('.$sub_row["product_id"].').trigger("change");
      $(".select2").select2();
      });
      </script>
      <span id="row'.$count.'">
      <div class="row">
        <div class="col-md-8">
        <select name="product_id[]" id="product_id'.$count.'" class="form-control selectpicker" data-live-search="true" required>
          '.fill_product_list($connect).'
        </select>
        <input type="hidden" name="hidden_product_id[]" id="hidden_product_id'.$count.'" value="'.$sub_row["product_id"].'" />
        </div>
        <div class="col-md-3">
        <input type="text" name="quantity[]" class="form-control" value="'.$sub_row["order_quantity"].'" required />
        </div>
        <div class="col-md-1">
      ';
  
      if($count == '')
      {
      $product_details .= '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
      }
      else
      {
      $product_details .= '<button type="button" name="remove" id="'.$count.'" class="btn btn-danger btn-xs remove">-</button>';
      }
      $product_details .= '
        </div>
        </div>
      </div><br />
      </span>
      ';
      $count = $count + 1;
    }
    $output['product_details'] = $product_details;
    echo json_encode($output);
  }

 if($_POST['btn_action'] == 'Edit') {
    $delete_query = "
    DELETE FROM order_products
    WHERE order_id = '".$_POST["order_id"]."'
    ";
    $statement = $connect->prepare($delete_query);
    $statement->execute();
    $delete_result = $statement->fetchAll();
    if(isset($_POST["product_id"])) {
      
        $total_amount = 0;
        for($count = 0; $count<count($_POST["product_id"]); $count++)
        {
          $product_details = fetch_product_details($_POST["product_id"][$count], $connect);
  
          $sub_query = "
        INSERT INTO order_products (order_id, product_id, order_quantity, order_price) VALUES (:order_id, :product_id, :quantity, :price)
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute(
          array(
          ':order_id' => $_POST["order_id"],
          ':product_id'   => $_POST["product_id"][$count],
          ':quantity'    => $_POST["quantity"][$count],
          ':price'    => $product_details['price']
          )
        );
        $base_price = $product_details['price'] * $_POST["quantity"][$count];
        $total_amount = $total_amount + $base_price;
        }
      $query = "
      UPDATE orders SET 
      order_customer_id ='".$_POST["customer_id"]."',
      order_customer_name = '".$_POST["customer_name"]."', 
      order_customer_address = '".$_POST["customer_address"]."',
      order_date = '".$_POST["order_date"]."',
      order_total = '".$total_amount."',
      order_status = '0' 
      WHERE order_id = '".$_POST["order_id"]."'
      ";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      if(isset($result))
      {
        echo 'Order detail edited';
      
      }
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
  $query = "
 SELECT * FROM products 
 WHERE product_id = '".$product_id."'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output['product_id'] = $row["product_id"];
  $output['product_name'] = $row["product_name"];
  $output['quantity'] = $row["product_quantity"];
  $output['price'] = $row['product_price'];
 }
 return $output;
}
?>