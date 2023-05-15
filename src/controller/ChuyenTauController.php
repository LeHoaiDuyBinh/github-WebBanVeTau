<?php
    class ChuyenTauController{
        public function index(){
            include './module/ChuyenTauModule/ChuyenTau.php';
            $arrChuyenTau= (new ChuyenTau)->load();

            include './module/TuyenDuongModule/TuyenDuong.php';
            $arrTuyenDuong= (new TuyenDuong)->load();

            include './module/TauModule/Tau.php';
            $arrTau= (new Tau)->load();
            
            include './view/admin/dashboard_chuyentau.php';
		}

        public function create(){
            include './module/ChuyenTauModule/ChuyenTau.php';
            $maChuyenTau = $_POST['MaChuyenTau'];
            $maTuyenDuong = $_POST['MaTuyenDuong'];
            $maTau = $_POST['MaTau'];
            $thoiGianXuatPhat = $_POST['ThoiGianXuatPhat'];
            $trangThai = $_POST['TrangThai'];
            $check = (new ChuyenTau)->create($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai);
            echo $check;
        }

        public function edit(){
            include './module/ChuyenTauModule/ChuyenTau.php';
            $maChuyenTau = $_POST['MaChuyenTau'];
            $maTuyenDuong = $_POST['MaTuyenDuong'];
            $maTau = $_POST['MaTau'];
            $thoiGianXuatPhat = $_POST['ThoiGianXuatPhat'];
            $trangThai = $_POST['TrangThai'];
            $check = (new ChuyenTau)->edit($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai);
            echo $check;
        }

        public function remove(){
            include './module/ChuyenTauModule/ChuyenTau.php';
            $maChuyenTau = $_POST['MaChuyenTau'];
            $check = (new ChuyenTau)->remove($maChuyenTau);
            echo $check;
        }
    }
?>