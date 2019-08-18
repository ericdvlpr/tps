<?php
include('database.php');
//TODO order must not be updated when status is assigned 
$query = '';

$output = array();

$query .= "
SELECT * FROM orders ";

if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE order_id LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR order_customer_name LIKE "%'.$_POST["search"]["value"].'%" ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
  switch ($row['order_status']){
      case 1:
        $status = '<p class="text-green">Delivered</p>'; //delivered
        break;
      case 2:
        $status = '<p class="text-blue">Assigned</p>'; //otw
        break;
      case 3:
        $status = '<p class="text-red">Overdue</p>'; //overdue
        break;
      default:
        $status = '<p class="text-muted">Pending</p>'; //pending
  }
 $sub_array = array();
 $sub_array[] = $row['order_id'];
 $sub_array[] = $row['order_customer_name'];
 $sub_array[] = $row['order_customer_address'];
 $sub_array[] = $row['order_date'];
 $sub_array[] = $status;
 $sub_array[] = '<button type="button" name="update" id="'.$row["order_id"].'" class="btn btn-warning btn-xs updateOrder">Update</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["order_id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
 $data[] = $sub_array;
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"   =>  $filtered_rows,
 "recordsFiltered"  =>  get_total_all_records($connect),
 "data"       =>  $data
);
echo json_encode($output);

function get_total_all_records($connect)
{
 $statement = $connect->prepare("SELECT * FROM orders");
 $statement->execute();
 return $statement->rowCount();
}

function date_arrival($dateOrder, $deliverAssign){
  $startTimeStamp = strtotime("2011/07/01");
  $endTimeStamp = strtotime("2011/07/17");
  
  $timeDiff = abs($endTimeStamp - $startTimeStamp);
  
  $numberDays = $timeDiff/86400;  // 86400 seconds in one day
  
  // and you might want to convert to integer
  $numberDays = intval($numberDays);
 $eta = strtotime($numberDays,strtotime($endTimeStamp));
 return $numberDays;

}

?>