
<?php
// Developed by: ERIC PAUL JAUCIAN
session_start();
 class Database
 {
      //crud class

      public $connect;
      private $host = 'ec2-107-22-238-186.compute-1.amazonaws.com';
      private $username = 'aygabyyzeffuhq';
      private $password = '7ca7fb3752582bea0df33ecbdccf6dfb208ed85b4c0ee490421ead59aa7ddf1b';
      private  $database = 'dc9f8mgkpa0jsi';
      private $port ='5432';

//       public $connect;
//       private $host = "localhost";
//       private $username = 'root';
//       private $password = '12345789';
//       private  $database = 'db_gfctps';

      function __construct()
      {
           $this->database_connect();
      }
      public function database_connect()
      {
           $this->connect = mysqli_connect($this->host, $this->database, $this->username, $this->password);
      }
      public function execute_query($query)
      {
           return mysqli_query($this->connect, $query);
      }
      public function can_login($table_name,$where_condition){
          $condition = '';
          $array=array();
          foreach ($where_condition as $key => $value) {
             $condition .= $key . " = '".$value."' AND ";
          }
           $condition = substr($condition, 0, -5);
             $query = "SELECT * FROM ".$table_name." WHERE ". $condition;
           $result = mysqli_query($this->connect, $query);
                while ($record = mysqli_fetch_array($result)) {
                   $array[] = $record;
              }
              return $array;
          if(mysqli_num_rows($result) ){
            return true;

          }else{
            $this->error .= "<p>Wrong data</p>";
          }

        }
      public function get_employee_data($query) {
           $output = '';
           $result = $this->execute_query($query);
           $output .= '

           ';
           while($row = mysqli_fetch_object($result))
           {
                if($row->gender== 'M'){
                  $gender = 'Male';
                }else{
                  $gender = 'Female';
                }
                $output .= '
                <tr>
                     <td>'.$row->employee_id.'</td>
                     <td>'.$row->employee_name.'</td>
                     <td>'.$row->address.'</td>
                     <td>'.$gender.'</td>
                     <td>'.$row->birthday.'</td>
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateEmployee">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deleteEmployee">Delete</button></td>
                </tr>
                ';
           }
           $output .= '';
           return $output;
      }
      public function get_customer_data($query) {
           $output = '';
           $result = $this->execute_query($query);
           $output .= '

           ';
           while($row = mysqli_fetch_object($result))
           {
                if($row->gender== 'M'){
                  $gender = 'Male';
                }else{
                  $gender = 'Female';
                }
                $output .= '
                <tr>
                     <td>'.$row->employee_id.'</td>
                     <td>'.$row->employee_name.'</td>
                     <td>'.$row->address.'</td>
                     <td>'.$gender.'</td>
                     <td>'.$row->birthday.'</td>
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateEmployee">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deleteEmployee">Delete</button></td>
                </tr>
                ';
           }
           $output .= '';
           return $output;
      }
      public function get_inventory_data($query) {
           $output = '';
           $result = $this->execute_query($query);
           $output .= '

           ';
           while($row = mysqli_fetch_object($result))
           {
                if($row->gender== 'M'){
                  $gender = 'Male';
                }else{
                  $gender = 'Female';
                }
                $output .= '
                <tr>
                     <td>'.$row->employee_id.'</td>
                     <td>'.$row->employee_name.'</td>
                     <td>'.$row->address.'</td>
                     <td>'.$gender.'</td>
                     <td>'.$row->birthday.'</td>
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateEmployee">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deleteEmployee">Delete</button></td>
                </tr>
                ';
           }
           $output .= '';
           return $output;
      }
      public function get_task_data($query) {
           $output = '';
           $result = $this->execute_query($query);
           $output .= '

           ';
           while($row = mysqli_fetch_object($result))
           {
                if($row->gender== 'M'){
                  $gender = 'Male';
                }else{
                  $gender = 'Female';
                }
                $output .= '
                <tr>
                     <td>'.$row->employee_id.'</td>
                     <td>'.$row->employee_name.'</td>
                     <td>'.$row->address.'</td>
                     <td>'.$gender.'</td>
                     <td>'.$row->birthday.'</td>
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateEmployee">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deleteEmployee">Delete</button></td>
                </tr>
                ';
           }
           $output .= '';
           return $output;
      }
      public function get_delivery_data($query) {
           $output = '';
           $result = $this->execute_query($query);
           $output .= '

           ';
           while($row = mysqli_fetch_object($result))
           {
                if($row->gender== 'M'){
                  $gender = 'Male';
                }else{
                  $gender = 'Female';
                }
                $output .= '
                <tr>
                     <td>'.$row->employee_id.'</td>
                     <td>'.$row->employee_name.'</td>
                     <td>'.$row->address.'</td>
                     <td>'.$gender.'</td>
                     <td>'.$row->birthday.'</td>
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateEmployee">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deleteEmployee">Delete</button></td>
                </tr>
                ';
           }
           $output .= '';
           return $output;
      }
 }
 ?>
