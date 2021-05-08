<?php 
	session_start();
	// connect to database
	require_once '../../BusinessServiceLayer/libs/database.php';
	$db = mysqli_connect("localhost", "root", "", "SDW");

	if (isset($_POST['login_btn'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$userType = mysqli_real_escape_string($db,$_POST['userType']);
		// $password = md5($password); // remember we hashed password before storing last time
		$sql = "SELECT * FROM $userType WHERE username='$username' AND password='$password'";
		$result = mysqli_query($db,$sql);
		if (!$result)
           echo(mysqli_error($db));
		if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_row($result);
            // if ($row[8] == 0) {
            //     $_SESSION['message'] = "Your account is not yet activated You will be activated shortly, you can try again shortly";
            // } else if ($row[12] == 2) {
            //     $_SESSION['message'] = "Your account is Banned , You can't Login";
            // } else {

            $_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
            $_SESSION['usergroup'] = $row[11];
            $_SESSION['userid'] = $row[0];
			header("location: ../../ApplicationLayer/ManageLoginInterface/home.php"); //redirect to the products page
            
            // }
		}else{
			$_SESSION['message'] = "Username/password combination incorrect";
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
                <a class="breadcrumb-item" href="index.php">Login</a>
          
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="wrapper wrapper--w790">
	<div class="card card-5">
		<div class="card-heading">
			<h2 class="title">Login</h2>
		</div>
		<div class="card-body">

			<form method="post" action="login.php">
				
				<div class='form-row'>
					<div class='name'>Username: </div>
					<div class='value'>
						<div class='input-group'>
							<input type="text" name="username" class="input--style-5">
						</div>
					</div>
				</div>
				<div class='form-row'>
					<div class='name'>Password: </div>
					<div class='value'>
						<div class='input-group'>
							<input type="password" name="password" class="input--style-5">
						</div>
					</div>
				</div>
				<div class='form-row'>
					<div class='name'>User Type: </div>
					<div class='value'>
						<div class='input-group'>
							<select name="userType" id="userType">
								<option value="">Choose user type</option>
								<option value="customer">Customer</option>
								<option value="provider">Provider</option>
								<option value="runner">Runner</option>
							</select>						
						</div>
					</div>
				</div>
				<div>
				<center>
				<button class="btn btn--radius-2 btn--red" type="submit" name="login_btn" value="Login"> Login</button>
				</center>
				</div>

			</form>
		</div>
	</div>
</div>
</div>
</body>
</html>