<?php
    class ToaController{
        public function index(){
            include './model/ToaModel/Toa.php';
            $arrToa = (new Toa)->load();

            include './model/LoaiToaModel/LoaiToa.php';
            $arrLoaiToa = (new LoaiToa)->load();

            include './model/TauModel/Tau.php';
            $arrTau = (new Tau)->load();

            include './view/admin/dashboard_toa.php';
		}

        public function create(){
            include './model/ToaModel/Toa.php';
            $MaToa = $_POST['MaToa'];
            $MaTau = $_POST['MaTau'];
            $MaLoaiToa = $_POST['MaLoaiToa'];
            $check = (new Toa)->create($MaToa, $MaTau , $MaLoaiToa);
            echo $check;
        }

        public function edit(){
            include './model/ToaModel/Toa.php';
            $MaToa = $_POST['MaToa'];
            $MaTau = $_POST['MaTau'];
            $ThuTuToa_old = $_POST['ThuTuToa_old'];
            $MaTau_old = $_POST['MaTau_old'];
            $check = (new Toa)->edit($MaToa, $MaTau, $MaTau_old, $ThuTuToa_old);
            echo $check;
        }

        public function remove(){
            include './model/ToaModel/Toa.php';
            $MaToa = $_POST['MaToa'];
            $ThuTuToa = $_POST['ThuTuToa'];
            $MaTau = $_POST['MaTau'];
            $check = (new Toa)->remove($MaToa, $ThuTuToa, $MaTau);
            echo $check;
        }
    }
?>