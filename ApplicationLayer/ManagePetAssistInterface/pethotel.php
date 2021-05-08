<?php
session_start();
    // $_SESSION = [];
require_once '../../BusinessServiceLayer/controller/petController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
$pethotel = new pethotelController();
$cart = new cartController();
$data = $pethotel->viewAll(); 
$view_variable = 'a string here';

  if (!isset($_SESSION['username'])) {
    $message = "You must log in first";
        header('refresh:5; url=login.php');
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../view';</script>";
  }

  if (isset($_POST ['delete'])) {
    $pethotel->delete();
  }

  if(isset($_POST['buy'])){
    $cart->add();
    // console_log($view_variable);


    // $sql = "insert into cart(pethotelgroom_name, pethotelgroom_quantity, pethotelgroom_price, pethotelgroom_image) select pethotelgroom_name, pethotelgroom_quantity, pethotelgroom_price from pethotelgroom where pethotelgroom_id = 6";
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
  </div>


  <section class="type__category__area bg--white section-padding">
  <div style="background-image: url('../../images/h2.jpg');">
  <h1 class="bradcaump-title"  style="font-weight:bold; color:#000000; font-size:45px; ">PET ASSIST</h1>
  <nav class="bradcaump-inner">
                <a class="breadcrumb-item"  href="../../ApplicationLayer/ManagePetAssistInterface/petassistHome3.php" style="font-weight:bold; color:#000000; font-size:15px;">   PET ASSIST SERVICE</a>
        <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
        <span class="breadcrumb-item active" style="font-weight:bold; color:#000000; font-size:15px; ">PET HOTEL LIST</span>
  </nav>
  <div class="wrapper wrapper--w790">
    <div class="card card-5">
      <div class="card-heading">
        <h2 class="title">Pet Hotel List</h2>
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
            <th>Action</th>
            </thead>
            <?php
            $i = 1;
            foreach($data as $row){
              $image =  $row['pethotel_image'];
              $isrc = "../../images/";

               echo "<tr>"
                . "<td>".$row['pethotel_name']."</td>"
                . "<td><img src=\"" .$isrc. $row['pethotel_image'] . "\" height=\"130\" width=\"150\"> </td>"
                ."<td>RM".$row['pethotel_price']."</td>";                         
                       // . "<td>".$row['pethotelgroom_price']."</td>";
               ?>
            <td><form action="" method="POST">
              <?php
              if ($_SESSION['usergroup'] == 1) {
                  ?>
              <button class="btn btn--radius-2 btn--red" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManagePetAssistInterface/viewpethotel.php?pethotel_id=<?=$row['pethotel_id']?>'">View</button>
               <br></br>
              <input type="hidden" name="name" value="<?=$row['pethotel_name']?>">
              <input type="hidden" name="price" value="<?=$row['pethotel_price']?>">
              <input type="hidden" name="image" value="<?=$row['pethotel_image']?>">
              <input type="hidden" name="quantity" value="1">
              <button class="btn btn--radius-2 btn--red" type="submit" name="buy" value="BUY">Buy</button>
              <?php
            } elseif ($_SESSION['usergroup'] == 2){ ?>
              <button class="btn btn--radius-2 btn--red" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManagePetAssistInterface/viewpethotel.php?pethotel_id=<?=$row['pethotel_id']?>'">View</button>
              <br></br>
              <button class="btn btn--radius-2 btn--red"input type="button" name = "edit" value="Edit" onclick="location.href='../../ApplicationLayer/ManagePetAssistInterface/editpethotel.php?pethotel_id=<?=$row['pethotel_id']?>'">Edit</button>
              <br></br>
              <input type="hidden" name="pethotel_id" value="<?=$row['pethotel_id']?>"><button class="btn btn--radius-2 btn--red"input type="submit" name="delete" value="Delete">Delete</button>
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

