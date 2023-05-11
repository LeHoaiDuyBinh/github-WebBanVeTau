<?php
    class ToaController{
        public function index(){
            include './module/ToaModule/Toa.php';
            $arrToa = (new Toa)->load();

            include './module/LoaiToaModule/LoaiToa.php';
            $arrLoaiToa = (new LoaiToa)->load();

            include './module/TauModule/Tau.php';
            $arrTau = (new Tau)->load();

            include './view/admin/dashboard_toa.php';
		}

        public function create(){
            include './module/ToaModule/Toa.php';
            $MaToa = $_POST['MaToa'];
            $MaTau = $_POST['MaTau'];
            $MaLoaiToa = $_POST['MaLoaiToa'];
            $check = (new Toa)->create($MaToa, $MaTau , $MaLoaiToa);
            echo $check;
        }

        public function edit(){
            include './module/ToaModule/Toa.php';
            $MaToa = $_POST['MaToa'];
            $MaTau = $_POST['MaTau'];
            $check = (new Toa)->edit($MaToa, $MaTau);
            echo $check;
        }

        public function remove(){
            include './module/ToaModule/Toa.php';
            $MaToa = $_POST['MaToa'];
            $ThuTuToa = $_POST['ThuTuToa'];
            $MaTau = $_POST['MaTau'];
            $check = (new Toa)->remove($MaToa, $ThuTuToa, $MaTau);
            echo $check;
        }
    }
?>