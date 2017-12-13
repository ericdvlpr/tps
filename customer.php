<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">

						<?php //include 'includes/sidemenu.php';?> 
              			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		          				<div class="panel panel-default">
								  <div class="panel-heading">
								    <h3 class="panel-title">Customer</h3>
								  </div>
								  <div class="panel-body">
								    	<table>
								    		<thead>
								    			<tr>
								    				<td>Customer #</td>
								    				<td>Customer Name</td>
								    				<td>Location</td>
								    				<td>Command</td>
								    			</tr>
								    		</thead>
								    		<tbody id="customer_table"></tbody>
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
		      <div class="modal-body">
		        ...
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
	</div>
</div> 
<?php 
include 'includes/footer.php';
?>
