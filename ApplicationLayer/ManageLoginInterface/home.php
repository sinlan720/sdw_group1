<?php
session_start();
    // $_SESSION = [];

// require_once '../controller/customerController.php';
if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../ManageLoginInterface/login.php';</script>";
}


?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php include"../../includes/head.php";?>
<style>
input {
  border-style: solid;
  border-color: grey;
}
</style>
<body>
<div class="wrapper" id="wrapper">
    <?php 
    if ($_SESSION['usergroup'] == 3){
      include "../../includes/headerR.php";
    }else if ($_SESSION['usergroup'] == 2){
      include "../../includes/headerP.php";  
    }else{
      include "../../includes/header.php";
    }
    ?>
</div>
<!-- End Slider Area -->
<!-- Start Service Area -->
<?php
if ($_SESSION['usergroup'] == 1 || 2){?>
 <div style="background-image: url('../../images/home.jpg');">
    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Home Page</h2>
              <nav class="bradcaump-inner">           
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<section class="type__category__area bg--white section-padding">
  <div class="container">
    <div class="row">
      <center><h2 class="title__line">What services do you like ?</h2></center>
    </div>
  </div>
</section>

<div class="good__category__wrapper mt--40">
<div style="background-image: url('../../images/h3.jpg'); background-size:900px 950px">
  <div class="row">
    
     <!-- Start Single Category -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="food__item foo">
        <div class="food__thumb">
          
          <?php
      if ($_SESSION['usergroup'] == 1) { ?>
      </div>
        <div>
            <a href="../../ApplicationLayer/ManageFoodInterface/foodList.php">
            <img src="../../images/food.png" alt="product images" width="500" height="333" style="margin-right: 125px; margin-left:109px;"> 
            </a>
            <div class="food__title">
              <h5><a href="../../ApplicationLayer/ManageFoodInterface/foodList.php" style="font-weight:bold; color:#8909DD; font-size:45px; padding:10px;  margin-left:215px; width: 200px;">Food Delivery</a></h5>
            </div>
        </div>
        <?php
      } elseif ($_SESSION['usergroup'] == 2) { ?>
      </div> 
        <div>
            <a href="../../ApplicationLayer/ManageFoodInterface/foodHome.php">  
            <img src="../../images/food.png" alt="product images" width="500" height="333" style="margin-right: 125px; margin-left:109px;">  
            </a>
            <div class="food__title">
              <h5><a href="../../ApplicationLayer/ManageFoodInterface/foodHome.php" style="font-weight:bold; color:#8909DD; font-size:45px; padding:10px;  margin-left:215px; width: 200px;">Food Delivery</a></h5>
            </div>
        </div>
        <?php
     }elseif ($_SESSION['usergroup'] == 3) { ?>
       </div> 
       <div>
            <a href="../../ApplicationLayer/ManageFoodInterface/foodHome.php">  
            <img src="../../images/food.png" alt="product images" width="500" height="333" style="margin-right: 125px; margin-left:109px;">  
            </a>
            <div class="food__title">
              <h5><a href="../../ApplicationLayer/ManageFoodInterface/foodHome.php" style="font-weight:bold; color:#8909DD; font-size:45px; padding:10px;  margin-left:215px; width: 200px;">Food Delivery</a></h5>
            </div>
        </div>
        <?php
     } ?>
      </div>
    </div>
    
    <!-- End Single Category -->
    <!-- Start Single Category -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="food__item foo">
        <div class="food__thumb">
          <a href="../../ApplicationLayer/ManageGoodInterface/goodHome.php">
            <img src="../../images/cloth.jpg" alt="product images" width="500" height="333" >
          </a>
        </div>
        <div class="food__title">
          <h6><a href="../../ApplicationLayer/ManageGoodInterface/goodHome.php" style="font-weight:bold; color:#8909DD; font-size:45px; margin-left:125px;">Good Delivery</a></h6>
        </div>
      </div>
    </div>
    <!-- End Single Category -->
    <!-- Start Single Category -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="food__item foo">
        <div class="food__thumb">
          <a href="../../ApplicationLayer/ManageMedicalInterface/medicalHome.php">
            <img src="../../images/medical.jpg" alt="product images" width="500" height="333" style="margin-right: 125px; margin-left:109px;>
          </a>
        </div>
        <div class="food__title">
          <h4><a href="../../ApplicationLayer/ManageMedicalInterface/medicalHome.php" style="font-weight:bold; color:#8909DD; font-size:45px;  margin-left:209px; border-radius: 50%;">Medical Delivery</a></h4>
        </div>
      </div>
    </div>
    <!-- End Single Category -->
    <!-- Start Single Category -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="food__item foo">
        <div class="food__thumbt">
          <a href="../../ApplicationLayer/ManagePetAssistInterface/petassistHome.php">
            <img src="../../images/pet.jpg" alt="product images" width="500" height="auto">
          </a>
        </div>
        <div class="food__title">
          <h3><a href="../../ApplicationLayer/ManagePetAssistInterface/petassistHome.php" style="font-weight:bold; color:#8909DD; font-size:45px;  margin-left:155px;">Pet Assist</a></h3>
        </div>
    </div>
</div>
</div>   
<?php
}else if ($_SESSION['usergroup'] == 3){?>
    <div style="background-image: url('../../images/home.jpg');">
      <div class="ht__bradcaump__wrap d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="bradcaump__inner text-center">
                <h2 class="bradcaump-title">Home Page</h2>
                <nav class="bradcaump-inner">         
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>

  <section class="type__category__area bg--white section-padding--lg">
    <div class="container">
      <div class="row">
        <center><h2 class="title__line">Service</h2></center>
      </div>
    </div>
  <div class="good__category__wrapper mt--40">
    <div class="row">
      <!-- Start Single Category -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="food__item foo">
          <div class="food__thumb">
            <a href="../ProvideTrackingandAnalytic/orderlist.php">
              <img src="../../images/main.jpg" alt="product images width="500" height="333"">
            </a>
          </div>
          <div class="food__title">
            <h2><a href="../../ProvideTrackingandAnalytic/orderlist.php">Order Delivery</a></h2>
          </div>
        </div>
      </div>
  </div>
  </section>
      <!-- End Single Category -->
  <?php
   }
   ?>

    <div class="grid-container">

        <a class="signup_waypoint"></a>

        <section class="">

            <ul class="hoverdir grid-items">

                <li class="box box--long">
                    <div class="box__scale--doublewidth">
                        <a href="/work/things-didnt-know-collection/">
                            <img class="display--above900" src="https://hungrysandwich.club/wp-content/uploads/2018/01/HSC-Banner-v3.gif" alt=""  width="1350" height="533">
                            <div class="overlaid blue" style="display: block; left: 0px; top: -100.5%; transition: all 330ms cubic-bezier(0.25, 0.1, 0.17, 1) 0s;"> 
                            </div>
                        </a>
                    </div>
             </ul>
        </section>
    </div>


   <?php if (empty($_SESSION['user'])) {
            echo "
            <div class='container'>
                <div class='service__wrapper bg--white'>
                    <div class='row'>
                        <div class='col-md-12 col-lg-12'>
                            <div class='section__title service__align--left'>
    
                                <h2 class='title__line'>Join our team right now!!</h2>
                            </div>
                        </div>
                    </div>
                    <div class='row mt--30' >
                        <!-- Start Single Service -->
                        <div class='col-sm-12 col-md-6 col-lg-4'>
                            <div class='service'>
                                <div class='service__title'>
                                    <div class='ser__icon'>
                                        <img src='../../images/sp.jpg' alt='icon image'>
                                    </div>
                                    <h2><a href='registration.php'>Join as service provider</a></h2>
                                </div>
                                <div class='service__details'>
                                    <p>Come and join us ! So would we! It's simple: we list your menu online, help you process orders, pick them up, and deliver them.</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Service -->
                        <!-- Start Single Service -->
                        <div class='col-sm-12 col-md-6 col-lg-4'>
                            <div class='service'>
                                <div class='service__title'>
                                    <div class='ser__icon'>
                                        <img src='../../images/runner.png' alt='icon image' width='250' height='200' >

                                    </div>
                                    <h2><a href='registration.php'>Join as runner</a></h2>
                                </div>
                                <div class='service__details'>
                                    <p>Would you like to join our delivery team to earn the extra money? Let's start as apart of our delivery team right now!!</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Service -->
                    </div>
                </div>
            </div>
        <!-- End Service Area -->";
   }?>




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
