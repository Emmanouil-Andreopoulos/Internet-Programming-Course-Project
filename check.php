<?php
	session_start();
	if(!isset($_SESSION['username']) || $_SESSION['username']=="")
	{
                $_SESSION['errorm']="Παρακαλώ συνδεθείτε για να δείτε την σελίδα";
		header("location: login.php");
		exit;
                
	}
?>