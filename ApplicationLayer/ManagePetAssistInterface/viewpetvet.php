<?php
require_once '../../BusinessServiceLayer/controller/petController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
session_start();

$petvet_id = $_GET['petvet_id'];
$petvet = new petvetController();
$cart = new cartController();
$data = $petvet->viewpetvet($petvet_id); 
$name = $_GET['petvet_id'];

  if (!isset($_SESSION['username'])) {
    $message = "You must log in first";
        header('refresh:5; url=login.php');
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../view';</script>";
  }

    if (isset($_POST ['buy'])) {
    $cart->add();
  }
    if (isset($_POST ['delete'])) {
    $petvet->delete();
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


  </div>
  <section class="type__category__area bg--white section-padding--lg">
  <div style="background-image: url('../../images/h2.jpg');">>  
  <div class="wrapper wrapper--w790">
    <div class="card card-5">
      <div class="card-heading">
        <h2 class="title">View Pet Veterinary</h2>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <?php
          foreach($data as $row){
            ?>
            <center><img src="../../images/<?php echo $row['petvet_image'];?>" height="130" width="150"></center>
            <div class='form-row'>
              <div class='name'>Name: </div>
              <div class='value'>
                <div class='input-group'>
                  <?=$row['petvet_name']?>
                </div>
              </div>
              </div>
              <div class='form-row'>
              <div class='name'>Details: </div>
              <div class='value'>
                <div class='input-group'>
                  <?=$row['petvet_details']?>
                </div>
              </div>
              </div>
              <div class='form-row'>
              <div class='name'>Price: </div>
              <div class='value'>
                <div class='input-group'>
                  <?=$row['petvet_price']?>
                </div>
              </div>
              </div>
              <div class='form-row'>
              <div class='name'>Quantity: </div>
              <div class='value'>
                <div class='input-group'>
                  <?=$row['petvet_quantity']?>
                </div>
              </div>
              </div>
              <div>
                <center>
                  <?php
                  if ($_SESSION['usergroup'] == 1) {
                    ?>
                    <input type="hidden" name="name" value="<?=$row['petvet_name']?>">
                    <input type="hidden" name="price" value="<?=$row['petvet_price']?>">
                    <input type="hidden" name="image" value="<?=$row['petvet_image']?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="total" value="<?=$row['petvet_price']?>">
                    <button class="btn btn--radius-2 btn--red" type="submit" name="buy" value="Add to Cart"> Add to Cart </button>
                    <?php
                  } elseif ($_SESSION['usergroup'] == 2){ ?>
                    <button class="btn btn--radius-2 btn--red"> <a href="editpetvet.php?petvet_id=<?=$row['petvet_id']?>">Edit</a></button>
                    <input type="hidden" name="petvet_id" value="<?=$row['petvet_id']?>">
                    <button class="btn btn--radius-2 btn--red" type="submit" name="delete" value="Delete"> Delete </button>
                    <button class="btn btn--radius-2 btn--red" > <a href="petgroom.php">Back</a></button>
                    <?php
                  }?>
                </center>
              </div>
                </form></td>
            <?php } ?>
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
