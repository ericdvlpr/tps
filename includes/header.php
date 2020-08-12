<!-- Developed by: ERIC PAUL JAUCIAN -->
 <?php
 include '../../app/controller/dashboardcontroller.php';
 $dashboard = new DashboardController();
 // if(!isset($_SESSION["access"])){
 //   header('location:../login.php');
 // }
 ?>
 <html>
      <head>
   		<title>Transaction Processing System</title>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      
      <!-- <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
      <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
     
      <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
      
      <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->
      <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
      <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

      </head>
      </head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
        <?php include '../../includes/nav.php'; ?>
        <?php include '../../includes/sidemenu.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
