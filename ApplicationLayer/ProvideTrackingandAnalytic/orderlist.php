<?php
require_once '../../BusinessServiceLayer/controller/trackingController.php';
//require_once '../controller/orderController.php'
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
$data1 = $tracking->viewUnacceptedTask();
$data2 = $tracking->viewAcceptedTask();

if (isset($_POST['accept'])) {
    $tracking->acceptTask();
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
                <a class="breadcrumb-item" href="../../ApplicationLayer/ProvideTrackingandAnalytic/index.php">Home</a>
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
      <h2 class="title">Delivery List</h2>
    </div>
    <div class="card-body">
      <td align="center"><h2>PENDING</h2></td>
        <div>
          <center>
            <table>
              <thead>
              <td>NO</td>
              <td>ADDRESS</td>
              <td>ACTION</td>
              </thead>
              <tr>
               <?php
            $i = 1;
            foreach ($data1 as $row1) { ?>
          <form action="" method="POST">
          <tr>
            <input type="hidden" name="tracking_ID" value="<?=$row1['tracking_ID']?>">
            <td><?=$row1['tracking_ID']?></td>
            <td><?=$row1['shipping_address']?></td>
            <td>
              <button type="submit" class="btn--green btn radius 2" name="accept">Accept</button>
            </td>
            <?php
              $i++;
            }
            ?> 
          </tr>
        </form>
      </tr>
              <tr></tr>
          <td><h2>ON DELIVERY</h2></td>
          <center>
            <table>
              <thead>
              <td>NO</td>
              <td>ADDRESS</td>
              <td>ACTION</td>
              </thead>
              <tr>
                <?php
            $i = 1;
            foreach ($data2 as $row2) { ?>
              <form action="" method="POST">
          <tr>
            <td><?=$row2['tracking_ID']?></td>
            <td><?=$row2['shipping_address']?></td>
            <td>
              <input type="hidden" name="tracking_ID" value="<?= $row2['tracking_ID'] ?>">
              <button type="button" class="btn radius 2 btn--blue" onclick="location.href='../ProvideTrackingandAnalytic/updateorderlist.php?tracking_ID=<?= $row2['tracking_ID'] ?>'">Update</button>
            </td>
            <td>
              <button type="submit" class="btn radius 2 btn--red" name="reject">Reject</button>
            </td>
          <?php
            $i++;
            }
          ?>
          </center>
            </table>
        </div>
    </div>
  </div>
</div>

</form>
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
