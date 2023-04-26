<?php
// $action = $_GET['action'];
	
// $crud = new Admin();
// if($action == 'login'){
// 	$login = $crud->login();
// 	if($login)
// 		echo $login;
// }
	session_start();	
 	include '../module/admin_class.php';
	$admin = new Admin();
	$message = $admin->login();
	if($message ==="Successful"){
		header("Location: /view/admin/dashboard.html");
	}
	else {
		echo $message;
	}
	include '../view/admin/login.html';
?>