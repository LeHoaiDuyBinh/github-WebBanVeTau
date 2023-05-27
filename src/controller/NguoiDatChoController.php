<?php
    class NguoiDatChoController{
        public function index(){
            include './model/NguoiDatChoModel/NguoiDatCho.php';
            $arrNguoiDatCho = (new NguoiDatCho)->load();

            include './view/admin/dashboard_nguoidatcho.php';
		}

        public function createThanhToan(){
            $MaDatCho = $_POST['MaDatCho'];

            include_once './model/NguoiDatChoModule/NguoiDatCho.php';
            $check = (new NguoiDatCho)->createThanhToan($MaDatCho);
            echo $check;
        }

        public function edit(){
            $ID = $_POST['ID'];
            $HoTen = $_POST['HoTen'];
            $CCCD = $_POST['CCCD'];
            $Email = $_POST['Email'];
            $SDT = $_POST['SDT'];

            include_once './model/NguoiDatChoModel/NguoiDatCho.php';
            $check = (new NguoiDatCho)->edit($ID, $HoTen, $CCCD, $Email, $SDT);
            echo $check;
        }

        public function remove(){
            include_once './model/NguoiDatChoModel/NguoiDatCho.php';
            $ID_NguoiDatCho = $_POST['ID_NguoiDatCho'];
            $check = (new NguoiDatCho)->remove($ID_NguoiDatCho);
            echo $check;
        }
    }
?>