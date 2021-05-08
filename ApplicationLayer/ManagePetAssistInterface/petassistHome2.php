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


  <div style="background-image: url('../../images/h1.jpg');">

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">PET ASSIST SERVICE</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManagePetAssistInterface/petassistHome.php">PET ASSIST CATEGORY</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">PET ASSIST SERVICE</span>
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
 <div style="background-image: url('../../images/goodMenu.jpg');">
<div class="wrapper wrapper--w790">
  <div class="card card-5">
    <div class="card-heading">
      <h2 class="title">PET GROOMING SERVICES</h2>
    </div>
    <div class="card-body">
      <?php
      if ($_SESSION['usergroup'] == 1) {
        ?>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red"> <a href="../../ApplicationLayer/ManagePetAssistInterface/petgroom.php">PET GROOMING LIST</a></button>
            <button class="btn btn--radius-2 btn--red"> <a href="https://www.google.com/maps/@3.8132351,103.2872428,13.08z?hl=en">Pet Location Request</a></button>
           
          </center>
        </div>
        <?php
      } elseif ($_SESSION['usergroup'] == 2) { ?>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red"> <a href="addpetgroom.php">Add Pet Grooming</a></button>
          </center>
        </div>
        <br></br>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red"> <a href="petgroom.php">Manage Pet Grooming</a></button>
          </center>
        </div> 
        <?php
      }elseif ($_SESSION['usergroup'] == 3) { ?>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red"> <a href="petgroom.php">Manage Pet Grooming</a></button>
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
