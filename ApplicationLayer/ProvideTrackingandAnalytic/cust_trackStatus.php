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
$tracking = new trackingController();
$customer = new customerController();
$tracking_ID = $_GET['tracking_ID'];
$data = $tracking->viewProgress($tracking_ID);
$cust_data = $customer->viewCustomer();
foreach ($cust_data as $row2) {
  $name = $row2['cust_name'];
  $phone = $row2['cust_phone'];
}



if (isset($_POST['received'])){
  $tracking->updateDeliveryStatus();
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
              <h2 class="bradcaump-title">Customer</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="index.php">Home</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Customer Track Status</span>
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
        <div>
          <center>
            <table>
              <thead>
              <td>Tracking No</td>
              <td>Name</td>
              <td>Phone</td>
              <td>DATE</td>
              <td>Time</td>
              <td>Process</td>
              <td>Action</td>
              </thead>
              <tr>
                <?php
                $i = 1;
                if (is_array($data) || is_object($data)){
                foreach ($data as $row) {?>
                  <td><?=$row['tracking_ID']?></td>
                  <td><?=$name?></td>
                  <td><?=$phone?></td>
                  <td><?=$row['tracking_date']?></td>
                  <td><?=$row['tracking_time']?></td>
                  <td><?=$row['tracking_progress']?></td>
                  <input type="hidden" name="tracking_ID" value="<?=$row['tracking_ID']?>">
                  <td><form method="POST"><button type="submit" name="received" value="<?= $TrackID ?>">Confirm Received</button></form></td>
                  <?php
                  $i++;
                }
              }
                ?>            
          </center>
            </table>
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
