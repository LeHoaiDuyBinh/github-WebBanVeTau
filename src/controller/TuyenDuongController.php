<?php 
    class TuyenDuongController{
        public function index(){
            include './module/TuyenDuongModule/TuyenDuong.php';
            $arrTuyenDuong = (new TuyenDuong)->load();

            include './module/GaModule/Ga.php';
            $arrGa = (new Ga)->load();
            include './view/admin/dashboard_tuyenduong.php';
		}

        public function create(){
            include './module/TuyenDuongModule/TuyenDuong.php';
            $MaTuyenDuong = $_POST['MaTuyenDuong'];
            $XuatPhat = $_POST['XuatPhat'];
            $DiemDen = $_POST['DiemDen'];
            $Gio = $_POST['Gio'];
            $Phut = $_POST['Phut'];
            $ThoiGianChay = $Gio . ":" . $Phut;
            $check = (new TuyenDuong)->create($MaTuyenDuong, $XuatPhat, $DiemDen, $ThoiGianChay);
            echo $check;
        }

        public function edit(){
            include './module/TuyenDuongModule/TuyenDuong.php';
            $MaTuyenDuong = $_POST['MaTuyenDuong'];
            $XuatPhat = $_POST['XuatPhat'];
            $DiemDen = $_POST['DiemDen'];
            $Gio = $_POST['Gio'];
            $Phut = $_POST['Phut'];
            $ThoiGianChay = $Gio . ":" . $Phut;
            $check = (new TuyenDuong)->edit($MaTuyenDuong, $XuatPhat, $DiemDen, $ThoiGianChay);
            echo $check;
        }

        public function remove(){
            include './module/TuyenDuongModule/TuyenDuong.php';
            $MaTuyenDuong = $_POST['MaTuyenDuong'];
            $check = (new TuyenDuong)->remove($MaTuyenDuong);
            echo $check;
        }
    }
?>