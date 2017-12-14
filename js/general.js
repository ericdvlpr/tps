 $(document).ready(function(){  
           load_employee_data();
           load_customer_data(); 
          
           function load_employee_data(){  
                var action = "Employee"; 
                
                $.ajax({  
                     url:"core/action.php",  
                     method:"POST",  
                     data:{action:action},  
                     success:function(data)  
                     {  
                           
                          // $('#employee_table').html(data);
                           $('#employee_data').DataTable(); 
                     }  
                });  
           }
           function load_customer_data(){  
                var action = "Customer"; 
                
                $.ajax({  
                     url:"core/action.php",  
                     method:"POST",  
                     data:{action:action},  
                     success:function(data)  
                     {  
                           
                          // $('#employee_table').html(data);
                           $('#customer_data').DataTable();  
                     }  
                });  
           }
 
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
                    data:{item_id:item_id,action:action},
                    dataType:"json",
                    success:function(data){
                      
                      $("#myModal").modal('show');
                      $("#product_id").val(data.id);
                      $("#productID").val(data.item_id);
                      $("#product_name").val(data.item_name);
                      $("#description").val(data.description);
                      $("#product_qty").val(data.quantity);
                      $('#action').val("Edit Item");
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