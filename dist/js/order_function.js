$(document).ready(function(){
  
  $('#add_order_button').click(function(){
        $('#orderModal').modal('show');
        $('#order_form')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Create Order");
        $('#action').val('Add');
        $('#btn_action').val('Add');
        $('#span_product_details').html('');
        add_product_row();
       });
     
       function add_product_row(count = '')
       {
        
        var html = '';
        html += '<span id="row'+count+'"><div class="row">';
        html += '<div class="col-md-8">';
        html += '<select name="product_id[]" id="product_id'+count+'" class="form-control select2 " data-live-search="true" required>';
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