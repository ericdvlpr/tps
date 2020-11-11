$(document).ready(function () {
  $('input[type=text]').attr("autocomplete", "off");
  $("#f_date").css("display", "none");
  $("#t_date").css("display", "none");
 
  $('#addProd').click(function() {
    $('#productModal').modal('show');
    $('#product_form')[0].reset();
    $('.modal-title').html("<i class='fa fa-plus'></i> Add Product");
    $('#action').val('Add');
    $('#btn_action').val('Add');
    load_category()
  });

  $('#addPO').click(function() {
    $('#orderModal').modal('show');
    $('#order_form')[0].reset();
    $('.modal-title').html("<i class='fa fa-plus'></i> Create Order");
    $('#action').val('Add');
    $('#btn_action').val('Add');
    $('#span_product_details').html('');
    add_product_row();
  });
  
  function load_category(){
    var action = 'category'
      $.ajax({
        url: "../../app/controller/categorycontroller.php",
        method: "POST",
        data: {
          action: action
        },
        success: function(data) {
          $('#category').append(data);
        }
      });
  }

  function add_product_row(count = '') {


    var html = '';

    html += "<tr>"
    html += "<td>"

    html += "<select name='product_id[]' id='product_id" + count + "' class='form-control selectpicker' data-live-search='true' required>";
    html += '';
    html += "</select><input type='hidden' name='hidden_product_id[]' id='hidden_product_id'+count+'' />";
    html += "</td>"
    html += "<td>"
    html += "<input type='text' name='desc[]' class='form-control' required />";
    html += "</td>"
    html += "<td>"
    html += "<input type='text' name='quantity[]' class='form-control' required />";
    html += "</td>"
    html += "<td>"
    html += "<input type='text' name='unitprice[]' class='form-control' required />";
    html += "</td>"
    html += "<td>"
    html += "<input type='text' name='total[]' class='form-control' required />";
    html += "</td>"


    html += "<td>"
    if (count == '') {
      html += '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
    } else {
      html += '<button type="button" name="remove" id="' + count + '" class="btn btn-danger btn-xs remove">-</button>';
    }
    html += "</td>"
    html += "</tr>"
    //  html += '</div>';
    //  html += '</div></div><br /></span>';
    $('#span_product_details').append(html);

    //  $('.selectpicker').selectpicker();
  }
  var count = 0;

  $(document).on('click', '#add_more', function() {
    count = count + 1;
    add_product_row(count);
  });
  $(document).on('click', '.remove', function() {
    var row_no = $(this).attr("id");
    $('tr' + row_no).remove();
  });
  ///Date picker
    // $('#daterange').daterangepicker();
  // //Date range picker with time picker
  //  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  //  //Date range as a button
  //  $('#daterange-btn').daterangepicker(
  //    {
  //      ranges   : {
  //        'Today'       : [moment(), moment()],
  //        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
  //        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
  //        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
  //        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
  //        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
  //      },
  //      startDate: moment().subtract(29, 'days'),
  //      endDate  : moment()
  //    },
  //    function (start, end) {
  //      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
  //    }
  //  )

  $('#type').on('change', function() {
    var type = $(this).val();
    if (type == 'delivery') {
      $("#dateLabel1").html('From Date');
      $("#dateLabel2").html('To Date');
      $("#f_date").css("display", "");
      $("#t_date").css("display", "");

    } else if (type == 'task') {
      $("#dateLabel1").html('Assigned Date');
      $("#dateLabel2").html('Due Date');
      $("#f_date").css("display", "");
      $("#t_date").css("display", "");

    }
  });

  $('#reportForm').on('submit', function(event) {
    event.preventDefault();

    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(data) {

        $('#reports_table').html(data);
      }
    });
  });
  $('#employeeform').on('submit', function(event) {
    event.preventDefault();
    // var action=$('#action').val();
    $.ajax({
      url:"core/action.php",
      method:"POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(data) {
        $('#myModal').modal('toggle');
        alert(data);
        $('#employeeform')[0].reset();
        window.location.reload();
      }
    });
  });
  $('#customerform').on('submit', function(event) {
    event.preventDefault();
    //var action=$('#action').val();
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(data) {
        $('#myModal').modal('toggle');
        alert(data);
        $('#customerform')[0].reset();
        window.location.reload();
      }
    });
  });
  $('#orderform').on('submit', function(event) {
    event.preventDefault();
    // var action=$('#action').val();
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(data) {
        $('#myModal').modal('toggle');
        alert(data);
        $('#orderform')[0].reset();
        window.location.reload();
      }
    });
  });
  $('#taskform').on('submit', function(event) {
    event.preventDefault();
    // var action=$('#action').val();
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(data) {
        $('#myModal').modal('toggle');
        alert(data);
        $('#taskform')[0].reset();
        window.location.reload();
      }
    });
  });
  $('#deliveryform').on('submit', function(event) {
    event.preventDefault();
    // var action=$('#action').val();
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(data) {
        $('#myModal').modal('toggle');
        alert(data);
        $('#deliveryform')[0].reset();
        window.location.reload();
      }
    });
  });
  $('#userform').on('submit', function(event) {
    event.preventDefault();
    // var action=$('#action').val();
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(data) {
        $('#myModal').modal('toggle');
        alert(data);
        $('#userform')[0].reset();
        window.location.reload();
      }
    });
  });
  $(document).on('change', '#customer', function() {
    var customer_id = $(this).val();
    var action = "Fetch Customer Data"
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: {
        customer_id: customer_id,
        action: action
      },
      dataType: "json",
      success: function(data) {
        $("#address").val(data.address);
        $("#number").val(data.number);
        $('#action').val("Edit Order");
      }
    });
  });
  $(document).on('change', '#orderID', function() {
    var order_id = $(this).val();
    var action = "Fetch Order Data";
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: {
        order_id: order_id,
        action: action
      },
      dataType: "json",
      success: function(data) {

        $("#customerName").val(data.customer_name);
        $("#customerLocation").val(data.address);
        $('#action').val("addDelivery");
      }
    });

  });
  $(document).on('click', '.updateEmployee', function() {
    var emp_id = $(this).attr("id");
    $('#button_action').val("Save changes");

    var action = "Fetch Employee Data";
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: {
        employee_id: emp_id,
        action: action
      },
      dataType: "json",
      success: function(data) {

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
  $(document).on('click', '.updateTask', function() {
    var task_id = $(this).attr("id");
    $('#button_action').val("Save changes");
    var action = "Fetch Task Data";
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: {
        task_id: task_id,
        action: action
      },
      dataType: "json",
      success: function(data) {

        $("#myModal").modal('show');
        $("#task_id").val(data.id);
        $("#taskID").val(data.taskID);
        $("#subject").val(data.subject);
        $("#description").val(data.description);
        $("#date_assigned").val(data.assigned);
        $("#due_date").val(data.due);
        $("#employees").selectpicker('val', data.employee_id);
        $('#action').val("Edit Task");
      }
    });
  });
  $(document).on('click', '.updateCustomer', function() {
    var cus_id = $(this).attr("id");
    $('#button_action').val("Save changes");

    var action = "Fetch Customer Data";
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: {
        customer_id: cus_id,
        action: action
      },
      dataType: "json",
      success: function(data) {

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
  $(document).on('click', '.updateProduct', function() {
    var item_id = $(this).attr("id");
    $('#button_action').val("Save changes");

    var action = "Fetch Product Data";
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: {
        product_id: item_id,
        action: action
      },
      dataType: "json",
      success: function(data) {

        $("#myModal").modal('show');
        $("#product_id").val(data.id);
        $("#productID").val(data.product_id);
        $("#product_name").val(data.product_name);
        $("#description").val(data.description);
        $("#product_qty").val(data.quantity);
        $('#action').val("Edit Product");
      }
    });
  });
  $(document).on('click', '.updateOrder', function() {
    var order_id = $(this).attr("id");
    $('#button_action').val("Save changes");

    var action = "Fetch Order Data";
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: {
        order_id: order_id,
        action: action
      },
      dataType: "json",
      success: function(data) {

        $("#myModal").modal('show');
        $("#order_id").val(data.id);
        $("#orderID").val(data.order_id);
        //$("#product").val(data.product_id);
        $("#product").selectpicker('val', data.product_id);
        // $("#customer").val(data.customer_id);
        $("#customer").selectpicker('val', data.customer_id);
        $("#address").val(data.address);
        $("#number").val(data.contact_number);
        $("#quantity").val(data.quantity);
        $('#action').val("Edit Order");
      }
    });
  });
  $(document).on('click', '.updateDelivery', function() {
    var delivery_id = $(this).attr("id");
    $('#button_action').val("Save changes");
    var action = "Fetch Delivery Data";
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: {
        delivery_id: delivery_id,
        action: action
      },
      dataType: "json",
      success: function(data) {

        $("#myModal").modal('show');
        $("#order_id").val(data.id);
        $("#orderID").selectpicker('val', data.order_id);
        //$("#product").val(data.product_id);
        $("#delivery_id").val(data.delivery_id);
        // $("#customer").val(data.customer_id);
        $("#customerName").val(data.customer_name);
        $("#customerLocation").val(data.address);
        $("#number").val(data.contact_number);
        $("#quantity").val(data.quantity);
        $('#action').val("Edit Delivery");
      }
    });
  });
  $(document).on('click', '.updateUser', function() {
    var id = $(this).attr("id");
    $('#button_action').val("Save changes");

    var action = "Fetch Users Data";
    $.ajax({
      url: "core/action.php",
      method: "POST",
      data: {
        id: id,
        action: action
      },
      dataType: "json",
      success: function(data) {
        $("#assignto").css("display", none);
        $("#myModal").modal('show');
        $("#users_id").val(data.id);
        $("#username").val(data.username);
        $("#access").val(data.access);
        $('#action').val("Edit User");
      }
    });
  });
  $(document).on('click', '.deleteEmployee', function() {
    var res_id = $(this).attr("id");

    var action = "Delete";
    if (confirm("Are you sure you want to delete?") == true) {

      $.ajax({
        url: "core/action.php",
        method: "POST",
        data: {
          employee_id: res_id,
          action: action
        },
        success: function(data) {

          alert(data);
          window.location.reload();
        }
      });
    } else {
      return false;
    }
  });
});