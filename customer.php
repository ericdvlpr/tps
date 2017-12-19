<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">
                <br />
                <br />
                <br />
              			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		          				<div class="panel panel-default">
								  <div class="panel-heading">
								    <h3 class="panel-title">Customers</h3>
								    	
								  </div>
								  <div class="panel-body">
								  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
									  Add Customer
									</button>
								    	<table id="customer_data" class="table table-bordered table-striped">
								    		<thead>
								    			<tr>
								    				<td>Customer #</td>
								    				<td>Customer Name</td>
								    				<td>Location</td>
								    				<td>Contact Number</td>
								    				<td>Command</td>
								    			</tr>
								    		</thead>
								    		<tbody>
								    			<?php 

                                             $query ="SELECT * FROM customer";  
                                             $result = mysqli_query($object->connect, $query);
                                              while($row = mysqli_fetch_object($result))  
                                                  {  
                                                       echo '  
                                                       <tr>  
                                                            <td>'.$row->customer_id.'</td>  
                                                            <td>'.$row->name.'</td>  
                                                            <td>'.$row->address.'</td>  
                                                            <td>'.$row->contact_number.'</td>  
                                            
                                                            <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs updateCustomer">Update</button></td>  
                                                       </tr>  
                                                       ';  
                                                  }  
                                        ?>       
								    		</tbody>
								    	</table>
								  </div>
							</div>
           				</div>
     			</div>  
	</div>
	 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
		      </div>
		       <form class="form-horizontal" id="customerform" method="Post" class="collapse">
              <div class="modal-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label text-left">Customer ID</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="customerID" id="customerID" placeholder="Customer ID" readonly="true" value="<?php echo $num = substr(str_shuffle("0123456789"), -4);?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3 control-label text-left">Customer Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="customer_name" id="customer_name" placeholder="Customer Name" required="true">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3 control-label text-left">Complete Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="address" id="address"  placeholder="Complete Address">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3 control-label text-left">Contact Number</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="number" id="number"  placeholder="Contact Number"/>
                      </div>
                    </div>
                    <input type="hidden" name="action" id="action" value="addCustomer" />
                    <input type="hidden" name="customer_id" id="customer_id" />
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" id="button_action" value="Save" />
                  </div>
          </form>
		    </div>
	</div>
</div> 
<?php 
include 'includes/footer.php';
?>
