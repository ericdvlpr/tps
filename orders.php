<?php include 'includes/header.php';?>



<section class="content">

    <div class="box">

        <div class="box-header with-border">

          <button type="button" id="add_order_button" class="btn btn-primary btn-md pull-right">

            Add Order

          </button>

          <h3 class="box-title">Orders</h3>

        </div>

        <div class="box-body">
        <div id="alert_action"></div>
		            <table id="order_data" class="table table-bordered table-striped">

			                <thead>

                          <tr>

                             <th width="14%">Order ID</th>
                             <th width="14%">Customer Name</th>
                             <th width="14%">Address</th>
                             <th width="14%">Date Ordered</th>
                             <th width="14%">Status</th>

                             <th width="14%">Command</th>

                        </tr>

                      </thead>

			        </table>

      </section>
      <div id="orderModal" class="modal fade">

     <div class="modal-dialog">
      <form method="post" id="order_form">
       <div class="modal-content">
        <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><i class="fa fa-plus"></i> Create Order</h4>
        </div>
        <div class="modal-body">
         <div class="row">
       <div class="col-md-6">
        <div class="form-group">
         <label>Name</label>
         <select name="customer_name" style="width: 100%;" id="customer_name" class="form-control select2" required>
         <option value="">Please Select</option>
         </select>
        </div>
       </div>
       <div class="col-md-6">
        <div class="form-group">
         <label>Date</label>
         <input type="date" name="order_date" id="order_date" class="form-control" required value='<?php echo date("Y-m-j");?>' />
        </div>
       </div>
      </div>
      <div class="form-group">
       <label>Address</label>
       <textarea name="customer_address" id="customer_address" class="form-control" required></textarea>
      </div>
      <div class="form-group">
          <div class="col-md-8">
          <label>Product Details</label>
          </div>
          <div class="col-md-4">
          <label>Quantity</label>
          </div>
       
       <hr />
       <span id="span_product_details"></span>
       <hr />
      </div>
      <div class="form-group">
       <label>Select Payment Status</label>
       <select name="payment_status" id="payment_status" class="form-control">
        <option value="cash">Cash</option>
        <option value="credit">Credit</option>
       </select>
      </div>
        </div>
        <div class="modal-footer">
         <input type="hidden" name="order_id" id="order_id" />
         <input type="hidden" name="customer_id" id="customer_id" />
         <input type="hidden" name="btn_action" id="btn_action" />
         <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
        </div>
       </div>
      </form>
     </div>

    </div>

<?php

include 'includes/footer.php';

?>


