<?php
    class LoaiToaController{
        public function index(){
            include './model/LoaiToaModel/LoaiToa.php';
            $arrLoaiToa = (new LoaiToa)->load();
            
            include './view/admin/dashboard_loaitoa.php';
		}

        public function create(){
            include './model/LoaiToaModel/LoaiToa.php';
            $MaLoaiToa = $_POST['MaLoaiToa'];
            $TenLoaiToa = $_POST['TenLoaiToa'];
            $Gia = $_POST['Gia'];
            $MoTa = $_POST['MoTa'];
            $SoChoNgoi =$_POST['SoChoNgoi'];
            $check = (new LoaiToa)->create($MaLoaiToa, $TenLoaiToa , $Gia, $MoTa, $SoChoNgoi);
            echo $check;
        }

        public function edit(){
            include './model/LoaiToaModel/LoaiToa.php';
            $MaLoaiToa = $_POST['MaLoaiToa'];
            $TenLoaiToa = $_POST['TenLoaiToa'];
            $Gia = $_POST['Gia'];
            $MoTa = $_POST['MoTa'];
            $SoChoNgoi =$_POST['SoChoNgoi'];
            $check = (new LoaiToa)->edit($MaLoaiToa, $TenLoaiToa , $Gia, $MoTa, $SoChoNgoi);
            echo $check;
        }

        public function remove(){
            include './model/LoaiToaModel/LoaiToa.php';
            $MaLoaiToa = $_POST['MaLoaiToa'];
            $check = (new LoaiToa)->remove($MaLoaiToa);
            echo $check;
        }
    }
?>