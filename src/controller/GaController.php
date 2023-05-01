<?php
    class GaController{
        public function index(){
            include './module/Ga.php';
            $arr = (new Ga)->load();
            include './view/admin/dashboard_ga.php';
		}

        public function create(){
            include './module/Ga.php';
            $params = array($_POST['MaGa'], $_POST['TenGa']);
            $check = (new Ga)->create($params);
            echo $check;
        }

        public function edit(){
            include './module/Ga.php';
            $MaGa = $_POST['MaGa'];
            $TenGa = $_POST['TenGa'];
            $check = (new Ga)->edit($MaGa, $TenGa);
            echo $check;
        }

        public function remove(){
            include './module/Ga.php';
            $MaGa = $_POST['MaGa'];
            $check = (new Ga)->remove($MaGa);
            echo $check;
        }
    }
?>