<?php
include('database.php');


$query = '';

$output = array();

$query .= "
SELECT * FROM products ";

if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE product_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR product_description LIKE "%'.$_POST["search"]["value"].'%" ';
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
 $sub_array[] = $row['product_id'];
 $sub_array[] = $row['product_name'];
 $sub_array[] = $row['product_description'];
 $sub_array[] = 'PHP '.$row['product_price'];
 $sub_array[] = $row['product_quantity'];
 $sub_array[] = $row['product_status'];
 $sub_array[] = '<button type="button" name="update" id="'.$row["product_id"].'" class="btn btn-warning btn-xs updateProduct">Update</button>';
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
 $statement = $connect->prepare("SELECT * FROM products");
 $statement->execute();
 return $statement->rowCount();
}


?>