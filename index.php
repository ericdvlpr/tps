<<<<<<< HEAD
<?php include 'includes/header.php';



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank pagesssssss
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank pagesssss</li><?php
        
         }
         ?>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Start creating your amazing application!
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->



<?php
include 'includes/footer.php';
?>
=======
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
                <h3> <?php $count=mysqli_query($object->connect,"SELECT * FROM products ");
                 echo $count->num_rows;?></h3>
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
