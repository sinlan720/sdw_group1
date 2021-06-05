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
              <th style="text-align: center;">Customer Details</th>
              <th>Tracking</th>
              <th> ID</th>
              <th style="text-align: center;">Action</th>
              </thead>

              <tbody>
              <?php
                $i = 1;
                foreach ($data1 as $row1) { ?>

                <tr>
                  <td><?=$row1['cust_name']?><br><?=$row1['cust_phone']?><br><?=$row1['shipping_address']?></td>
                  <td colspan="2" style="text-align: center;"><?=$row1['tracking_ID']?></td>
                  <td>
                    <form action="" method="POST">
                      <input type="hidden" name="tracking_ID" value="<?=$row1['tracking_ID']?>">
                      <button type="submit" class="btn--green btn radius 2" name="accept">Accept</button>
                    </form>
                  </td>
                </tr>
              <?php
                $i++;
                }
              ?> 
              
            </tbody>
            </table>
        </div>
        <br>
        
          <h2>ON DELIVERY</h2>
          <center>
            <table>
              <thead>
              <th style="text-align: center;">Customer Details</th>
              <th>Tracking</th>
              <th> ID</th>
              <th style="text-align: center;">Action</th>
              </thead>
              <?php
              $i = 1;
              foreach ($data2 as $row2) { ?>
              
              <tr>
                <td><?=$row2['cust_name']?><br><?=$row2['cust_phone']?><br><?=$row2['shipping_address']?></td>
                <td colspan="2" style="text-align: center;"><?=$row2['tracking_ID']?></td>
                <td>
                  <form action="" method="POST">
                    <input type="hidden" name="tracking_ID" value="<?= $row2['tracking_ID'] ?>">
                    <button type="button" class="btn radius 2 btn--blue" onclick="location.href='../ProvideTrackingandAnalytic/updateorderlist.php?tracking_ID=<?= $row2['tracking_ID'] ?>'">Update</button>
                    
                  </form>
                </td>
              </tr>
            
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
