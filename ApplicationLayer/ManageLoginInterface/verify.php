<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sdw";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}

	if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['token']) && !empty($_GET['token'])){
    	$email = $_GET['email']; // Set email variable
    	$token = $_GET['token']; // Set hash variable
    	
    	$sql = "SELECT cust_email, token, verified FROM customer WHERE cust_email='".$email."' AND token='".$token."' AND verified='0'";
    	$result = $conn->query($sql);


		
		if($result->num_rows > 0){
			$sql = "UPDATE customer SET verified='1' WHERE cust_email='".$email."' AND token='".$token."' AND verified='0'";
    		$conn->query($sql);
    		$message = "Your account has been activated, you can now login";
    		echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
		}else{
    		// No match -> invalid url or account has already been activated.
    		$message = "The url is either invalid or you already have activated your account.";
    		echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
		}

	}else{
    // Invalid approach
		$message = "Invalid approach, please use the link that has been send to your email.";
		echo "<script type='text/javascript'>alert('$message');
                window.location = '../../ApplicationLayer/ManageLoginInterface/home.php';</script>";
	}
?>