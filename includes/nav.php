<header class="main-header">
  <!-- Logo -->
  <a href="./index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>T</b>PS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Trans </b>Proc Sys</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a> -->

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="images/default-user.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION["username"]; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="images/default-user.png" class="img-circle" alt="User Image">

              <p>
                <?php echo $_SESSION["username"]; ?>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="./logout_parse.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Transaction Processing System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right" style="color: black;">


                 <?php// if($_SESSION["access"]==1){?>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="employee.php">Employee</a></li>
                <li><a href="delivery.php">Delivery</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="task.php">Task</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li ><a href="profile.php">Profile</a></li>
                <li ><a href="logout_parse.php">Logout</a></li>
                <?php //}elseif ($_SESSION["access"]==2) {
                 ?>
                <li><a href="task.php">Task</a></li>
                <li ><a href="profile.php">Profile</a></li>
                <li ><a href="logout_parse.php">Logout</a></li>
                 <?php //}elseif ($_SESSION["access"]==3){ ?>
                 <li><a href="delivery.php">Delivery</a></li>
                <li><a href="task.php">Task</a></li>
                <li ><a href="profile.php">Profile</a></li>
                <li ><a href="logout_parse.php">Logout</a></li>

               <?php //}else{ ?>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="employee.php">Employee</a></li>
                <li><a href="delivery.php">Delivery</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="task.php">Task</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="users.php">Users</a></li>
                <li ><a href="profile.php">Profile</a></li>
                <li ><a href="logout_parse.php">Logout</a></li>
               <?php //} ?>
          </ul>
        </div>
      </div>
    </nav> -->
