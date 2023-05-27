<?php
	session_start();

	class AuthController {
		public function index(){
			include './view/admin/login.php';
		}

		public function login(){
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				include './model/UserModel/User.php';
				$user = new User();
				$Email = $_POST['Email'];
				$password = md5($_POST['password']);
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
		public function logout(){
			// Hủy tất cả các biến session
			session_unset();

			// Xóa tất cả các session đã lưu trữ trên máy chủ
			session_destroy();

			// Chuyển hướng đến trang chính hoặc trang đăng nhập
			header("Location: /login.php");
			exit();
		}
	}
?>