<?php include 'includes/header.php';?>

    <section class="content">
    <div id='alert_action'></div>
    		<div class="box">
			  <div class="box-header with-border">
          <button type="button" id="add_customer_button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#customerModal">
          Add Customer
        </button>
			    <h3 class="box-title">Customers</h3>
			    <br />
			  </div>
        
			  <div class="box-body">
        <div id="alert_action"></div>
			    	<table id="customer_data" class="table table-bordered table-striped">
			    		<thead>
			    			<tr>
			    				<td>Customer #</td>
			    				<td>Customer Name</td>
			    				<td>Location</td>
			    				<td>Contact Number</td>
			    				<td>Action</td>
			    			</tr>
			    		</thead>
			    	</table>
			  </div>
		</div>
 </section>
	 <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Add Customer</h4>
		      </div>
		       <form class="form-horizontal" id="customer_form" method="Post" class="collapse">
              <div class="modal-body">
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
                        <input type="tel" class="form-control" name="number" id="number"  placeholder="Contact Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"/>
                      </div>
                    </div>
                    <input type="hidden" name="btn_action" id="btn_action" />
                    <input type="hidden" name="customer_id" id="customer_id" />

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit"  class="btn btn-primary" id="button_action" value="Save" />
                  </div>
          </form>
		    </div>
	</div>
</div>
<?php
include 'includes/footer.php';
?>
