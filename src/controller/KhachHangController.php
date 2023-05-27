<?php
    class KhachHangController{
        public function index($data){
            include './model/KhachHangModel/KhachHang.php';
            $arrKH = (new KhachHang)->load();

            include './view/admin/dashboard_khachhang.php';
		}

        public function edit(){
            $ID = $_POST['id'];
            $HoTen = $_POST['name'];
            $CCCD = $_POST['cccd'];
            $NgaySinh = $_POST['birthday'];
            $Email = $_POST['Email'];
            $SDT = $_POST['SDT'];

            include_once './model/KhachHangModel/KhachHang.php';
            $check = (new KhachHang)->edit($ID, $HoTen, $CCCD, $NgaySinh, $Email, $SDT);
            echo $check;
        }

        public function remove(){
            include_once './model/KhachHangModel/KhachHang.php';
            $ID_KhachHang = $_POST['ID_KhachHang'];
            $TienVe = $_POST['TienVe'];
            $ID_NguoiDatCho = $_POST['ID_NguoiDatCho'];
            $check = (new KhachHang)->remove($ID_KhachHang, $TienVe, $ID_NguoiDatCho);
            echo $check;
        }
    }
?>