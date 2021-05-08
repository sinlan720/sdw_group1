<?php

	session_start();
	session_unset();
	session_destroy();
	header("location: ../../ApplicationLayer/ManageLoginInterface/login.php");

?>