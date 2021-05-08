<?php
require_once '../../BusinessServiceLayer/controller/foodController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
session_start();

$food_id = $_GET['food_id'];
$food = new foodController();
$cart = new cartController();
$data = $food->viewFood($food_id); 
$name = $_GET['food_id'];

  if (!isset($_SESSION['username'])) {
    $message = "You must log in first";
        header('refresh:5; url=../../ApplicationLayer/ManageLoginInterface/login.php');
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../view';</script>";
  }

    if (isset($_POST ['buy'])) {
    $cart->add();
  }

    if (isset($_POST ['delete'])) {
    $food->delete();
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
              <h2 class="bradcaump-title">Food View</h2>
                 <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="foodList.php">Food Delivery</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Food List</span>
              
              </nav>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <section class="type__category__area bg--white section-padding">
     <div style="background-image: url('../../images/goodMenu.jpg');">

  <div class="wrapper wrapper--w790">
    <div class="card card-5">
      <div class="card-heading">
        <h2 class="title">View Food</h2>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <?php
          foreach($data as $row){
            ?>
            <center><img src="../../images/<?php echo $row['food_image'];?>" height="130" width="150"></center>
            <div class='form-row'>
              <div class='name'>Name: </div>
              <div class='value'>
                <div class='input-group'>
                  <?=$row['food_name']?>
                </div>
              </div>
              </div>
              <div class='form-row'>
              <div class='name'>Details: </div>
              <div class='value'>
                <div class='input-group'>
                  <?=$row['food_details']?>
                </div>
              </div>
              </div>
              <div class='form-row'>
              <div class='name'>Price: </div>
              <div class='value'>
                <div class='input-group'>
                  <?=$row['food_price']?>
                </div>
              </div>
              </div>
              <div class='form-row'>
              <div class='name'>Quantity: </div>
              <div class='value'>
                <div class='input-group'>
                  <?=$row['food_quantity']?>
                </div>
              </div>
              </div>
              <div>
                 <center></center>
                <center>
                  

                  <?php
                  if ($_SESSION['usergroup'] == 1) {
                    ?>
                    <input type="hidden" name="name" value="<?=$row['food_name']?>">
                    <input type="hidden" name="price" value="<?=$row['food_price']?>">
                    <input type="hidden" name="image" value="<?=$row['food_image']?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="total" value="<?=$row['food_price']?>">
                    <button class="btn btn--radius-2 btn--red" type="submit" name="buy" value="Add to Cart"> Add to Cart </button>
                   

                    <?php
                  } elseif ($_SESSION['usergroup'] == 2){ ?>
                    <button class="btn btn--radius-2 btn--red"> <a href="edit.php?food_id=<?=$row['food_id']?>">Edit</a></button>
                    <input type="hidden" name="food_id" value="<?=$row['food_id']?>">
                    <button class="btn btn--radius-2 btn--red" type="submit" name="delete" value="Delete"> Delete </button>
                    <button class="btn btn--radius-2 btn--red" > <a href="foodList.php">Back</a></button>
                    <?php
                  }?>
                </center>
              </div>
                </form></td>
            <?php } ?>
</section>
</style>
</center>
</div>
</form>
</div>
</div>
</div>
</section>

<?php
include "../../includes/footer.php";
?>


</div><!-- //Main wrapper -->
<!-- JS Files -->
<script src="../../js/vendor/jquery-3.2.1.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/plugins.js"></script>
<script src="../../js/active.js"></script>


</body>
</html>
