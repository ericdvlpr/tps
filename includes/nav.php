<nav class="navbar navbar-inverse navbar-fixed-top">
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
                 

                 <?php if($_SESSION["access"]==1){?>
                <li><a href="customer.php">Customer</a></li>
                <li><a href="employee.php">Employee</a></li>
                <li><a href="delivery.php">Delivery</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="task.php">Task</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li ><a href="profile.php">Profile</a></li>
                <li ><a href="logout_parse.php">Logout</a></li>
                <?php }elseif ($_SESSION["access"]==2) {
                 ?>
                <li><a href="task.php">Task</a></li>
                <li ><a href="profile.php">Profile</a></li>
                <li ><a href="logout_parse.php">Logout</a></li>
                 <?php }elseif ($_SESSION["access"]==3){ ?>
                 <li><a href="delivery.php">Delivery</a></li>
                <li><a href="task.php">Task</a></li>
                <li ><a href="profile.php">Profile</a></li>
                <li ><a href="logout_parse.php">Logout</a></li>
                
               <?php }else{ ?>
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
               <?php } ?>
          </ul>
        </div>
      </div>
    </nav>