<?php
require_once '../../BusinessServiceLayer/controller/trackingController.php';
require_once '../../BusinessServiceLayer/controller/customerController.php';
date_default_timezone_set('Asia/Kuala_Lumpur');
session_start();
    // $_SESSION = [];

// require_once '../controller/customerController.php';
if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=../../ApplicationLayer/ManageLoginInterface/login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../../ApplicationLayer/ManageLoginInterface/home.php';</script>";
}

$tracking_ID = $_GET['tracking_ID'];

$customer = new trackingController();
$cust = $customer->custDetails($tracking_ID);

$tracking = new trackingController();
$data1 = $tracking->viewStatus($tracking_ID);

$status = new trackingController($tracking_ID);
$data2 = $status->viewProgress($tracking_ID);
$data3 = $status->viewProgress($tracking_ID);

$s=0;
foreach ($data3 as $row) {
$s++;
}

if (isset($_POST['update'])) {
    $status->updateProgress($tracking_ID);
}

if (isset($_POST['reject'])) {
  $tracking->rejectTask();
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


 <div style="background-image: url('../../images/main.jpg');">

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Runner Delivery</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="index.php">Home</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Runner Delivery</span>
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
      <h2 class="title">Update Delivery List</h2>
    </div>
    <div class="card-body">

    <table>
        <?php
        $i = 1;
        foreach ($cust as $row1) {
          ?>
          <tr>Tracking Number: <?=$row1['tracking_ID'] ?> </tr><br>
          <tr>Customer Name: <?=$row1['cust_name']?></tr><br>
          <tr>Customer Phone Number: <?=$row1['cust_phone']?></tr><br>
          <tr>Customer Shipping Address:<?=$row1['shipping_address']?></tr>
        <?php 

        }?>

      </table>
<br>

        <table>
        <form action="" method="POST">
        <tr>
        <td>Date: <input type="text" class="form-control" name="tracking_date" value="<?=date("Y-m-d") ?>" readonly></td>
        <td>Time:<input type="text" name="tracking_time" class="form-control" value="<?=date("H:i:s a") ?>" readonly></td>
        <td>Status:
        <select class="form-control" name="tracking_progress">
        <?php
        if($s==1){
        ?>
          <option value="" disabled>---Choose Status---</option>
          <option value="Order picked up" disabled selected>Order picked up</option>
          <option value="Runner on the way destination">Runner on the way destination</option>
          <option value="Runner arrived">Runner arrived</option>
        <?php
        }elseif($s==2){
        ?>
          <option value="" disabled>---Choose Status---</option>
          <option value="Order picked up" disabled>Order picked up</option>
          <option value="Runner on the way destination" disabled selected>Runner on the way destination</option>
          <option value="Runner arrived">Runner arrived</option>
        <?php
        }elseif($s==3){
        ?>
          <option value="" disabled>---Choose Status---</option>
          <option value="Order picked up" disabled>Order picked up</option>
          <option value="Runner on the way destination" disabled>Runner on the way destination</option>
          <option value="Runner arrived" disabled selected>Runner arrived</option>
        <?php
        }elseif($s==0){
        ?>
          <option value="" disabled selected>---Choose Status---</option>
          <option value="Order picked up" >Order picked up</option>
          <option value="Runner on the way destination" >Runner on the way destination</option>
          <option value="Runner arrived"  >Runner arrived</option>
        <?php
        }elseif($s>3){
        ?>
          <option value="" disabled >---Choose Status---</option>
          <option value="Order picked up" disabled>Order picked up</option>
          <option value="Runner on the way destination" disabled>Runner on the way destination</option>
          <option value="Runner arrived" disabled >Runner arrived</option>
          <option value="Runner arrived" disabled selected>---Completed---</option>         
        <?php
        }
        ?></</td>
        <!-- <input type="hidden" name="status_ID" value="<?= $i ?>"> -->
        
        <td><input type="hidden" name="tracking_ID" value="<?= $tracking_ID ?>">
        <?php
        if($s==0){
        ?>
        <button type="submit" class="btn btn--radius-2 btn--green" name="update">Update</button><br><br>
        <button type="submit" class="btn btn--radius 2 btn--red" name="reject">Reject</button>
        <?php
        }else{
        ?><button type="submit" class="btn btn--radius-2 btn--green" name="update">Update</button>
        <?php
        }
        ?>
        </td>
      </table>
      <br><br>
        <div>
          <center>
            <table>

              <thead>
              <td>Status</td>
              <td>Date</td>
              <td>Time</td>
              </thead>
              
              <?php
                $i = 1;
                foreach ($data2 as $row2) {
                  ?>
                  <tr>
                  <td><?=$row2['tracking_progress']?></td>
                  <td><?=$row2['tracking_date']?></td>
                  <td><?=$row2['tracking_time']?></td>
                  </tr>
                <?php
                $i++;
                }?>
            </table>
          
            
            <br>
            <button onclick="location.href='../../ApplicationLayer/ProvideTrackingandAnalytic/orderlist.php'" type="button" class="btn btn--radius-2 btn--blue">Back</button>
          </center>
        </div>
    </div>
  </div>
</div>
</div>

</section>
<?php
include "../../includes/footer.php";
?>


</div><!-- //Main wrapper -->
<!-- JS Files -->
<script src="js/vendor/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>

</body>
</html>
