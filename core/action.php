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
          $query="INSERT INTO products(product_id,product_name,description,quantity) VALUES ('".$productID."','".$productName."','".$description."','".$productQty."')";
          $object->execute_query($query);
          echo 'Product Data Inserted';
        }
        if($_POST["action"] == "addOrder") {  
            $orderID = mysqli_escape_string($object->connect,$_POST['orderID']);
            $productID = mysqli_escape_string($object->connect,$_POST['product']);
            $customerID = mysqli_escape_string($object->connect,$_POST['customer']);
            $address = mysqli_escape_string($object->connect,$_POST['address']);  
            $number = mysqli_escape_string($object->connect,$_POST['number']);  
            $quantity = mysqli_escape_string($object->connect,$_POST['quantity']);   
          $query="INSERT INTO orders(order_id,customer_id,product_id,address,contact_number,quantity) VALUES ('".$orderID."','".$customerID."','".$productID."','".$address."','".$number."','".$quantity."')";
          $object->execute_query($query);
          echo 'Order Data Inserted';
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
        if($_POST["action"] == "addTask") {  
            $taskID = mysqli_escape_string($object->connect,$_POST['taskID']);
            $subject = mysqli_escape_string($object->connect,$_POST['subject']);
            $description = mysqli_escape_string($object->connect,$_POST['description']);
            $date_assigned = mysqli_escape_string($object->connect,$_POST['date_assigned']);   
            $due_date = mysqli_escape_string($object->connect,$_POST['due_date']);   
            $employees = mysqli_escape_string($object->connect,$_POST['employees']);   
          $query="INSERT INTO task(task_id,subject,description,assigned,due,employee_id,status) VALUES ('".$taskID."','".$subject."','".$description."','".$date_assigned."','".$due_date."','". $employees."','0')";
          $object->execute_query($query);
          echo 'Task Data Inserted';
        }
        if($_POST["action"] == "addDelivery") {  
            $deliveryID = mysqli_escape_string($object->connect,$_POST['deliveryID']);  
            $orderID = mysqli_escape_string($object->connect,$_POST['orderID']);  
            $customerName = mysqli_escape_string($object->connect,$_POST['customerName']);  
            $customerLocation = mysqli_escape_string($object->connect,$_POST['customerLocation']);  
           
            // $employee_id = $_SESSION['id'];
          $query="INSERT INTO deliveries(delivery_id,order_id,customer_name,address,employee_id,status) VALUES ('".$deliveryID."','".$orderID."','".$customerName."','".$customerLocation."','1','0')";
          $object->execute_query($query);
          echo 'Delivery Data Inserted';
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
            $query = "SELECT * FROM products WHERE id ='".$_POST['product_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["product_id"] = $row["product_id"];
              $output["product_name"] = $row["product_name"];
              $output["description"] = $row["description"];
              $output["quantity"] = $row["quantity"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Order Data") {
            $output =array();
            $query = "SELECT * FROM orders o JOIN customer c USING (customer_id) JOIN products p USING (product_id) WHERE order_id ='".$_POST['order_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["order_id"] = $row["order_id"];
              $output["customer_id"] = $row["customer_id"];
              $output["customer_name"] = $row["name"];
              $output["product_id"] = $row["product_id"];
              $output["product_name"] = $row["product_name"];
              $output["address"] = $row["address"];
              $output["contact_number"] = $row["contact_number"];
              $output["quantity"] = $row["order_quantity"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Task Data") {
            $output =array();
            $query = "SELECT * FROM task WHERE task_id ='".$_POST['task_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["taskID"] = $row["task_id"];
              $output["subject"] = $row["subject"];
              $output["description"] = $row["description"];
              $output["assigned"] = $row["assigned"];
              $output["due"] = $row["due"];
              $output["employee_id"] = $row["employee_id"];
            }
            echo json_encode($output);
          }
          if($_POST["action"]=="Fetch Delivery Data") {
            $output =array();
            $query = "SELECT * FROM deliveries WHERE delivery_id ='".$_POST['delivery_id']."'";
            $result = $object->execute_query($query);
            while($row = mysqli_fetch_array($result)) {
              $output["id"] = $row["id"];
              $output["delivery_id"] = $row["delivery_id"];
              $output["order_id"] = $row["order_id"];
              $output["customer_name"] = $row["customer_name"];
              $output["address"] = $row["address"];
              $output["due"] = $row["due"];
              $output["employee_id"] = $row["employee_id"];
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
          if($_POST['action']=="Edit Order") {
             $orderID = mysqli_escape_string($object->connect,$_POST['orderID']);
             $product = mysqli_escape_string($object->connect,$_POST['product']);
             $customer = mysqli_escape_string($object->connect,$_POST['customer']);
             $address = mysqli_escape_string($object->connect,$_POST['address']); 
             $number = mysqli_escape_string($object->connect,$_POST['number']);  
             $quantity = mysqli_escape_string($object->connect,$_POST['quantity']);   
               $query = "UPDATE orders SET  product_id='$product', customer_id='$customer', address='$address',contact_number='$number',order_quantity='$quantity' WHERE id = '".$_POST['order_id']."' ";
              $object->execute_query($query);
              echo 'Data Updated';/**/
          }
          if($_POST['action']=="Edit Task") {
             $taskID = mysqli_escape_string($object->connect,$_POST['taskID']);
            $subject = mysqli_escape_string($object->connect,$_POST['subject']);
            $description = mysqli_escape_string($object->connect,$_POST['description']);
            $date_assigned = mysqli_escape_string($object->connect,$_POST['date_assigned']);   
            $due_date = mysqli_escape_string($object->connect,$_POST['due_date']);   
            $employees = mysqli_escape_string($object->connect,$_POST['employees']);    
               $query = "UPDATE task SET  subject='$subject', description='$description',assigned='$date_assigned',due='$due_date',employee_id='$employees' WHERE id = '".$_POST['task_id']."' ";
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