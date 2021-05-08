<?php
session_start();
  if (isset($_GET['logout-submit']) && $_GET['logout-submit'] == 'logout') {
    unset($_SESSION['username']);
    $_SESSION = [];
	session_destroy();
    header("location: login.php");
  }

  ?>