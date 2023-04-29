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
			include './view/admin/login.html';
		}

		public function login(){
			include './module/User.php';
			$user = new User();
			$Email = $_POST['Email'];
			$password = $_POST['password'];
			$message = $user->checkAccount($Email, $password);
			if($message ==="Successful"){
				header("Location: /?type=admin&page=");
			}
			else {
				echo $message;
				$this->index();
			}
		}
	}
?>