<?php
require_once '../../BusinessServiceLayer/controller/petController.php';
session_start();
$petvet_id = $_GET['petvet_id'];

$petvet = new petvetController();
$data = $petvet->viewpetvet($petvet_id);

if(isset($_POST['update'])){
  $petvet->editpetvet();
}

if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=login.php');
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
  </div>
</div>
<!-- End Slider Area -->
<!-- Start Service Area -->
<section class="type__category__area bg--white section-padding--lg">
  <div style="background-image: url('../../images/h2.jpg');">
  <div class="wrapper wrapper--w790">
    <div class="card card-5">
      <div class="card-heading">
        <h2 class="title">Edit Pet Assist Grooming</h2>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <?php
          foreach($data as $row){
            ?>
            <center><img src="../../images/<?php echo $row['petvet_image'];?>" height="130" width="150"></center>            
            <div class='form-row'>
              <div class='name'>ID: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="petvet_id" value="<?=$row['petvet_id']?>" readonly>
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Name: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="name" value="<?=$row['petvet_name']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Details: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="details" value="<?=$row['petvet_details']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Price: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="price" value="<?=$row['petvet_price']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Quantity: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="text" name="quantity" value="<?=$row['petvet_quantity']?>" >
                </div>
              </div>
            </div>
            <div class='form-row'>
              <div class='name'>Image: </div>
              <div class='value'>
                <div class='input-group'>
                  <input type="file" name="image" value="<?=$row['petvet_image']?>" >
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <center>
            <button class="btn btn--radius-2 btn--red" type="submit" name="update" value="UPDATE"> Update</button>
            <button class="btn btn--radius-2 btn--red"> <a href="viewpetgroom.php">Back</a></button>
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