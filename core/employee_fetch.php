<?php
include('database.php');

$query = '';

$output = array();

$query .= "
SELECT * FROM employees";


$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['employee_id'];
 $sub_array[] = $row['employee_name'];
 $sub_array[] = $row['employee_username'];
 $sub_array[] = '<button type="button" name="update" id="'.$row["employee_id"].'" class="btn btn-warning btn-xs updateEmployee">Update</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["employee_id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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
 $statement = $connect->prepare("SELECT * FROM employees");
 $statement->execute();
 return $statement->rowCount();
}

?>