<?php
session_start();
    // $_SESSION = [];

require_once '../../BusinessServiceLayer/controller/foodController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
$food = new foodController();
$cart = new cartController();
$data = $food->viewAll(); 
$view_variable = 'a string here';

  if (!isset($_SESSION['username'])) {
    $message = "You must log in first";
        header('refresh:5; url=../../ApplicationLayer/ManageLoginInterface/login.php');
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../view';</script>";
  }

  if (isset($_POST ['delete'])) {
    $food->delete();
  }

  if(isset($_POST['buy'])){
    $cart->add();
    // console_log($view_variable);


    // $sql = "insert into cart(food_name, food_quantity, food_price, food_image) select food_name, food_quantity, food_price from food where food_id = 6";
    //     // $args = [':name'=>$this->name, ':quantity'=>$this->quantity, ':price'=>$this->price];
    //     DB::run($sql,$args);
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
              <h2 class="bradcaump-title">Food List</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManageFoodInterface/foodHome.php">Food Delivery</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Food List</span>
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
               <button class="btn btn--radius-2 btn--red" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManageFoodInterface/view.php?food_id=<?=$row['food_id']?>'">View</button>
               <br></br>
              <input type="hidden" name="name" value="<?=$row['food_name']?>">
              <input type="hidden" name="price" value="<?=$row['food_price']?>">
              <input type="hidden" name="image" value="<?=$row['food_image']?>">
              <input type="hidden" name="quantity" value="1">
              <button class="btn btn--radius-2 btn--red" type="submit" name="buy" value="BUY">Buy</button>
               <br></br>
              <?php
            } elseif ($_SESSION['usergroup'] == 2){ ?>
              <button class="btn btn--radius-2 btn--red" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManageFoodInterface/view.php?food_id=<?=$row['food_id']?>'">View</button>
              <br></br>
              <button class="btn btn--radius-2 btn--red"input type="button" name = "edit" value="Edit" onclick="location.href='../../ApplicationLayer/ManageFoodInterface/edit.php?food_id=<?=$row['food_id']?>'">Edit</button>
                 <br></br>
              <input type="hidden" name="food_id" value="<?=$row['food_id']?>"><button class="btn btn--radius-2 btn--red"input type="submit" name="delete" value="Delete">Delete</button>
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

