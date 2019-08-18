<?php
include('database.php');

$query = '';

$output = array();

$query .= "
SELECT * FROM `deliveries`as del LEFT JOIN employees as emp ON del.delivery_assigned = emp.employee_id ";

if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE delivery_id LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR delivery_customer LIKE "%'.$_POST["search"]["value"].'%" ';
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
  switch ($row['delivery_status']){
      case 1:
        $status = '<p class="text-green">Delivered</p>'; //delivered
        break;
      case 2:
        $status = '<p class="text-blue">Out for Delivery</p>'; //otw
        break;
      case 3:
        $status = '<p class="text-red">Overdue</p>'; //overdue
        break;
      default:
        $status = '<p class="text-muted">Assigned</p>'; //pending
  }
 $sub_array = array();
 $sub_array[] = $row['delivery_id'];
 $sub_array[] = $row['delivery_order_id'];
 $sub_array[] = $row['delivery_customer'];
 $sub_array[] = $row['delivery_address'];
 $sub_array[] = $row['employee_name'];
 $sub_array[] = $row['delivery_date_assigned'];
 $sub_array[] = $row['delivery_date'];
 $sub_array[] = $status;
 $sub_array[] = '<button type="button" name="update" id="'.$row["delivery_id"].'" class="btn btn-warning btn-xs updateDelivery">Update</button>';
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
 $statement = $connect->prepare("SELECT * FROM deliveries");
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