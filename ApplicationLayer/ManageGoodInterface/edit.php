<?php
require_once '../../BusinessServiceLayer/controller/goodController.php';
session_start();
$good_id = $_GET['good_id'];

$good = new goodController();
$data = $good->viewGood($good_id);

if(isset($_POST['update'])){
  $good->editGood();
}

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=../../ApplicationLayer/ManageLoginInterface/login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../view';</script>";
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
    include "../../includes/header.php";
    ?>

    <div style="background-image: url('../../images/goodList.jpg');">


    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Edit Good</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManageLoginInterface/index.php">Good List</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Edit Good</span>
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
        <h2 class="title">Edit Good</h2>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <?php
          foreach($data as $row){
            ?>
            <center><img src="../../images/<?php echo $row['good_image'];?>" height="130" width="150"></center>            
            <div class='form-row'>
              <div class='name'>ID: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="good_id" value="<?=$row['good_id']?>" readonly>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Name: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="name" value="<?=$row['good_name']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Details: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="details" value="<?=$row['good_details']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Price: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="price" value="<?=$row['good_price']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Quantity: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="quantity" value="<?=$row['good_quantity']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Image: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="file" name="image" value="<?=$row['good_image']?>" >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red" type="submit" name="update" value="UPDATE"> Update</button>
           <button class="btn btn--radius-2 btn--red"> <a href="goodList.php">Back</a></button>
          </center>
        </div>
      </form>
    </center>
  </section>
  <?php
}
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