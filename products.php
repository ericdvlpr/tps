<?php include 'includes/header.php';?>

    <section class="content">

				 <div class="box">
  <div id="alert_action"></div>
            <div class="box-header with-border">
            <button type="button" id="add_product_button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#productModal">Add Product</button>
              <h3 class="box-title">Products</h3>
            </div>
                  <div class="box-body">
							            <table id="product_data" class="table table-bordered table-striped">

								                <thead>

                                    <tr>

                                       <th width="14%">Product ID</th>

                                       <th width="14%">Product Name</th>

                                       <th width="14%">Description</th>
                                       
                                       <th width="14%">Price</th>
                                       <th width="14%">Quantity</th>
                                       <th width="14%">Status</th>

                                       <th width="14%">Action</th>

                                  </tr>

                                </thead>
								          </table>

                        </div>

                  </div>

       </section>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Product</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="product_form" method="Post" class="collapse">
          <div class="modal-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label text-left">Product Name</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control"  name="product_name" id="product_name" required="true" placeholder="Product Name" />
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label text-left">Description</label>
              <div class="col-sm-9">
              <textarea name="description" class="form-control" id="description" required="true" cols="20" rows="10" placeholder="Description"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label text-left">Quantity</label>
              <div class="col-sm-9">
                  <input type="number" min="0" class="form-control"  name="product_qty" id="product_qty" required="true" placeholder="Product Quantity" />
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label text-left">Price</label>
              <div class="col-sm-9">
                  <input type="number" min="0" class="form-control"  name="product_price" id="product_price" required="true" placeholder="Product Price" step=".01" />
              </div>
            </div>
            <input type="hidden" name="btn_action" id="btn_action" />
            <input type="hidden" name="product_id" id="product_id" />
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