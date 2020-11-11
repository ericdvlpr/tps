<?php
include_once '../category.php';
include '../../app/database.php';

if (isset($_POST['action'])) {
    $output = '';
    $db = new Database();
    $dbconnection = $db->database_connect();
    $category = new Category($dbconnection);
    $categorystmt = $category->display_category();
    $result = $categorystmt->fetchAll();
    $output .= "<option value=''>Please Select </option> ";
    foreach ($result as $row) {
        $output .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
    echo $output;
}
