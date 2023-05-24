<?php
    class ChuyenTauController{
        public function index(){
            include_once './module/ChuyenTauModule/ChuyenTau.php';
            $arrChuyenTau= (new ChuyenTau)->load();

            include './module/TuyenDuongModule/TuyenDuong.php';
            $arrTuyenDuong= (new TuyenDuong)->load();

            include './module/TauModule/Tau.php';
            $arrTau= (new Tau)->load();
            
            include './view/admin/dashboard_chuyentau.php';
		}

        public function create(){
            $maChuyenTau = $_POST['MaChuyenTau'];
            $maTuyenDuong = $_POST['MaTuyenDuong'];
            $maTau = $_POST['MaTau'];
            $thoiGianXuatPhat = $_POST['ThoiGianXuatPhat'];
            $trangThai = $_POST['TrangThai'];

            include './module/TuyenDuongModule/TuyenDuong.php';
            $arrTuyen= (new TuyenDuong)->find($maTuyenDuong);
            
            include_once './module/ChuyenTauModule/ChuyenTau.php';
            $check = (new ChuyenTau)->create($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai, $arrTuyen);
            echo $check;
        }

        public function edit(){
            $maChuyenTau = $_POST['MaChuyenTau'];
            $maTuyenDuong = $_POST['MaTuyenDuong'];
            $maTau = $_POST['MaTau'];
            $thoiGianXuatPhat = $_POST['ThoiGianXuatPhat'];
            $trangThai = $_POST['TrangThai'];

            include './module/TuyenDuongModule/TuyenDuong.php';
            $arrTuyen= (new TuyenDuong)->find($maTuyenDuong);

            include_once './module/ChuyenTauModule/ChuyenTau.php';
            $check = (new ChuyenTau)->edit($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai, $arrTuyen);
            echo $check;
        }

        public function remove(){
            include_once './module/ChuyenTauModule/ChuyenTau.php';
            $maChuyenTau = $_POST['MaChuyenTau'];
            $trangThai = $_POST['TrangThai'];
            $check = (new ChuyenTau)->remove($maChuyenTau, $trangThai);
            echo $check;
        }
        public function checkChuyenTau(){
            include_once './module/ChuyenTauModule/ChuyenTau.php';
            $arrChuyenTau= (new ChuyenTau)->load();

            (new ChuyenTau)->check($arrChuyenTau);
        }
    }
?>