<?php include 'includes/header.php';?>
<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
        <div id="alert_action"></div>
            <div class="box-header with-border">
              <button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#employeeModal">
                Add Employee
              </button>
              <h3 class="box-title">Employees</h3>
              <br />
            </div>
              <div class="box-body">
                    <table id="employee_data" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                <th width="14%">Employee ID</th>
                                <th width="14%">Employee Name</th>
                                <th width="14%">Employee UserName</th>
                                <th width="14%">Action</th>
                            </tr>
                          </thead>
                  </table>
            </div>
      </div>
  </div>
</section>
<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Employee</h4>
      </div>
      <div class="modal-body">

          <form class="form-horizontal" id="employee_form" method="Post" class="collapse">
              <div class="modal-body">

                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-3 control-label text-left">Employee Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="employee_name" id="employee_name" placeholder="Full Name" required="true">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label text-left">Employee Username</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  name="employee_username" id="employee_username" placeholder="Employee Username">
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                          <div class="col-xs-3">
                            <label for="inputEmail3" class="control-label text-left">Employee Password</label>
                          </div>
                          <div class="col-xs-7">
                            <input type="password" class="form-control"  name="employee_password" id="employee_password" placeholder="Employee Password" readonly='true'>
                          </div>
                          <div class="col-xs-2">
                          <div class="row">
                              <div class="col">
                                  <input class="form-check-input" type="checkbox" id="changepassbox" >
                              </div>
                              <div class="col">
                                  <h6 class="form-check-label" for="inlineCheckbox1">Change Password</h6>
                              </div>
                              
                          </div>
                              
                          </div>
                        </div>
                    </div>
                      <div class="form-group">
                          <input type="hidden" name="btn_action" id="btn_action" value="AddEmployee" />
                      <input type="hidden" name="employee_id" id="employee_id" />
                        </div>
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
