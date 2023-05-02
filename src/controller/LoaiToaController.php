<?php
    class LoaiToaController{
        public function index(){
            include './module/LoaiToaModule/LoaiToa.php';
            $arrLoaiToa = (new LoaiToa)->load();
            
            include './view/admin/dashboard_loaitoa.php';
		}

        public function create(){
            include './module/LoaiToaModule/LoaiToa.php';
            $MaLoaiToa = $_POST['MaLoaiToa'];
            $TenLoaiToa = $_POST['TenLoaiToa'];
            $Gia = $_POST['Gia'];
            $MoTa = $_POST['MoTa'];
            $check = (new LoaiToa)->create($MaLoaiToa, $TenLoaiToa , $Gia, $MoTa);
            echo $check;
        }

        public function edit(){
            include './module/LoaiToaModule/LoaiToa.php';
            $MaLoaiToa = $_POST['MaLoaiToa'];
            $TenLoaiToa = $_POST['TenLoaiToa'];
            $Gia = $_POST['Gia'];
            $MoTa = $_POST['MoTa'];
            $check = (new LoaiToa)->edit($MaLoaiToa, $TenLoaiToa , $Gia, $MoTa);
            echo $check;
        }

        public function remove(){
            include './module/LoaiToaModule/LoaiToa.php';
            $MaLoaiToa = $_POST['MaLoaiToa'];
            $check = (new LoaiToa)->remove($MaLoaiToa);
            echo $check;
        }
    }
?>