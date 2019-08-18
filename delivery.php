 <?php include 'includes/header.php';
 ?>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">

          <button type="button" id="add_delivery_button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#deliveryModal">Make Delivery</button>
          <h3 class="box-title" align="left">Delivery</h3>

          <br />

        </div>

        <div class="box-body">
            <div id="alert_action"></div>
              <table id="delivery_data" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <td>Delivery #</td>
                    <td>Order #</td>
                    <td>Customer Name</td>
                    <td>Location</td>
                    <td>Delivery By:</td>
                    <td>Date of Assigned:</td>
                    <td>Date of Deliveried:</td>
                    <td>Status</td>
                    <td>Action</td>
                  </tr>
                </thead>
              </table>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="deliveryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" id="makeDelivery" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Delivery</h4>

      </div>

      <div class="modal-body">
       			<form class="form-horizontal" id="delivery_form" method="Post" class="collapse">
      <div class="modal-body">
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label text-left">Order ID</label>
            <div class="col-sm-8">
                <select class="form-control" name="orderID" id="orderID" required>
                </select>

            </div>

          </div>

        <div class="form-group">

            <label for="inputEmail3" class="col-sm-4 control-label text-left">Customer Name</label>

            <div class="col-sm-8">

              <input type="text" class="form-control" readonly="true"  name="customerName" id="customerName" placeholder="Customer Name">

            </div>

          </div>

          <div class="form-group">

            <label for="inputEmail3" class="col-sm-4 control-label text-left">Customer Location</label>

            <div class="col-sm-8">

              <input type="text" class="form-control" readonly="true" name="customerLocation" id="customerLocation" placeholder="Customer Location">

            </div>

          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label text-left">Assign to Employee</label>
            <div class="col-sm-8">
                <select class="form-control" name="employeeID" id="employeeID" disabled="disabled" required/>
                </select>

            </div>

          </div>
          <?php if($_SESSION["access"]==2){?>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label text-left">Status</label>
            <div class="col-sm-9">
                <select class="form-control" readonly="true" name="status" id="status" data-live-search="true">
                <option value="">Please Select</option>
                <option value="1">Out For Delivery</option>
                <option value="2">Deliveried</option>
                </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label text-left">Delivery Date</label>
            <div class="col-sm-9">
               <input type="datetime" name="delivery_date" id="delivery_date" required/>
                </select>
            </div>
          </div>
            <?php } ?>

          <input type="hidden" name="btn_action" id="btn_action" value="AddDelivery" />

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
