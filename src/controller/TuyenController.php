<?php 
    class TuyenController{
        public function index(){
            include './module/TuyenModule/Tuyen.php';
            $arrTuyen = (new Tuyen)->load();
            
            include './module/GaModule/Ga.php';
            $arrGa = (new Ga)->load();
            include './view/admin/dashboard_tuyenduong.php';
		}

        public function create(){
            include './module/TuyenModule/Tuyen.php';
            $MaTuyen = $_POST['MaTuyen'];
            $XuatPhat = $_POST['XuatPhat'];
            $DiemDen = $_POST['DiemDen'];
            $check = (new Tuyen)->create($MaTuyen, $XuatPhat, $DiemDen);
            echo $check;
        }

        public function edit(){
            include './module/TuyenModule/Tuyen.php';
            $MaTuyen = $_POST['MaTuyen'];
            $XuatPhat = $_POST['XuatPhat'];
            $DiemDen = $_POST['DiemDen'];
            $check = (new Tuyen)->edit($MaTuyen, $XuatPhat, $DiemDen);
            echo $check;
        }

        public function remove(){
            include './module/TuyenModule/Tuyen.php';
            $MaTuyen = $_POST['MaTuyen'];
            $check = (new Tuyen)->remove($MaTuyen);
            echo $check;
        }
    }
?>