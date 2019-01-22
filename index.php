<?php include 'includes/header.php';?>

  <!-- Content Wrapper. Contains page content -->    <section class="content-header">
     <h1>
       Dashboard
       <small>Version 2.0</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Dashboard</li>
     </ol>
   </section>
   <!-- Main content -->
   <section class="content">
     <!-- Info boxes -->
     <!-- Small boxes (Stat box) -->
         <div class="row">
           <div class="col-lg-3 col-xs-6">
             <!-- small box -->
             <div class="small-box bg-aqua">
               <div class="inner">
                <h3> <?php
                $host = 'ec2-107-22-238-186.compute-1.amazonaws.com';
                $username = 'aygabyyzeffuhq';
                $password = '7ca7fb3752582bea0df33ecbdccf6dfb208ed85b4c0ee490421ead59aa7ddf1b';
                $database = 'dc9f8mgkpa0jsi';
                $port ='5432';
                $connect = mysqli_connect($host, $database, $username, $password);
                echo $sql = "SELECT * FROM users";
                $result = mysqli_query($connect, $sql);
                echo mysqli_num_rows($result);?></h3>
                 <p>Products</p>
               </div>
               <div class="icon"><p></p>
                 <i class="ion ion-bag"></i>
               </div>
               <a href="products.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-xs-6">
             <!-- small box -->
             <div class="small-box bg-green">
               <div class="inner">
                 <h3> <?php $count=mysqli_query($object->connect,"SELECT * FROM orders ");
                  echo $count->num_rows;?></h3>
                 <p>Orders</p>
               </div>
               <div class="icon">
                 <p></p>
                 <i class="fa  fa-opencart"></i>
               </div>
               <a href="orders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-xs-6">
             <!-- small box -->
             <div class="small-box bg-yellow">
               <div class="inner">
                 <h3> <?php $count=mysqli_query($object->connect,"SELECT * FROM deliveries ");
                  echo $count->num_rows;?></h3>
                 <p>Delivery</p>
               </div>
               <div class="icon">
                 <p></p>
                 <i class="fa fa-truck"></i>
               </div>
               <a href="delivery.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
           <div class="col-lg-3 col-xs-6">
             <!-- small box -->
             <div class="small-box bg-red">
               <div class="inner">
                 <h3> <?php $count=mysqli_query($object->connect,"SELECT * FROM task ");
                  echo $count->num_rows;?></h3>
                 <p>Task</p>
               </div>
               <div class="icon"><p></p>
                 <i class="fa fa-tasks"></i>
               </div>
               <a href="task.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
             </div>
           </div>
           <!-- ./col -->
         </div>
         <!-- /.row -->
   </section>




<?php
include 'includes/footer.php';
?>
>>>>>>> 348c139e2bbd18748e499cc4d7f20e1f2b097a4b
