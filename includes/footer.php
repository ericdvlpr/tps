</div>

      <!-- /.content-wrapper -->

      <footer class="main-footer">

        <div class="pull-right hidden-xs">

          <b>Version</b> 2.4.0

        </div>

        <strong>Copyright &copy; <?php echo date('Y'); ?>.</strong> All rights

        reserved.

        <!-- Developed by: ERIC PAUL JAUCIAN -->

      </footer>

      </div>

      </body>

      <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="dist/js/select2.full.min.js"></script>script>
      <script src="dist/js/adminlte.min.js"></script>

  		<script src="dist/js/general.js"></script>
      <script type="text/javascript">
$(document).ready(function(){

  $('#add_order_button').click(function(){
        $('#orderModal').modal('show');
        $('#order_form')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Create Order");
        $('#action').val('Add');
        $('#btn_action').val('AddOrder');
        $('#span_product_details').html('');
        add_product_row();
        $('.select2').select2();
       });
     
       function add_product_row(count = '')
       {
        
        var html = '';
        html += '<span id="row'+count+'"><div class="row">';
        html += '<div class="col-md-8">';
        html += '<select name="product_id[]" id="product_id'+count+'" style="width: 100%;" class="form-control select2" required>';
        html += '<?php echo fill_product_list($connect); ?>';
        html += '</select><input type="hidden" name="hidden_product_id[]" id="hidden_product_id'+count+'" />';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<input type="text" name="quantity[]" class="form-control" required />';
        html += '</div>';
        html += '<div class="col-md-1">';
        if(count == '')
        {
         html += '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
        }
        else
        {
         html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">-</button>';
        }
        html += '</div>';
        html += '</div></div><br /></span>';
        $('#span_product_details').append(html);
     
       
       }
     
       var count = 0;
     
       $(document).on('click', '#add_more', function(){
        count = count + 1;
        add_product_row(count);
       });
       $(document).on('click', '.remove', function(){
        var row_no = $(this).attr("id");
        $('#row'+row_no).remove();
       });
});
</script>
  		<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

  		<script type="text/javascript">

			function printContent(el){

			var restorepage = document.body.innerHTML;

			var printcontent = document.getElementById(el).innerHTML;

			document.body.innerHTML = printcontent;

			window.print();

			document.body.innerHTML = restorepage;



		}

		</script>
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
 </html>
