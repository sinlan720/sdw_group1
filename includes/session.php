<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: ../../ApplicationLayer/ManageLoginInterface/index.php');
	}
	if(isset($_SESSION['userType']))
	{
		$userType=$_SESSION['userType'];
		
		if($userType=="admin")
		{
			$sql = "SELECT * FROM admin WHERE Username = '".$_SESSION['user']."'";
			$query = $conn->query($sql);
			$user = $query->fetch_assoc();
		}
		elseif ($userType=="customer")
		{
			$sql = "SELECT * FROM customer WHERE Username = '".$_SESSION['user']."'";
			$query = $conn->query($sql);
			$user = $query->fetch_assoc();
		}
		elseif ($userType=="serviceprovider")
		{
			$sql = "SELECT * FROM serviceprovider WHERE Username = '".$_SESSION['user']."'";
			$query = $conn->query($sql);
			$user = $query->fetch_assoc();
		}
		elseif ($userType=="runner")
		{
			$sql = "SELECT * FROM runner WHERE Username = '".$_SESSION['user']."'";
			$query = $conn->query($sql);
			$user = $query->fetch_assoc();
		}
	}

	
	
?>