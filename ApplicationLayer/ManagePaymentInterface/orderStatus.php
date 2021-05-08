<?php
session_start();
    // $_SESSION = [];
require_once '../../BusinessServiceLayer/controller/paymentController.php';

$payment = new paymentController();
$data = $payment->viewPayment();
// $data = $cart->viewAll();


if (!isset($_SESSION['username'])) {
  $message = "You must log in first";
  header('refresh:5; url=../../ApplicationLayer/ManageLoginInterface/login.php');
  echo "<script type='text/javascript'>alert('$message');
  window.location = '../view';</script>";
}

if(isset($_POST['update'])) {
    $cart->updateCart();
}

if (isset($_POST ['delete'])) {
  $cart->delete();
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
     <div style="background-image: url('../../images/shopcart.jpg');">
    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Order Status</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManageMedicalInterface/medicalHome.php">Order Status</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Order Status</span>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="type__category__area bg--white section-padding--lg">
      <div class="wrapper wrapper--w790">
        <div class="card card-5">
          <div class="card-heading">
            <h2 class="title">Orders</h2>
          </div>
          <div class="card-body">
            <center>
              <form action="" method="POST">
              <table>
                <thead>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Status</th>
                </thead>
                <?php
                if ($row['order_status'] = 1) {
                  $status = "Paid";
                }
                $i = 1;
                if (is_array($data) || is_object($data)){
                  foreach($data as $row){
                    $image =  $row['product_image'];
                    $isrc = "../../images/"; ?>
                    <form action="" method="POST">
                    <?php
                    echo "<tr>"
                    . "<td>".$row['product_name']."</td>"
                    . "<td><img src=\"" .$isrc. $row['product_image'] . "\" height=\"130\" width=\"150\"> </td>"
                    . "<td>".$row['product_price']."</td>"
                    . "<td>".$row['product_quantity']."</td>"
                    . "<td>".$row['product_quantity']*$row['product_price']."</td>"
                    . "<td>".$status."</td>";    ?>                     
                    </td>
                    <?php
                    $i++;
                    echo "</tr>";
                    ?>
                    </form>
                    <?php
                  }
                }                
                ?>
              </table>
              <br></br>
            </form>

            </center>
          </div>
        </div>
      </div>
    </section>
  </center>
</div>
</div>
</body>
</html>

