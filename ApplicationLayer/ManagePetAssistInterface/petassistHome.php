<?php
session_start();
    // $_SESSION = [];

// require_once '../controller/customerController.php';
if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../view/login.php';</script>";
}


?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php include"../../includes/head.php";?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>
<style>
body  {
  background-image: url("../../images/h1.jpg");
  background-repeat: no-repeat;
  background-size:1920px 1080px;
}
</style>
<body>
    <div class="wrapper" id="wrapper">
        <?php 
            include "../../includes/header.php";
        ?>
        <!-- Start Slider Area -->
        
          <h1 class="bradcaump-title"  style="font-weight:bold; color:#000000; font-size:45px; ">PET ASSIST CATEGORY</h1>
          <nav class="bradcaump-inner">
                  <a class="breadcrumb-item"  href="../../ApplicationLayer/ManageLoginInterface/index.php" style="font-weight:bold; color:#000000; font-size:15px;">   HOME</a>
                  <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                  <span class="breadcrumb-item active" style="font-weight:bold; color:#000000; font-size:15px; ">PET ASSIST CATEGORY</span>
          </nav>
    
        <div class="slider__area slider--one">
            <div class="slider__activation--1">
                <!-- Start Single Slide -->
              <div class="slide halfscreen">
                <img src="../../images/pet1.png" alt="product" images width=auto height=auto style="float:right; margin-left:-25px; border:none;">
 <div class="col-md-3" >
			
            <div class="panel panel-default wow fadeInDown">
              <!-- Default panel contents -->
             <div class="panel-heading wow fadeInDown" style="font-weight:bold; font-size:30px; color:#000000; text-align:center;">Pet Assist Category </div>
				<br>
				<br>
              <a href="petassistHome2.php" class="btn btn-danger btn-sm pull-right wow fadeInDown"style="font-weight:bold; font-size:29px; color:#ffffff; text-align :right;">Grooming</a>
            </div>
            <br>
			<br>
			<br>
			  <div class="panel panel-default wow fadeInDown">
              <!-- Default panel contents -->
              <a href="petassistHome3.php" class="btn btn-danger btn-sm pull-right wow fadeInDown" style="font-weight:bold; font-size:29px; color:#ffffff; text-align :right;">Pet Hotels</a>
            </div>
			<br>
			<br>
			<br>
				<div class="panel panel-default wow fadeInDown">
              <!-- Default panel contents -->
              <a href="petassistHome4.php" class="btn btn-danger btn-sm pull-right wow fadeInDown" style="font-weight:bold; font-size:29px; color:#ffffff; text-align  :right;">Veterinary</a>
            </div>

			
        </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- End Slider Area -->
        <?php
        include "../../includes/footer.php";
        ?>
    </div><!-- //Main wrapper -->

</body>
</html>

    <!-- JS Files -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
</body>
</html>
