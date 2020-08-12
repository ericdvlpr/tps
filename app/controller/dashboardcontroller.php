<?php 

include '../../app/dashboard.php';


class DashboardController extends Dashboard {

  public function displayProductCount(){
   $products = $this->productCount();
   return $products['productCount'];
  } 
}