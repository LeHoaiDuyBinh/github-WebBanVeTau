<?php
    session_start();
    class UserController{
        public function index(){
            include_once './module/UserModule/User.php';
            $arrUser = (new User)->load();
            include './view/admin/dashboard_user.php';
		}

        public function create(){
            include_once './module/UserModule/User.php';
            $Email = $_POST['Email'];
            $Password = md5($_POST['MatKhau']);
            $ChucVu = $_POST['ChucVu'];
            $check = (new User)->create($Email, $Password, $ChucVu);
            echo $check;
        }

        public function edit(){
            include_once './module/UserModule/User.php';
            $ID = $_POST['ID'];
            $Email = $_POST['Email'];
            $Password = md5($_POST['MatKhau']);
            $ChucVu = $_POST['ChucVu'];
            $check = (new User)->edit($Email, $Password, $ChucVu, $ID);
            echo $check;
        }

        public function remove(){
            include_once './module/UserModule/User.php';
            $ID_User = $_POST['ID_User'];
            $check = (new User)->remove($ID_User);
            echo $check;
        }
    }
?>