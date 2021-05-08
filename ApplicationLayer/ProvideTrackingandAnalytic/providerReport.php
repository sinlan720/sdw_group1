<?php
session_start();
    // $_SESSION = [];
require_once '../../BusinessServiceLayer/controller/paymentController.php';
require_once '../../BusinessServiceLayer/controller/customerController.php';
require_once '../../BusinessServiceLayer/controller/runnerController.php';
require_once '../../BusinessServiceLayer/controller/trackingController.php';

$tracking = new trackingController();
$tracking_data = $tracking->viewTrackingList();
$runner_id = "";
$date = "";
if (is_array($tracking_data) || is_object($tracking_data)){
foreach ($tracking_data as $row1) {
  $tracking_id = $row1['tracking_ID'];
  $runner_id = $row1['runner_id'];
}
$status_data = $tracking->viewStatus($tracking_id);
foreach ($status_data as $roww) {
  $date = $roww['tracking_date'];
}

}
$runner = new runnerController();
$runner_data = $runner->viewRunner($runner_id);
$runner_name = "";
$runner_phone = "";

if (is_array($runner_data) || is_object($runner_data)){
foreach ($runner_data as $row2) {
  $runner_name = $row2['runner_name'];
  $runner_phone = $row2['runner_phone'];
}
}

$customer = new customerController();
$cust_data = $customer->viewCustomer();
foreach ($cust_data as $row3) {
  $name = $row3['cust_name'];
  $phone = $row3['cust_phone'];
}

$payment = new paymentController();
$data = $payment->viewPayment();
// $data = $cart->viewAll();


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
     <div style="background-image: url('../../images/shopcart.jpg');">
    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Service Provider</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManageMedicalInterface/medicalHome.php">Service Provider</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Service Provider Report</span>
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
            <h2 class="title">Report</h2>
          </div>
          <div class="card-body">
            <center>
              <form action="" method="POST">
              <table>
                <thead>
                  <th>Date</th>
                  <th>Customer Name</th>
                  <th>Phone</th>
                  <th>Product Name</th>
                  <th>Image</th>
                  <th>Runner Name</th>
                  <th>Runner Phone</th>
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
                    . "<td>".$date."</td>"
                    . "<td>".$name."</td>"
                    . "<td>".$phone."</td>"
                    . "<td>".$row['product_name']."</td>"
                    . "<td><img src=\"" .$isrc. $row['product_image'] . "\" height=\"130\" width=\"150\"> </td>"
                    . "<td>".$runner_name."</td>"
                    . "<td>".$runner_phone."</td>"
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

