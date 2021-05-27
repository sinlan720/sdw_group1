<?php 
  session_start();
  // connect to database
  require_once '../../BusinessServiceLayer/libs/database.php';
  $db = mysqli_connect("localhost", "root", "", "SDW");

  $user_idd = $_GET["email"];
  $tokenn = $_GET["token"];
  $user_type = $_GET["user_type"];

  if (isset($_POST['submit_btn'])) {


      if($user_type=='customer'){
        require_once '..\..\BusinessServiceLayer\controller\customerController.php';
        $controller = new customerController();
        

        $customer = $controller->setPW($user_idd, $tokenn);

      }else if ($user_type=='provider'){
        require_once '..\..\BusinessServiceLayer\controller\providerController.php';
        $controller = new providerController();
        
        
        $provider = $controller->setPW($user_idd, $tokenn);
      
      }else {
        require_once '..\..\BusinessServiceLayer\controller\runnerController.php';
        $controller = new runnerController();
        
        
        $runner = $controller->setPW($user_idd, $tokenn);
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
                
          
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="wrapper wrapper--w790">
  <div class="card card-5">
    <div class="card-heading">
      <h2 class="title">Set New Password</h2>
    </div>
    <div class="card-body">

      <form method="post" action="">
        
        <div class='form-row'>
          <div class='name'>New Password: </div>
          <div class='value'>
            <div class='input-group'>
              <input type="text" name="password" value="<?php ?>" class="input--style-5">
            </div>
          </div>
        </div>

        <div class='form-row'>
          <div class='name'>Retype New Password: </div>
          <div class='value'>
            <div class='input-group'>
              <input type="text" name="password" value="<?php ?>" class="input--style-5">
            </div>
          </div>
        </div>
        
        

        
        <div>
        <center>
        <button class="btn btn--radius-2 btn--red" type="submit" name="submit_btn" value="Login"> Submit</button>
        </center>
        </div>

      </form>
    </div>
  </div>
</div>
</div>
</body>
</html>