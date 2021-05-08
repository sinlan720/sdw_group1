<?php
require_once '../../BusinessServiceLayer/controller/customerController.php';
require_once '../../BusinessServiceLayer/controller/providerController.php';
require_once '../../BusinessServiceLayer/controller/runnerController.php';
session_start();
$username = $_SESSION['username'];
$usergroup = $_SESSION['usergroup'];
	if ($usergroup == 1) {
		$cust_id = $_GET['cust_id'];
		$table_id = "cust_"; 
		$customer = new customerController();
		$data = $customer->viewCustomer($cust_id);
		if(isset($_POST['update'])){
			$customer->editCustomer();
			$_SESSION['username']=$_POST['username'];
		}
	} else if ($usergroup == 2) {
		$provider_id = $_GET['provider_id'];
		$table_id = "provider_";
		$provider = new providerController();
		$data = $provider->viewProvider($provider_id);
		if(isset($_POST['update'])){
			$provider->editProvider();
			$_SESSION['username']=$_POST['username'];
		}
	} else if ($usergroup == 3) {
		$runner_id = $_GET['runner_id'];
		$table_id = "runner_";
		$runner = new runnerController();
		$data = $runner->viewRunner($runner_id);
		if(isset($_POST['update'])){
			$runner->editRunner();
			$_SESSION['username']=$_POST['username'];
		}
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

		 <div style="background-image: url('../../images/profile.jpg');">

    <div class="ht__bradcaump__wrap d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="bradcaump__inner text-center">
              <h2 class="bradcaump-title">Service Delivery</h2>
              <nav class="bradcaump-inner">
                <a class="breadcrumb-item" href="index.php">Home</a>
                <span class="brd-separetor"><i class="zmdi zmdi-long-arrow-right"></i></span>
                <span class="breadcrumb-item active">Edit Profile</span>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

	</div>
</div>
<!-- End Slider Area -->
<!-- Start Service Area -->
<section class="type__category__area bg--white section-padding--lg">
	<div class="wrapper wrapper--w790">
		<div class="card card-5">
			<div class="card-heading">
				<?php if ($usergroup == 1) { ?>
					<h2 class="title">Customer Profile</h2>
				<?php } else if ($usergroup == 2) { ?>
					<h2 class="title">Provider Profile</h2>
				<?php } else if ($usergroup == 3) { ?>
					<h2 class="title">Runner Profile</h2>
				<?php } ?>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<?php
					foreach($data as $row){
						?>
						<div class='form-row'>
							<div class='name'>ID: </div>
							<div class='value'>
								<div class='input-group'>
									<?php if ($usergroup == 1) { ?>
										<input type="text" name="cust_id" value="<?=$row[''.$table_id.'id']?>" >
										<?php
									} else if ($usergroup == 2) { ?>
										<input type="text" name="provider_id" value="<?=$row[''.$table_id.'id']?>" >
										<?php
									} else if ($usergroup == 3) { ?>
										<input type="text" name="runner_id" value="<?=$row[''.$table_id.'id']?>" >
										<?php
									} ?>
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Name: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="name" value="<?=$row[''.$table_id.'name']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Email: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="email" name="email" value="<?=$row[''.$table_id.'email']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Tel No.: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="phone" value="<?=$row[''.$table_id.'phone']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Address line 1: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="address" value="<?=$row[''.$table_id.'address']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Address line 2: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="address2" value="<?=$row[''.$table_id.'address2']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>City: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="city" value="<?=$row[''.$table_id.'city']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>State: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="state" value="<?=$row[''.$table_id.'state']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Zipcode: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="zipcode" value="<?=$row[''.$table_id.'zipcode']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Username: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="username" value="<?=$row['username']?>" >
								</div>
							</div>
						</div>
						<div class='form-row'>
							<div class='name'>Password: </div>
							<div class='value'>
								<div class='input-group'>
									<input type="text" name="password" value="<?=$row['password']?>" >
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<center>
						<button class="btn btn--radius-2 btn--red" type="submit" name="update" value="UPDATE"> Update</button>
						<button class="btn btn--radius-2 btn--red"> <a href="profile.php">Back</a></button>
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