<?php
    class ChuyenTauController{
        public function index(){
            include_once './model/ChuyenTauModel/ChuyenTau.php';
            $arrChuyenTau= (new ChuyenTau)->load();

            include './model/TuyenDuongModel/TuyenDuong.php';
            $arrTuyenDuong= (new TuyenDuong)->load();

            include './model/TauModel/Tau.php';
            $arrTau= (new Tau)->load();
            
            include './view/admin/dashboard_chuyentau.php';
		}

        public function create(){
            $maChuyenTau = $_POST['MaChuyenTau'];
            $maTuyenDuong = $_POST['MaTuyenDuong'];
            $maTau = $_POST['MaTau'];
            $thoiGianXuatPhat = $_POST['ThoiGianXuatPhat'];
            $trangThai = $_POST['TrangThai'];

            include './model/TuyenDuongModel/TuyenDuong.php';
            $arrTuyen= (new TuyenDuong)->find($maTuyenDuong);

            include './model/GaModel/Ga.php';
            $arrGa= (new Ga)->load();
            
            include_once './model/ChuyenTauModel/ChuyenTau.php';
            $check = (new ChuyenTau)->create($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai, $arrTuyen, $arrGa);
            echo $check;
        }

        public function edit(){
            $maChuyenTau = $_POST['MaChuyenTau'];
            $maTuyenDuong = $_POST['MaTuyenDuong'];
            $maTau = $_POST['MaTau'];
            $maTau_old = $_POST['MaTau_old'];
            $thoiGianXuatPhat = $_POST['ThoiGianXuatPhat'];
            $trangThai = $_POST['TrangThai'];

            include './model/TuyenDuongModel/TuyenDuong.php';
            $arrTuyen= (new TuyenDuong)->find($maTuyenDuong);

            include './model/GaModel/Ga.php';
            $arrGa= (new Ga)->load();

            include_once './model/ChuyenTauModel/ChuyenTau.php';
            $check = (new ChuyenTau)->edit($maChuyenTau, $maTuyenDuong, $maTau, $maTau_old, $thoiGianXuatPhat, $trangThai, $arrTuyen,  $arrGa);
            echo $check;
        }

        public function remove(){
            include_once './model/ChuyenTauModel/ChuyenTau.php';
            $maChuyenTau = $_POST['MaChuyenTau'];
            $trangThai = $_POST['TrangThai'];
            $check = (new ChuyenTau)->remove($maChuyenTau, $trangThai);
            echo $check;
        }
        public function checkChuyenTau(){
            include_once './model/ChuyenTauModel/ChuyenTau.php';
            $arrChuyenTau= (new ChuyenTau)->load();

            (new ChuyenTau)->check($arrChuyenTau);
        }
    }
?>