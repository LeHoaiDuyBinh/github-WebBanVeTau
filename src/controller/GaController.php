<?php
    class GaController{
        public function index(){
            include './model/GaModel/Ga.php';
            $arr = (new Ga)->load();
            include './view/admin/dashboard_ga.php';
		}

        public function create(){
            include './model/GaModel/Ga.php';
            $MaGa = $_POST['MaGa'];
            $TenGa = $_POST['TenGa'];
            $check = (new Ga)->create($MaGa, $TenGa);
            echo $check;
        }

        public function edit(){
            include './model/GaModel/Ga.php';
            $MaGa = $_POST['MaGa'];
            $TenGa = $_POST['TenGa'];
            $check = (new Ga)->edit($MaGa, $TenGa);
            echo $check;
        }

        public function remove(){
            include './model/GaModel/Ga.php';
            $MaGa = $_POST['MaGa'];
            $check = (new Ga)->remove($MaGa);
            echo $check;
        }
    }
?>