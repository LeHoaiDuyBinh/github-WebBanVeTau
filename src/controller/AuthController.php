<?php
	session_start();	
 	// include '../module/User.php';
	// $user = new User();
	// $Email = $_POST['Email'];
	// $password = $_POST['Password'];
	// $message = $user->login($Email, $password);
	// if($message ==="Successful"){
	// 	header("Location: /?type=admin&page=");
	// }
	// else {
	// 	echo $message;
	// }
	// include '../view/admin/login.html';

	class AuthController {
		public function index(){
			include './view/admin/login.php';
		}

		public function login(){
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				include './module/UserModule/User.php';
				$user = new User();
				$Email = $_POST['Email'];
				$password = $_POST['password'];
				$message = $user->checkAccount($Email, $password);
			}
			if($message ==="Successful"){
				header("Location: /?type=admin&page=dashboard_home");
			}
			else {
				if($message != "")
					$_SESSION['message'] = $message;
				header("Location: /login.php");
			}
			exit();
		}
	}
?>