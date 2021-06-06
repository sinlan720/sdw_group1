<?php
session_start();
    // $_SESSION = [];

require_once '../../BusinessServiceLayer/controller/medicineController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
$medicine = new medicineController();
$cart = new cartController();
$data = $medicine->viewAll(); 
$view_variable = 'a string here';

  if (!isset($_SESSION['username'])) {
    $message = "You must log in first";
        header('refresh:5; url=../../ApplicationLayer/ManageLoginInterface/login.php');
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../view';</script>";
  }

  if (isset($_POST ['delete'])) {
    $medicine->delete();
  }

  if(isset($_POST['buy'])){
    $cart->add();

}

  if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    //search table column
    $query = "SELECT * FROM `medicine` WHERE CONCAT(`medicine_name`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
  else {
    $query = "SELECT * FROM `medicine`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "SDW");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php include"../../includes/head.php";?>
<style>
  td {
    font-size:20px; color:black; font-weight: bolder;
  }
  th {
    font-size:20px; color:black; font-weight: bolder;
  }
</style>
<body>


  <div class="wrapper" id="wrapper">
    <?php 
    include "../../includes/header.php";
    ?>


<div style="background-image: url('../../images/medical1.jpg');">
    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Search Medicine</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManageMedicalInterface/medicalHome.php">Medical Delivery</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Search Medicine</span>
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
        <h2 class="title">Search Medicine</h2>
      </div>
      <div class="card-body">
  <center>
    <!-- <div class="content_resize2"> -->
      <!-- <center> -->
        <form action="search.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Search Medicine Name, eg: Blackmores"><br><br>
            <input type="submit" style="height:40px; width: 150px; background-color:#CCCCFF;" name="search" value="Search Medicine"><br><br>
      <table>
            <thead>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th></th>
            <th>Action</th>
            </thead>
            <?php while($row = mysqli_fetch_array($search_result)):
              $image =  $row['medicine_image'];
              $isrc = "../../images/";

               echo "<tr>"
                . "<td>".$row['medicine_name']."</td>"
                . "<td><img src=\"" .$isrc. $row['medicine_image'] . "\" height=\"130\" width=\"150\"> </td>"
                ."<td>RM".$row['medicine_price']."</td>";                         
                       // . "<td>".$row['medicine_price']."</td>";
               ?>
                 <td></td>

            <td><form action="" method="POST">
              <?php
              if ($_SESSION['usergroup'] == 1) {
                  ?>
               <button class="btn btn--radius-2 btn--red" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManageMedicalInterface/view.php?medicine_id=<?=$row['medicine_id']?>'">View</button>
               <br></br>
              <input type="hidden" name="name" value="<?=$row['medicine_name']?>">
              <input type="hidden" name="price" value="<?=$row['medicine_price']?>">
              <input type="hidden" name="image" value="<?=$row['medicine_image']?>">
              <input type="hidden" name="quantity" value="1">
              <button class="btn btn--radius-2 btn--red" type="submit" name="buy" value="BUY">Buy</button>
               <br></br>

              <?php
            } elseif ($_SESSION['usergroup'] == 2){ ?>
              <button class="btn btn--radius-2 btn--red" input type="button" name="view" value="View" onclick="location.href='../../ApplicationLayer/ManageMedicalInterface/view.php?medicine_id=<?=$row['medicine_id']?>'">View</button>
              <br></br>
              <button class="btn btn--radius-2 btn--red" input type="button" name = "edit" value="Edit" onclick="location.href='../../ApplicationLayer/ManageMedicalInterface/edit.php?medicine_id=<?=$row['medicine_id']?>'">Edit</button>
               <br></br>
              <input type="hidden" name="medicine_id" value="<?=$row['medicine_id']?>"><button class="btn btn--radius-2 btn--red" input type="submit" name="delete" value="Delete">Delete</button>
               <br></br>

              <?php
            }?>
                </form></td>
              <?php endwhile;?>
        </table>
      </center>
      </div>
      <center>
      <button class="btn btn--radius-2 btn--red"> <a href="medicineList.php">Back</a></button> </center>
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

