<?php
require_once '../../BusinessServiceLayer/controller/customerController.php';
require_once '../../BusinessServiceLayer/controller/providerController.php';
require_once '../../BusinessServiceLayer/controller/runnerController.php';

session_start();
$customer = new customerController();
$provider = new providerController();
$runner = new runnerController();

if(isset($_POST['register'])){
    $usergroup = $_POST['usergroup'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password == $password2) {
        if ($usergroup == 1) {
            $customer->add();
        }
        else if ($usergroup == 2) {
            $provider->add();
        }
        else if ($usergroup == 3) {
            $runner->add();
        }
    }else {
        $_SESSION['message'] = "The passwords don't match";
    }
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
        <center>
            <?php 
            include "../../includes/1header.php";
            if (isset($_SESSION['message'])) {
                echo "<div id='error_msg'>".$_SESSION['message']."</div>";
                unset($_SESSION['message']);
            }
            ?>
        </center>
         <div style="background-image: url('../../images/login.png');">

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Welcome to ECRS</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="index.php">Registration</a>
         
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>


        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registration</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST">


                        <div class='form-row'>
                            <div class='name'>Name: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="text" name="name" class="input--style-5" required>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='name'>Email: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="email" name="email" class="input--style-5" required>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='name'>Tel No.: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="text" name="phone"  class="input--style-5"  onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                </div>
                            </div>
                        </div>
                <div class='form-row'>
                            <div class='name'>Address Line 1: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="text" name="address" class="input--style-5" required>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='name'>Address Line 2: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="text" name="address2" class="input--style-5" required>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='name'>City: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="text" name="city" class="input--style-5" required>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='name'>State: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="text" name="state" class="input--style-5" required>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='name'>Zipcode: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="text" name="zipcode" class="input--style-5" required>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='name'>Username: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="text" name="username" class="input--style-5" required>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='name'>Password: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="password" name="password" class="input--style-5" required>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='name'>Retype Password: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <input type="password" name="password2" class="input--style-5" required>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='name'>User Type: </div>
                            <div class='value'>
                                <div class='input-group'>
                                    <select name="usergroup" id="usergroup">
                                        <option value="">Choose user type</option>
                                        <option value="1">Customer</option>
                                        <option value="2">Provider</option>
                                        <option value="3">Runner</option>
                                    </select>                       
                                </div>
                            </div>
                        </div>
                        <div>
                            <center>
                                <button class="btn btn--radius-2 btn--red" type="submit" name="register" value="Register"> Register</button>
                                <button class="btn btn--radius-2 btn--red" type="submit" name="reset" value="Reset"> Reset</button>
                            </center>
                        </div>
                    </form>
                </center>
            </body>
            </html>
