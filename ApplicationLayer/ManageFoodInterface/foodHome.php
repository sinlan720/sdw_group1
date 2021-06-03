<?php
session_start();
    // $_SESSION = [];

// require_once '../controller/customerController.php';
if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
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


  <div style="background-image: url('../../images/You Stay at Home.png');">

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Food's Homepage</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManageLoginInterface/index.php">Home</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Food's Homepage</span>
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

<section class="type__category__area bg--white section-padding">
 <!--<div style="background-image: url('../../images/.jpg');"> -->
<div class="wrapper wrapper--w790">
  <div class="card card-5">
    <div class="card-heading">
      <h2 class="title">Choose your Option</h2>
    </div>
    <div class="card-body">
     
        <?php
      if ($_SESSION['usergroup'] == 2) { ?>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red"> <a href="addFood.php">Add New Menu</a></button>
          </center>
        </div>
        <br></br>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red"> <a href="foodList.php">Manage Menu</a></button>
          </center>
        </div> 
        <?php
      }elseif ($_SESSION['usergroup'] == 3) { ?>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red"> <a href="foodDelivery.php">Manage Food Delivery</a></button>
          </center>
        </div> 
        <?php
      } ?>

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
