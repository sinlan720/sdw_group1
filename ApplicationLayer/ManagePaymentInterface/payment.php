<?php
session_start();
    // $_SESSION = [];
require_once '../../BusinessServiceLayer/controller/customerController.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';
require_once '../../BusinessServiceLayer/controller/paymentController.php';
$cart = new cartController();
$customer = new customerController();
$payment = new paymentController();
$data = $cart->viewCart();
$cust_data = $customer->viewCustomer();
// $data = $cart->viewAll();
$total_quantity = 0;
$total_price = 0;


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
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body>
  <script src="https://www.paypal.com/sdk/js?client-id=AUBIN6bECGxdViV45De8qSTNM6QL2LVlNbqjdWaYYRwoMUsEatNvcwrL1C7YmBUAQ49h8GJhXKCXO-_j&currency=MYR">
        // Required. Replace SB_CLIENT_ID with your sandbox client ID.
      </script>
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
              <h2 class="bradcaump-title">Service Delivery</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="../../ApplicationLayer/ManageMedicalInterface/medicalHome.php">Service Delivery</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Cart</span>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

        <section class="type__category__area bg--white section-padding--lg">
           <div style="background-image: url('../../images/goodMenu.jpg');">
          <div class="wrapper wrapper--w790">
            <div class="card card-5">
              <div class="card-heading">
                <h2 class="title">Cart</h2>
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
                        <th>Action</th>
                      </thead>
                      <?php
                      $i = 1;
                      if (is_array($data) || is_object($data)){
                        foreach($data as $row){
                          $quantity = $row["product_quantity"];
                          $price = $row["product_price"] * $quantity;
                          $total_quantity += $quantity;
                          $total_price += $price;
                          $image =  $row['product_image'];
                          $isrc = "../../images/"; ?>
                          <form action="" method="POST">
                            <?php
                            echo "<tr>"
                            . "<td>".$row['product_name']."</td>"
                            . "<td><img src=\"" .$isrc. $row['product_image'] . "\" height=\"130\" width=\"150\"> </td>"
                            . "<td>".$row['product_price']."</td>"
                            . "<td><input type=\"number\" name=\"quantity\" value=\"".$row['product_quantity']."\"> </td>"
                            . "<td>".$price."</td>";    ?>                     
                            <td><button class="btn btn--radius-2 btn--red" type="submit" name="update" value="Update">Update</button>
                              <br></br>
                              <input type="hidden" name="cart_id" value="<?=$row['cart_id']?>"><button class="btn btn--radius-2 btn--red" type="submit" name="delete" value="Delete">Delete</button>
                              <br></br>
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
                      <tr>
                        <td><b>Total:</b></td>
                        <td></td>
                        <td></td>
                        <td><b><?=$total_quantity; ?></b></td>
                        <td><b>RM<?=$total_price; ?></b></td>
                        <td></td>
                      </tr>
                    </table>
                    <br></br>
                    <?php
                    foreach ($cust_data as $row2) {
                      $name = $row2['cust_name'];
                      $email = $row2['cust_email'];
                      $phone = $row2['cust_phone'];
                      $address1 = $row2['cust_address'];
                      $address2 = $row2['cust_address2'];
                      $city = $row2['cust_city'];
                      $state = $row2['cust_state'];
                      $zipcode = $row2['cust_zipcode'];
                    } ?>

                    <div id="paypal-button-container"></div>
                    <script>
                      paypal.Buttons({
                        createOrder: function(data, actions) {
                  // This function sets up the details of the transaction, including the amount and line item details.
                  return actions.order.create({
                    payer: {
                      email_address: '<?= $email ?>',
                      name: {
                        given_name: '<?= $name ?>'
                      },
                      address: {
                        address_line_1: '<?= $address1 ?>',
                        address_line_2: '<?= $address2 ?>',
                        admin_area_1: '<?= $state ?>',
                        admin_area_2: '<?= $city ?>',
                        postal_code: '<?= $zipcode ?>',
                        country_code: "MY"
                      }
                    },
                    purchase_units: [{
                      amount: {
                        currency_code: 'MYR',
                        value: '<?= $total_price ?>'
                      }
                    }]
                  });
                },
                onError: function(error) {
                  console.log(error);                      
                },
                onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                  // This function shows a transaction success message to your buyer.
                  alert('Transaction completed by ' + details.payer.name.given_name);
                  window.location.href = "../../ApplicationLayer/ManagePaymentInterface/successfulPay.php?cust_id=<?=$_SESSION['userid']?>"                  
                });
              }
            }).render('#paypal-button-container');
          </script>

        </form>

      </center>
    </div>
  </div>
</div>
</section>
</center>
</div>
</div>
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

