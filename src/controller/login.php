<?php
	session_start();	
 	include '../module/admin_class.php';
	$admin = new Admin();
	$message = $admin->login();
	if($message ==="Successful"){
		header("Location: /?type=admin&page=");
	}
	else {
		echo $message;
	}
	include '../view/admin/login.html';
?>