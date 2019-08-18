<?php
include('database.php');

$query = '';

$output = array();

$query .= "
SELECT * FROM customers";

if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE customer_id LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR customer_name LIKE "%'.$_POST["search"]["value"].'%" ';
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
 $sub_array = array();
 $sub_array[] = $row['customer_id'];
 $sub_array[] = $row['customer_name'];
 $sub_array[] = $row['customer_address'];
 $sub_array[] = $row['customer_contact'];
 $sub_array[] = '<button type="button" name="update" id="'.$row["customer_id"].'" class="btn btn-warning btn-xs updateCustomer">Update</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["customer_id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
 $statement = $connect->prepare("SELECT * FROM customers");
 $statement->execute();
 return $statement->rowCount();
}

?>