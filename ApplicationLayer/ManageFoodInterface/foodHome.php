<?php
session_start();
    // $_SESSION = [];

require_once '../../BusinessServiceLayer/controller/foodController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
$food = new foodController();
$cart = new cartController();
$data = $food->viewAll(); 
$view_variable = 'a string here';

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


  <div style="background-image: url('../../images/foodList.jpg');">

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Food Delivery</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManageLoginInterface/index.php">Home</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Food Delivery</span>
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
      <h2 class="title">Food Delivery Services</h2>
    </div>
    <div class="card-body">
      <?php
      if ($_SESSION['usergroup'] == 1) {
        ?>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red"> <a href="foodList.php">Food List</a></button>
           
          </center>
        </div>
        <?php
      } elseif ($_SESSION['usergroup'] == 2) { ?>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red"> <a href="addFood.php">Add Food</a></button>
          </center>
        </div>
        <br></br>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red"> <a href="foodList.php">Manage Food</a></button>
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

<section class="type__category__area bg--white section-padding">
 <div style="background-image: url('../../images/goodMenu.jpg');">
  <div class="wrapper wrapper--w790">
    <div class="card card-5">
      <div class="card-heading">
        <h2 class="title">Food List</h2>
      </div>
      <div class="card-body">
  <center>
    <!-- <div class="content_resize2"> -->
      <!-- <center> -->
      <table>
            <thead>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th></th>
            <th>Action</th>
            </thead>
            <?php
            $i = 1;
            foreach($data as $row){
              $image =  $row['food_image'];
              $isrc = "../../images/";

               echo "<tr>"
                . "<td>".$row['food_name']."</td>"
                . "<td><img src=\"" .$isrc. $row['food_image'] . "\" height=\"130\" width=\"150\"> </td>"
                ."<td>RM".$row['food_price']."</td>";                         
                       // . "<td>".$row['food_price']."</td>";
               ?>
                 <td></td>
            <td><form action="" method="POST">
              <?php
              if ($_SESSION['usergroup'] == 1) {
                  ?>
               <button class="btn btn--radius-2 btn--red" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManageFoodInterface/view.php?food_id=<?=$end['food_id']?>'">View</button>
               <br></br>
              <input type="hidden" name="name" value="<?=$row['food_name']?>">
              <input type="hidden" name="price" value="<?=$row['food_price']?>">
              <input type="hidden" name="image" value="<?=$row['food_image']?>">
              <input type="hidden" name="quantity" value="1">
              <button class="btn btn--radius-2 btn--red" type="submit" name="buy" value="BUY">Buy</button>
               <br></br>
             
             
              <?php
            }?>

                </form></td>
              <?php
              $i++;
             echo "</tr>";
            }
            ?>
        </table>
      </center>
      </div>
    </center>
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
