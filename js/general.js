 $(document).ready(function(){  

            $('#employee_data').DataTable();
            $('#customer_data').DataTable();
            $('#product_data').DataTable();   
            $('#task_data').DataTable();   

           $('#employeeform').on('submit', function(event){  
                event.preventDefault();  
                // var action=$('#action').val();
               $.ajax({  
                    url:"core/action.php",  
                    method:"POST",  
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,  
                    success:function(data)  
                    {  
                         $('#myModal').modal('toggle');
                         alert(data);  
                         $('#employeeform')[0].reset();  
                          window.location.reload();
                    }  
               });  
           });
            $('#customerform').on('submit', function(event){  
                event.preventDefault();  
                // var action=$('#action').val();
               $.ajax({  
                    url:"core/action.php",  
                    method:"POST",  
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,  
                    success:function(data)  
                    {  
                         $('#myModal').modal('toggle');
                         alert(data);  
                         $('#customerform')[0].reset();  
                         window.location.reload(); 
                    }  
               });  
           });
            $('#orderform').on('submit', function(event){  
                event.preventDefault();  
                // var action=$('#action').val();
               $.ajax({  
                    url:"core/action.php",  
                    method:"POST",  
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,  
                    success:function(data)  
                    {  
                         $('#myModal').modal('toggle');
                         alert(data);  
                         $('#orderform')[0].reset();  
                         window.location.reload(); 
                    }  
               });  
           });
            $('#taskform').on('submit', function(event){  
                event.preventDefault();  
                // var action=$('#action').val();
               $.ajax({  
                    url:"core/action.php",  
                    method:"POST",  
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,  
                    success:function(data)  
                    {  
                         $('#myModal').modal('toggle');
                         alert(data);  
                         $('#taskform')[0].reset();  
                         window.location.reload(); 
                    }  
               });  
           });
            $('#deliveryform').on('submit', function(event){  
                event.preventDefault();  
                // var action=$('#action').val();
               $.ajax({  
                    url:"core/action.php",  
                    method:"POST",  
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,  
                    success:function(data)  
                    {  
                         $('#myModal').modal('toggle');
                         alert(data);  
                         $('#deliveryform')[0].reset();  
                         window.location.reload(); 
                    }  
               });  
           });
           $(document).on('change','#customer',function(){
            var customer_id = $(this).val();
             var action = "Fetch Customer Data"
             $.ajax({
                    url:"core/action.php",
                    method:"POST",
                    data:{customer_id:customer_id,action:action},
                    dataType:"json",
                    success:function(data){
                      $("#address").val(data.address);
                      $("#number").val(data.number);
                      $('#action').val("Edit Order");
                    }
                  });
           }); 
           $(document).on('change','#orderID',function(){
               var order_id = $(this).val();
                var action = "Fetch Order Data";
                  $.ajax({
                    url:"core/action.php",
                    method:"POST",
                    data:{order_id:order_id,action:action},
                    dataType:"json",
                    success:function(data){
                      
                      $("#customerName").val(data.customer_name);
                      $("#customerLocation").val(data.address);
                      $('#action').val("addDelivery");
                    }
                  });

           });
          $(document).on('click','.updateEmployee', function(){
                  var emp_id = $(this).attr("id");
                  $('#button_action').val("Save changes");

                  var action = "Fetch Employee Data";
                  $.ajax({
                    url:"core/action.php",
                    method:"POST",
                    data:{employee_id:emp_id,action:action},
                    dataType:"json",
                    success:function(data){
                      
                      $("#myModal").modal('show');
                      $("#employee_id").val(data.id);
                      $("#employeeID").val(data.employees_id);
                      $("#employee_name").val(data.employee_name);
                      $("#address").val(data.address);
                      $("#gender").val(data.gender);
                      $("#bday").val(data.bday);
                      $('#action').val("Edit Employee");
                    }
                  });
          });
          $(document).on('click','.updateTask', function(){
                  var task_id = $(this).attr("id");
                  $('#button_action').val("Save changes");
                  var action = "Fetch Task Data";
                  $.ajax({
                    url:"core/action.php",
                    method:"POST",
                    data:{task_id:task_id,action:action},
                    dataType:"json",
                    success:function(data){
                      
                      $("#myModal").modal('show');
                      $("#task_id").val(data.id);
                      $("#taskID").val(data.taskID);
                      $("#subject").val(data.subject);
                      $("#description").val(data.description);
                      $("#date_assigned").val(data.assigned);
                      $("#due_date").val(data.due);
                      $("#employees").selectpicker('val',data.employee_id);
                      $('#action').val("Edit Task");
                    }
                  });
          });
          $(document).on('click','.updateCustomer', function(){
                  var cus_id = $(this).attr("id");
                  $('#button_action').val("Save changes");

                  var action = "Fetch Customer Data";
                  $.ajax({
                    url:"core/action.php",
                    method:"POST",
                    data:{customer_id:cus_id,action:action},
                    dataType:"json",
                    success:function(data){
                      
                      $("#myModal").modal('show');
                      $("#customer_id").val(data.id);
                      $("#customerID").val(data.customer_id);
                      $("#customer_name").val(data.name);
                      $("#address").val(data.address);
                      $("#number").val(data.number);
                      $('#action').val("Edit Customer");
                    }
                  });
          });
          $(document).on('click','.updateProduct', function(){
                  var item_id = $(this).attr("id");
                  $('#button_action').val("Save changes");

                  var action = "Fetch Product Data";
                  $.ajax({
                    url:"core/action.php",
                    method:"POST",
                    data:{product_id:item_id,action:action},
                    dataType:"json",
                    success:function(data){
                      
                      $("#myModal").modal('show');
                      $("#product_id").val(data.id);
                      $("#productID").val(data.product_id);
                      $("#product_name").val(data.product_name);
                      $("#description").val(data.description);
                      $("#product_qty").val(data.quantity);
                      $('#action').val("Edit Item");
                    }
                  });
          });
          $(document).on('click','.updateOrder', function(){
                  var order_id = $(this).attr("id");
                  $('#button_action').val("Save changes");

                  var action = "Fetch Order Data";
                  $.ajax({
                    url:"core/action.php",
                    method:"POST",
                    data:{order_id:order_id,action:action},
                    dataType:"json",
                    success:function(data){
                      
                      $("#myModal").modal('show');
                      $("#order_id").val(data.id);
                      $("#orderID").val(data.order_id);
                      //$("#product").val(data.product_id);
                      $("#product").selectpicker('val',data.product_id);
                     // $("#customer").val(data.customer_id);
                      $("#customer").selectpicker('val',data.customer_id);
                      $("#address").val(data.address);
                      $("#number").val(data.contact_number);
                      $("#quantity").val(data.quantity);
                      $('#action').val("Edit Order");
                    }
                  });
          });
          $(document).on('click','.updateDelivery', function(){
                  var delivery_id = $(this).attr("id");
                  $('#button_action').val("Save changes");

                  var action = "Fetch Delivery Data";
                  $.ajax({
                    url:"core/action.php",
                    method:"POST",
                    data:{delivery_id:delivery_id,action:action},
                    dataType:"json",
                    success:function(data){
                      
                      $("#myModal").modal('show');
                      $("#order_id").val(data.id);
                      $("#orderID").val(data.order_id);
                      //$("#product").val(data.product_id);
                      $("#product").selectpicker('val',data.product_id);
                     // $("#customer").val(data.customer_id);
                      $("#customer").selectpicker('val',data.customer_id);
                      $("#address").val(data.address);
                      $("#number").val(data.contact_number);
                      $("#quantity").val(data.quantity);
                      $('#action').val("Edit Order");
                    }
                  });
          });
          $(document).on('click','.deleteEmployee', function(){
              var res_id = $(this).attr("id");

              var action = "Delete";
              if(confirm("Are you sure you want to delete?") == true) {
              
                    $.ajax({
                      url:"core/action.php",
                      method:"POST",
                      data:{employee_id:res_id,action:action},
                      success:function(data){
                        
                        alert(data);
                        window.location.reload();
                        }
                    });
              }else {
                   return false;
                  }
        });         
});  