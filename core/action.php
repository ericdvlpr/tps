<?php  
 //action.php  
 include 'database.php';  
 $object = new Database();  
if(isset($_POST["action"])) {  
        if($_POST["action"] == "Load") {  
             echo $object->get_data_in_table("SELECT * FROM users ORDER BY id DESC");  
        }
        if($_POST["action"] == "Employee") {  
             echo $object->get_employee_data("SELECT * FROM employees");  
        } 
        if($_POST["action"] == "Customer") {  
             echo $object->get_employee_data("SELECT * FROM employees");  
        }  
        if($_POST["action"] == "addEmployee") {  
           $employeeID = mysqli_escape_string($object->connect,$_POST['employeeID']);
           $employeeName = mysqli_escape_string($object->connect,$_POST['employee_name']);
           $address = mysqli_escape_string($object->connect,$_POST['address']);
           $gender = mysqli_escape_string($object->connect,$_POST['gender']);
            $bday = mysqli_escape_string($object->connect,$_POST['bday']);    
           $query="INSERT INTO employees(employee_id,employee_name,address,gender,birthday) VALUES ('".$employeeID."','".$employeeName."','".$address."','".$gender."','".$bday."')";
          $object->execute_query($query);
          echo 'Employee Data Inserted';
        }
        if($_POST["action"] == "addProduct") {  
            $productID = mysqli_escape_string($object->connect,$_POST['productID']);
            $productName = mysqli_escape_string($object->connect,$_POST['product_name']);
            $description = mysqli_escape_string($object->connect,$_POST['description']);
            $productQty = mysqli_escape_string($object->connect,$_POST['product_qty']);   
          $query="INSERT INTO items(item_id,item_name,description,quantity) VALUES ('".$productID."','".$productName."','".$description."','".$productQty."')";
          $object->execute_query($query);
          echo 'Product Data Inserted';
        }
        if($_POST["action"] == "addCustomer") {  
            $customerID = mysqli_escape_string($object->connect,$_POST['customerID']);
            $customerName = mysqli_escape_string($object->connect,$_POST['customer_name']);
            $address = mysqli_escape_string($object->connect,$_POST['address']);
            $number = mysqli_escape_string($object->connect,$_POST['number']);   
          $query="INSERT INTO customer(customer_id,name,address,contact_number) VALUES ('".$customerID."','".$customerName."','".$address."','".$number."')";
          $object->execute_query($query);
          echo 'Customer Data Inserted';
        }
        if($_POST["action"]=="Fetch Employee Data") {
            $output =array();
            $query = "SELECT * FROM employees WHERE id ='".$_POST['employee_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["employees_id"] = $row["employee_id"];
              $output["employee_name"] = $row["employee_name"];
              $output["address"] = $row["address"];
              if($row["gender"]== 'M'){
                $gender = 'Male';
              }else{
                $gender = 'Female';
              }
              $output["gender"] = $row["gender"];
              $output["bday"] = $row["birthday"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Customer Data") {
            $output =array();
            $query = "SELECT * FROM customer WHERE id ='".$_POST['customer_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["customer_id"] = $row["customer_id"];
              $output["name"] = $row["name"];
              $output["address"] = $row["address"];
              $output["number"] = $row["contact_number"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Product Data") {
            $output =array();
            $query = "SELECT * FROM items WHERE id ='".$_POST['item_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["item_id"] = $row["item_id"];
              $output["item_name"] = $row["item_name"];
              $output["description"] = $row["description"];
              $output["quantity"] = $row["quantity"];
            }
            echo json_encode($output);
          }
          if($_POST['action']=="Edit Employee") {
               $employee_name = mysqli_escape_string($object->connect,$_POST['employee_name']);
               $address = mysqli_escape_string($object->connect,$_POST['address']);
               $gender = mysqli_escape_string($object->connect,$_POST['gender']);
               $bday = mysqli_escape_string($object->connect,$_POST['bday']);
              $query = "UPDATE employees SET  employee_name='$employee_name', address='$address', gender='$gender', birthday='$bday' WHERE id = '".$_POST['employee_id']."' ";
              $object->execute_query($query);
              echo 'Data Updated';/**/
          }
          if($_POST['action']=="Edit Customer") {
               $customer_name = mysqli_escape_string($object->connect,$_POST['customer_name']);
               $address = mysqli_escape_string($object->connect,$_POST['address']);
               $number = mysqli_escape_string($object->connect,$_POST['number']);
               
              $query = "UPDATE customer SET  name='$customer_name', address='$address', contact_number='$number' WHERE id = '".$_POST['customer_id']."' ";
              $object->execute_query($query);
              echo 'Data Updated';/**/
          }
          if($_POST['action']=="Edit Item") {
               $productID = mysqli_escape_string($object->connect,$_POST['productID']);
            $productName = mysqli_escape_string($object->connect,$_POST['product_name']);
            $description = mysqli_escape_string($object->connect,$_POST['description']);
            $productQty = mysqli_escape_string($object->connect,$_POST['product_qty']);   
              $query = "UPDATE items SET  item_name='$productName', description='$description', quantity='$productQty' WHERE id = '".$_POST['product_id']."' ";
              $object->execute_query($query);
              echo 'Data Updated';/**/
          }
          if($_POST['action']=="Delete") {
  
            $query = "DELETE FROM employees WHERE id = '".$_POST['employee_id']."' ";
             $object->execute_query($query);
             echo "Data Deleted";
          }

   }  
 ?>  