<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">

						<?php //include 'includes/sidemenu.php';?> 
              			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	          				<h1 class="page-header">Employees</h1>
							<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
							  Add Employee
							</button>	
			          			<div class="row placeholders">
				          	
							            <table id="employee_data" class="table table-bordered table-striped">  
								                <thead>
                                    <tr>  
                                       <th width="14%">Order ID</th>  
                                       <th width="14%">Product Name</th> 
                                       <th width="14%">Customer Name</th>
                                       <th width="14%">Address</th>  
                                       <th width="14%">Contact Number</th>
                                       <th width="14%">Quantity</th>  
                                       <th width="14%">Command</th>  
                                  </tr>
                                </thead>
                                
								                <tbody >
                                       <?php 

                                             // $query ="SELECT * FROM orders";  
                                             // $result = mysqli_query($object->connect, $query);
                                             //  while($row = mysqli_fetch_object($result))  
                                             //      {  
                                             //           echo '  
                                             //           <tr>  
                                             //                <td>'.$row->id.'</td>  
                                             //                <td>'.$row->product_id.'</td>  
                                             //                <td>'.$row->customer_id.'</td>  
                                             //                <td>'.$row->address.'</td>  
                                             //                <td>'.$row->contact_number.'</td>
                                             //<td>'.$row->quantity.'</td>  
                                             //                <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateEmployee">Update</button><button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs deleteEmployee">Delete</button></td>  
                                             //           </tr>  
                                             //           ';  
                                             //      }  
                                        ?>        
                                </tbody>
								        </table>        
			          		</div>
           </div>
     </div>  
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Order</h4>
      </div>
      <div class="modal-body">
       			<form class="form-horizontal" id="employeeform" method="Post" class="collapse">
      <div class="modal-body">
        
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label text-left">Order ID</label>
          <div class="col-sm-9">
            <input type="text" class="form-control"  name="orderID" id="orderID"  readonly="true" value="<?php echo $num = substr(str_shuffle("0123456789"), -4);?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label text-left">Product ID</label>
          <div class="col-sm-9">
              <select class="selectpicker" data-live-search="true">
                <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
                <option data-tokens="mustard">Burger, Shake and a Smile</option>
                <option data-tokens="frosting">Sugar, Spice and all things nice</option>
              </select>
          </div>
        </div>
        

        <input type="hidden" name="action" id="action" value="addOrder" />
        <input type="hidden" name="order_id" id="order_id" />
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" id="button_action" value="Save" />
      </div>
      </form>
      </div>
    </div>
  </div>
</div>  
<?php 
include 'includes/footer.php';
?>
