<?php
    class TauController{
        public function index(){
            include './module/TauModule/Tau.php';
            $arrTau = (new Tau)->load();
            
            include './module/GaModule/Ga.php';
            $arrGa = (new Ga)->load();
            include './view/admin/dashboard_tau.php';
		}

        public function create(){
            include './module/TauModule/Tau.php';
            $MaTau = $_POST['MaTau'];
            $GaHienTai = $_POST['GaHienTai'];
            $TrangThai = $_POST['TrangThai'];
            $check = (new Tau)->create($MaTau, $GaHienTai , $TrangThai);
            echo $check;
        }

        public function edit(){
            include './module/TauModule/Tau.php';
            $MaTau = $_POST['MaTau'];
            $GaHienTai = $_POST['GaHienTai'];
            $TrangThai = $_POST['TrangThai'];
            $check = (new Tau)->edit($MaTau, $GaHienTai , $TrangThai);
            echo $check;
        }

        public function remove(){
            include './module/TauModule/Tau.php';
            $MaTau = $_POST['MaTau'];
            $check = (new Tau)->remove($MaTau);
            echo $check;
        }
    }
?>