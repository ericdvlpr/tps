 <?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">
<br />
                <br />
                <br />
              			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          				<div class="panel panel-default">

						  <div class="panel-heading">
						 <div align="right">
						    	<button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#myModal">
							  Make Delivery
							</button>
						    <h3 class="panel-title" align="left">Delivery</h3>
						    
						</div>	
						  </div>
						  <div class="panel-body">
						    	<table id="delivery_data" class="table table-striped table-bordered">
						    		<thead>
						    			<tr>
						    				<td>Delivery #</td>
						    				<td>Order #</td>
						    				<td>Customer Name</td>
						    				<td>Location</td>
						    				<td>Delivery By:</td>
						    				<td>Date of Delivery:</td>
						    				<td>Status</td>
						    				<td>Command</td>
						    			</tr>
						    		</thead>
						    		<tbody>
						    				<?php 

                                             $query ="SELECT * FROM deliveries JOIN employees e USING (employee_id)";  
                                             $result = mysqli_query($object->connect, $query);
                                              while($row = mysqli_fetch_object($result))  
                                                  {  

                                                  	if($row->status == 0) {
                                                  		$status = 'Pending';
                                                  	}else{
                                                  		$status = 'Delivered';
                                                  	}

                                                       echo '  
                                                       <tr>  
                                                            <td>'.$row->delivery_id.'</td>  
                                                            <td>'.$row->order_id.'</td>  
                                                            <td>'.$row->customer_name.'</td>  
                                                            <td>'.$row->address.'</td>  
                                                            <td>'.$row->employee_id.'</td>  
                                                            <td>'.$row->date_delivered.'</td>  
                                                            <td>'.$status.'</td>  
                                                            <td><button type="button" name="update" id="'.$row->delivery_id.'" class="btn btn-success btn-xs updateDelivery">Update</button></td>  
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
        <button type="button" class="close" id="makeDelivery" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Make Delivery</h4>
      </div>
      <div class="modal-body">
       			<form class="form-horizontal" id="deliveryform" method="Post" class="collapse">
      <div class="modal-body">
        
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label text-left">Delivery ID</label>
          <div class="col-sm-9">
            <input type="text" class="form-control"  name="deliveryID" id="deliveryID" placeholder="Delivery ID" readonly="true" value="<?php echo $num = substr(str_shuffle("0123456789"), -4);?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label text-left">Order ID</label>
          <div class="col-sm-9">
          		 <select class="selectpicker" name="orderID" id="orderID" data-live-search="true">
              <option value="">Please Select</option>
                  <?php
                      $query ="SELECT * FROM orders";  
                       $result = mysqli_query($object->connect, $query);
                        while($row = mysqli_fetch_object($result))  
                            {  
                              echo '<option value="'.$row->order_id.'">'.$row->order_id.'</option>   
                                
                                 ';  
                            }  
                  ?>
              </select>
          </div>
        </div>
  		<div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label text-left">Customer Name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control"  name="customerName" id="customerName" placeholder="Customer Name">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label text-left">Customer Location</label>
          <div class="col-sm-9">
            <input type="text" class="form-control"  name="customerLocation" id="customerLocation" placeholder="Customer Location">
          </div>
        </div>

        <input type="hidden" name="action" id="action" value="adddDelivery" />
        <input type="hidden" name="delivery_id" id="delivery_id" />
        
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
include 'includes/footer.php'
?>
 <script>  

 </script>  