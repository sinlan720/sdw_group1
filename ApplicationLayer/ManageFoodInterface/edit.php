<?php
require_once '../../BusinessServiceLayer/controller/foodController.php';
session_start();
$food_id = $_GET['food_id'];

$food = new foodController();
$data = $food->viewFood($food_id);

if(isset($_POST['update'])){
  $food->editFood();
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

<body>
  <div class="wrapper" id="wrapper">
    <?php 
    include "../../includes/header.php";
    ?>

    <div style="background-image: url('../../images/foodList.jpg');">

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Edit Food</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManageLoginInterface/index.php">Food List</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Edit Food</span>
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
        <h2 class="title">Edit Food</h2>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <?php
          foreach($data as $row){
            ?>
            <center><img src="../../images/<?php echo $row['food_image'];?>" height="130" width="150"></center>            
            <div class='form-row'>
              <div class='name'>ID: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="food_id" value="<?=$row['food_id']?>" readonly>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Name: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="name" value="<?=$row['food_name']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Details: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="details" value="<?=$row['food_details']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Price: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="price" value="<?=$row['food_price']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Quantity: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="quantity" value="<?=$row['food_quantity']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Image: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="image" value="<?=$row['food_image']?>" >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red" type="submit" name="update" value="UPDATE"> Update</button>
           <button class="btn btn--radius-2 btn--red"> <a href="foodList.php">Back</a></button>
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