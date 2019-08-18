 $(document).ready(function(){ 
        load_order_list();
        load_employee_list();
        load_customer_list();
        $('.select2').select2();
        $('#changepassbox').change(function(){
            if(this.checked == true)
            {
                $('#employee_password').attr('readonly',false);
            }else{
                $('#employee_password').attr('readonly',true);
            }
            
        });
        //Select order function
        function load_order_list(){
            var action = 'order';
             $.ajax({
              url:"core/fetch_order.php",
              method:"POST",
              data:{action:action},
              success:function(data){
               $('#orderID').html(data);
              }
             })
        }; 
        function load_employee_list(){
            var action = 'employee';
             $.ajax({
              url:"core/fetch_employee.php",
              method:"POST",
              data:{action:action},
              success:function(data){
               $('#employeeID').html(data);
              }
             })
        }; 
        function load_product_list(){
            var action = 'product';
             $.ajax({
              url:"core/fetch_product.php",
              method:"POST",
              data:{action:action},
              success:function(data){
                
               $('#product_id').append(data);
              }
             })
        };
        function load_customer_list(){
            var action = 'customer';
             $.ajax({
              url:"core/fetch_customer_list.php",
              method:"POST",
              data:{action:action},
              success:function(data){
                
               $('#customer_name').append(data);
              }
             })
        }; 
        $('#customer_name').change(function(){
            if($(this).val() != '')
            {
             var action = 'customer';
             var id = $(this).find(':selected').attr('data-id');
             $.ajax({
              url:"core/fetch_customer_data.php",
              method:"POST",
              data:{action:action,customer_id:id},
              dataType:"json",
              success:function(data){
               $('#customer_id').val(id);
               $('#customer_address').val(data.address);
              }
             })
            }
        });
        $('#orderID').change(function(){
            if($(this).val() != '')
            {
            var action = 'customer';
            var id = $(this).find(':selected').attr('data-id');
             $.ajax({
              url:"core/fetch_customer.php",
              method:"POST",
              data:{action:action,customer_id:id},
              dataType:"json",
              success:function(data){
               $('#customerName').val(data.name);
               $('#customerLocation').val(data.address);
               $('#customerContact').val(data.contact_number);
               $('#employeeID').attr('disabled',false);
              }
             })
            }
        });
        $('#customer_id').change(function(){
            if($(this).val() != '')
            {
             var action = 'customer';
            var id = $(this).val();
             $.ajax({
              url:"core/fetch_customer.php",
              method:"POST",
              data:{action:action,customer_id:id},
              dataType:"json",
              success:function(data){
               $('#customer_address').val(data.address);
              }
             })
            }
        });


      //customer function
     $('#add_customer_button').click(function(){
          $('#customerform')[0].reset();
          $('.modal-title').html("<i class='fa fa-plus'></i> Add Customer");
          $('#btn_action').val("AddCustomer");
          
         });
        
         var customerdataTable = $('#customer_data').DataTable({
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax":{
           url:"core/customer_fetch.php",
           type:"POST"
          },
          "columnDefs":[
           {
            "target":[4,5],
            "orderable":false
           }
          ],
          "pageLength": 10
         });
        

         
         $(document).on('submit', '#customer_form', function(event){
          event.preventDefault();
          $('#action').attr('disabled','disabled');
          var form_data = $(this).serialize();
          $.ajax({
           url:"core/customer_action.php",
           method:"POST",
           data:form_data,
           success:function(data)
           {
            
            $('#customer_form')[0].reset();
            $('#customerModal').modal('hide');
            $('#alert_action').fadeIn().html('<div class="alert alert-success alert-dismissible "><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+data+'</div>');
            $('#action').attr('disabled', false);
            customerdataTable.ajax.reload();
           }
          })
         });
        
         $(document).on('click', '.updateCustomer', function(){
          var customer_id = $(this).attr("id");
          var btn_action = 'fetch_single';
          $.ajax({
           url:"core/customer_action.php",
           method:"POST",
           data:{customer_id:customer_id, btn_action:btn_action},
           dataType:"json",
           success:function(data)
           {
            $('#customerModal').modal('show');
            $('#customer_name').val(data.customer_name);
            $('#address').val(data.address);
            $('#number').val(data.number);
            $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit customer");
            $('#customer_id').val(customer_id);
            $('#btn_action').val('Edit');
           }
          })
         });
        
     //     $(document).on('click', '.delete', function(){
     //      var user_id = $(this).attr("id");
     //      var status = $(this).data('status');
     //      var btn_action = "delete";
     //      if(confirm("Are you sure you want to change status?"))
     //      {
     //       $.ajax({
     //        url:"user_action.php",
     //        method:"POST",
     //        data:{user_id:user_id, status:status, btn_action:btn_action},
     //        success:function(data)
     //        {
     //         $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
     //         userdataTable.ajax.reload();
     //        }
     //       })
     //      }
     //      else
     //      {
     //       return false;
     //      }
     //     });
     // end customer function

     //Employee function

     
     $('#add_employee_button').click(function(){
        $('#employeeform')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Add Employee");
        $('#action').val("Add");
        
       });
      
       var employeedataTable = $('#employee_data').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax":{
         url:"core/employee_fetch.php",
         type:"POST"
        },
        "columnDefs":[
         {
          "target":[4,5],
          "orderable":false
         }
        ],
        "pageLength": 25
       });
      

       
       $(document).on('submit', '#employee_form', function(event){
        event.preventDefault();
        $('#action').attr('disabled','disabled');
        var form_data = $(this).serialize();
        $.ajax({
         url:"core/employee_action.php",
         method:"POST",
         data:form_data,
         success:function(data)
         {
          
          $('#employee_form')[0].reset();
          $('#employeeModal').modal('hide');
          $('#alert_action').fadeIn().html('<div class="alert alert-success alert-dismissible "><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+data+'</div>');
          $('#action').attr('disabled', false);
          employeedataTable.ajax.reload();
         }
        })
       });
      
       $(document).on('click', '.updateEmployee', function(){
        var employee_id = $(this).attr("id");
        var btn_action = 'fetch_single';
        $.ajax({
         url:"core/employee_action.php",
         method:"POST",
         data:{employee_id:employee_id, btn_action:btn_action},
         dataType:"json",
         success:function(data)
         {
          $('#employeeModal').modal('show');
          $('#employee_name').val(data.employee_name);
          $('#employee_username').val(data.employee_username);
          $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit customer");
          $('#employee_id').val(employee_id);
          $('#action').val('Edit');
          $('#btn_action').val('Edit');
         }
        })
       });
      


       // TODO: when order is made delivery should be automatic??
        
        // TODO: Filter status 
        //delivery function  
        $('#add_delivery_button').click(function(){
          $('#delivery_form')[0].reset();
          $('.modal-title').html("<i class='fa fa-plus'></i> Schedule Delivery");
          $('#action').val("AddDelivery");
          
         });
        
         var deliverydataTable = $('#delivery_data').DataTable({
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax":{
           url:"core/delivery_fetch.php",
           type:"POST"
          },
          "columnDefs":[
           {
            "target":[4,5],
            "orderable":false
           }
          ],
          "pageLength": 25
         });
        
  
         
         $(document).on('submit', '#delivery_form', function(event){
          event.preventDefault();
          $('#action').attr('disabled','disabled');
          var form_data = $(this).serialize();
          $.ajax({
           url:"core/delivery_action.php",
           method:"POST",
           data:form_data,
           success:function(data)
           {
            
            $('#delivery_form')[0].reset();
            $('#deliveryModal').modal('hide');
            $('#alert_action').fadeIn().html('<div class="alert alert-success alert-dismissible "><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+data+'</div>');
            $('#action').attr('disabled', false);
            deliverydataTable.ajax.reload();
           }
          })
         });
        
         $(document).on('click', '.updateDelivery', function(){
          var delivery_id = $(this).attr("id");
          var btn_action = 'fetch_single';
          $(this).attr('disabled','disabled');
          $.ajax({
           url:"core/delivery_action.php",
           method:"POST",
           data:{delivery_id:delivery_id, btn_action:btn_action},
           dataType:"json",
           success:function(data)
           {
            $('#deliveryModal').modal('show');
            $('#deliveryID').val(data.delivery_id);
            $('#orderID').val(data.order_id);
            $('#customerName').val(data.customer_name);
            $('#customerLocation').val(data.address);
            $('#customerContact').val(data.contact);
            $('#employeeID').val(data.employee_id);
            $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit customer");
            $('#delivery_id').val(delivery_id);
            $('#employeeID').attr('disabled',false);
            $('#action').val('Edit');
            $('#btn_action').val('Edit');
           }
          })
         });
        

//order function  

     
    //    function add_product_row(count = '')
    //    {
        
    //     var html = '';
    //     html += '<span id="row'+count+'"><div class="row">';
    //     html += '<div class="col-md-8">';
    //     html += '<select name="product_id[]" id="product_id'+count+'" class="form-control select2 " data-live-search="true" required>';
    //     html += '<?php echo fill_product_list($connect); ?>';
    //     html += '</select><input type="hidden" name="hidden_product_id[]" id="hidden_product_id'+count+'" />';
    //     html += '</div>';
    //     html += '<div class="col-md-3">';
    //     html += '<input type="text" name="quantity[]" class="form-control" required />';
    //     html += '</div>';
    //     html += '<div class="col-md-1">';
    //     if(count == '')
    //     {
    //      html += '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
    //     }
    //     else
    //     {
    //      html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">-</button>';
    //     }
    //     html += '</div>';
    //     html += '</div></div><br /></span>';
    //     $('#span_product_details').append(html);
     
       
    //    }
     
    //    var count = 0;
     
    //    $(document).on('click', '#add_more', function(){
    //     count = count + 1;
    //     add_product_row(count);
    //    });
    //    $(document).on('click', '.remove', function(){
    //     var row_no = $(this).attr("id");
    //     $('#row'+row_no).remove();
    //    });


  
   var orderdataTable = $('#order_data').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax":{
     url:"core/order_fetch.php",
     type:"POST"
    },
    "columnDefs":[
     {
      "target":[4,5],
      "orderable":false
     }
    ],
    "pageLength": 25
   });
  

   
   $(document).on('submit', '#order_form', function(event){
    event.preventDefault();
    $('#action').attr('disabled','disabled');
    var form_data = $(this).serialize();
    $.ajax({
     url:"core/order_action.php",
     method:"POST",
     data:form_data,
     success:function(data)
     {
      
      $('#order_form')[0].reset();
      $('#orderModal').modal('hide');
      $('#alert_action').fadeIn().html('<div class="alert alert-success alert-dismissible "><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+data+'</div>');
      $('#action').attr('disabled', false);
      orderdataTable.ajax.reload();
     }
    })
   });
  
   $(document).on('click', '.updateOrder', function(){
    var order_id = $(this).attr("id");
    var btn_action = 'fetch_single';
    $('.select2').select2();
    $.ajax({
     url:"core/order_action.php",
     method:"POST",
     data:{order_id:order_id, btn_action:btn_action},
     dataType:"json",
     success:function(data)
     {
      $('#orderModal').modal('show');
      $('#customer_name').val(data.customer_name).trigger('change');
      $('#order_date').val(data.order_date);
      $('#customer_address').val(data.customer_address);
      $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit customer");
      $('#customer_id').val(data.customer_id);
      $('#order_id').val(order_id);
      $('#span_product_details').html(data.product_details);
      $('#action').val('Edit');
      $('#btn_action').val('Edit');
     }
    })
   });
  
// //     $(document).on('click', '.delete', function(){
// //      var user_id = $(this).attr("id");
// //      var status = $(this).data('status');
// //      var btn_action = "delete";
// //      if(confirm("Are you sure you want to change status?"))
// //      {
// //       $.ajax({
// //        url:"user_action.php",
// //        method:"POST",
// //        data:{user_id:user_id, status:status, btn_action:btn_action},
// //        success:function(data)
// //        {
// //         $('#alert_action').fadeIn().html('<div class="alert alert-info">'+data+'</div>');
// //         userdataTable.ajax.reload();
// //        }
// //       })
// //      }
// //      else
// //      {
// //       return false;
// //      }
// //     });
// // end Order function

// // start Product function
$('#add_product_button').click(function(){
    $('#product_form')[0].reset();
    $('.modal-title').html("<i class='fa fa-plus'></i> Add Product");
    $('#btn_action').val("AddProduct");
    
   });
  
   var productdataTable = $('#product_data').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax":{
     url:"core/product_fetch.php",
     type:"POST"
    },
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
   });
  

   
   $(document).on('submit', '#product_form', function(event){
    event.preventDefault();
    $('#action').attr('disabled','disabled');
    var form_data = $(this).serialize();
    $.ajax({
     url:"core/product_action.php",
     method:"POST",
     data:form_data,
     success:function(data)
     {
      
      $('#product_form')[0].reset();
      $('#productModal').modal('hide');
      $('#alert_action').fadeIn().html('<div class="alert alert-success alert-dismissible "><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+data+'</div>');
      $('#action').attr('disabled', false);
      productdataTable.ajax.reload();
     }
    })
   });
  
   $(document).on('click', '.updateProduct', function(){
    var product_id = $(this).attr("id");
    var btn_action = 'fetch_single';
    $.ajax({
     url:"core/product_action.php",
     method:"POST",
     data:{product_id:product_id, btn_action:btn_action},
     dataType:"json",
     success:function(data)
     {
      $('#productModal').modal('show');
      $('#product_name').val(data.product_name);
      $('#description').val(data.product_description);
      $('#product_qty').val(data.product_quantity);
      $('#product_price').val(data.product_price);
      $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit Product");
      $('#product_id').val(product_id);

      $('#action').val('Edit');
      $('#btn_action').val('Edit');
     }
    })
   });
 });  
