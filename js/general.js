 $(document).ready(function(){  
      //customer function
     $('#add_customer_button').click(function(){
          $('#user_form')[0].reset();
          $('.modal-title').html("<i class='fa fa-plus'></i> Add User");
          $('#action').val("Add");
          $('#btn_action').val("Add");
         });
        
         var customerdataTable = $('#customer_data').DataTable({
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax":{
           url:"customer_fetch.php",
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
        

         
         $(document).on('submit', '#customer_form', function(event){
          event.preventDefault();
          $('#action').attr('disabled','disabled');
          var form_data = $(this).serialize();
          $.ajax({
           url:"customer_action.php",
           method:"POST",
           data:form_data,
           success:function(data)
           {
            $('#customer_form')[0].reset();
            $('#customerModal').modal('hide');
            $('#alert_action').fadeIn().html('<div class="alert alert-success">'+data+'</div>');
            $('#action').attr('disabled', false);
            customerdataTable.ajax.reload();
           }
          })
         });
        
     //     $(document).on('click', '.update', function(){
     //      var customer_id = $(this).attr("id");
     //      var btn_action = 'fetch_single';
     //      $.ajax({
     //       url:"customer_action.php",
     //       method:"POST",
     //       data:{customer_id:customer_id, btn_action:btn_action},
     //       dataType:"json",
     //       success:function(data)
     //       {
     //        $('#customerModal').modal('show');
     //        $('#customer_name').val(data.customer_name);
     //        $('#customer_email').val(data.customer_email);
     //        $('.modal-title').html("<i class='fa fa-pencil-square-o'></i> Edit customer");
     //        $('#customer_id').val(customer_id);
     //        $('#action').val('Edit');
     //        $('#btn_action').val('Edit');
     //        $('#customer_password').attr('required', false);
     //       }
     //      })
     //     });
        
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

 });  