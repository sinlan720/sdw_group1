<?php
require_once '../../BusinessServiceLayer/controller/trackingController.php';
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

$tracking = new trackingController();
$data1 = $tracking->viewStatus($tracking_ID);

$status = new trackingController($tracking_ID);
$data2 = $status->viewProgress($tracking_ID);

if (isset($_POST['update'])) {
    $status->updateProgress($tracking_ID);
}
if (isset($_POST['update2'])) {
    $status->updateProgress2($tracking_ID);
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
        foreach ($data1 as $row1) {
          ?>
          <td>Tracking Number: <?=$row1['tracking_ID'] ?></td>
        <?php 

        }?>
        <form action="" method="POST">
        <tr>
        <td>Date: <input type="text" class="form-control" name="tracking_date" value="<?=date("Y-m-d") ?>" readonly></td>
        <td>Time:<input type="text" name="tracking_time" class="form-control" value="<?=date("H:i:s a") ?>" readonly></td>
        <td>Status:
        <select class
        ="form-control" name="tracking_progress">
          <option value="" disabled selected>---Choose Status---</option>
          <option value="Service order processing">Service order processing</option>
          <option value="Runner on the way destination">Runner on the way destination</option>
          <option value="Runner arrived">Runner arrived</option>
        </select></td>
        <!-- <input type="hidden" name="status_ID" value="<?= $i ?>"> -->
        <input type="hidden" name="tracking_ID" value="<?= $tracking_ID ?>">
        <td><button type="submit" class="btn btn--radius-2 btn--blue" name="update">Update</button></td>
      </table>
      <br><br><br>
        <div>
          <center>
            <table>

              <thead>
              <td>DATE</td>
              <td>TIME</td>
              <td>Status</td>
              </thead>
              <tr>
                <?php
                $i = 1;
                foreach ($data2 as $row2) {
                  ?>
                  <td><?=$row2['tracking_date']?></td>
                  <td><?=$row2['tracking_time']?></td>
                  <td><?=$row2['tracking_progress']?></td>
        <td><button type="submit" class="btn btn--radius-2 btn--blue" name="update2">Update2</button></td>
                <?php
                $i++;
                echo "<tr>";
                }?>
          </center>
            </table>
              <button type="button" class="btn btn--radius-2 btn--red" onclick="location.href='orderlist.php?runner_id=<?=$_SESSION['runner_id']?>">CANCEL</button>
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
