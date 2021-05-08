<?php
session_start();
require_once '../../BusinessServiceLayer/controller/trackingController.php';
require_once '../../BusinessServiceLayer/controller/customerController.php';


$tracking = new trackingController();
$customer = new customerController();
$data1 = $tracking->viewTrackingList();
$cust_data = $customer->viewCustomer();
foreach ($cust_data as $row2) {
  $name = $row2['cust_name'];
  $phone = $row2['cust_phone'];
}

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=../../ApplicationLayer/ManageLoginInterface/login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../../ApplicationLayer/ManageLoginInterface/home.php';</script>";
}

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php include"../../includes/head.php";?>

<body>


  <div class="wrapper" id="wrapper">
    <?php 
    include "../../includes/header.php";
    ?>


 <div style="background-image: url('../../images/download.jpg');">

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Customer Track</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="index.php">Home</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Customer Track</span>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- End Slider Area -->
<!-- Start Service Area -->
<section class="type__category__area bg--white section-padding--lg">

<div class="wrapper wrapper--w790">
  <div class="card card-5">
    <div class="card-heading">
      <h2 class="title">Customer Track</h2>
    </div>
    <div class="card-body">
        <td align="center"><h2>Status</h2></td>
        <table>
       <thead>
              <td>Tracking ID</td>
              <td>Name</td>
              <td>Phone</td>
              <td>Address</td>
              <td>Action</td>
              </thead>
              <tr>
                <?php
                $i = 1;
                foreach ($data1 as $row1) {
                  ?>
                <form method="POST">
                  <td><?=$row1['tracking_ID']?></td>
                  <td><?=$name?></td>
                  <td><?=$phone?></td>
                  <td><?=$row1['shipping_address']?></td>
                  <td><button type="button" onclick="location.href='cust_trackStatus.php?tracking_ID=<?= $row1['tracking_ID'] ?>'">Status</button></td>
                </form>
                <?php
                $i++;
                echo "<tr>";
                }?>
          </center>
            </table>
    </div>
</body>

</html>