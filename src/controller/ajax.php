<?php
$action = $_GET['action'];
require 'admin_class.php';

$crud = new Admin();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
?>