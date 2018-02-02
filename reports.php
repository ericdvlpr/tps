<?php include 'includes/header.php';?>  
    <div class="container-fluid"> 
                <div class="row">
                	<br />
				<div class="well well-lg">
					<h1 class="page-header">Reports</h1>
					<form class="form-inline" id="reportForm">
						
						<div class="form-group">
							<label for="inputPassword3" class=" text-center col-sm-9 control-label">Report Type</label>
							<br />
							<div class="col-sm-7">
									<select class="form-control" name="type" id="type" required >
									  <option value="">Please Select</option>
									  
									  <option value="delivery">Delivery</option>
									  <option value="task">Task</option>
									</select>
								
							</div>
						</div>
						<div class="form-group" id="f_date">
							<label for="inputPassword3" class=" text-center col-sm-7 control-label" id="dateLabel1">From Date</label>
							<br />
							<div class="col-sm-3">  
                     			<input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" required />  
			                </div>  
			            </div>
			            <div class="form-group" id="t_date"> 
			            <label for="inputPassword3" class="text-center col-sm-7 control-label" id="dateLabel2">To Date</label> <br />
			                <div class="col-sm-3">  
			                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" required />  
			                </div>
						</div>
						<div class="form-group"> 
							<br />
	                     <input type="submit" name="filter" id="filter" value="Filter" class="btn btn-info" />
	                       <input type="hidden" name="action" value="Report" required />  
	                 </div> 
					 					
	                 </form>
					
				</div>
				<div id="reports_table"></div>
          		
     </div>  
</div>  
<?php 
include 'includes/footer.php';
?>
