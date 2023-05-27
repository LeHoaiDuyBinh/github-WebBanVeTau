<?php
    class TauController{
        public function index(){
            include './model/TauModel/Tau.php';
            $arrTau = (new Tau)->load();
            
            include './model/GaModel/Ga.php';
            $arrGa = (new Ga)->load();
            include './view/admin/dashboard_tau.php';
		}

        public function create(){
            include './model/TauModel/Tau.php';
            $MaTau = $_POST['MaTau'];
            $GaHienTai = $_POST['GaHienTai'];
            $TrangThai = $_POST['TrangThai'];
            $check = (new Tau)->create($MaTau, $GaHienTai , $TrangThai);
            echo $check;
        }

        public function edit(){
            include './model/TauModel/Tau.php';
            $MaTau = $_POST['MaTau'];
            $GaHienTai = $_POST['GaHienTai'];
            $TrangThai = $_POST['TrangThai'];
            $TrangThai_old = $_POST['TrangThai_old'];
            $check = (new Tau)->edit($MaTau, $GaHienTai , $TrangThai, $TrangThai_old);
            echo $check;
        }

        public function remove(){
            include './model/TauModel/Tau.php';
            $MaTau = $_POST['MaTau'];
            $check = (new Tau)->remove($MaTau);
            echo $check;
        }
    }
?>