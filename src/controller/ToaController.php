<?php
    class ToaController{
        public function index(){
            include './module/ToaModule/Toa.php';
            $arrToa = (new Toa)->load();
            
            include './view/admin/dashboard_toa.php';
		}

        // public function create(){
        //     include './module/ToaModule/Toa.php';
        //     $MaToa = $_POST['MaToa'];
        //     $TenToa = $_POST['TenToa'];
        //     $Gia = $_POST['Gia'];
        //     $MoTa = $_POST['MoTa'];
        //     $check = (new Toa)->create($MaToa, $TenToa , $Gia, $MoTa);
        //     echo $check;
        // }

        // public function edit(){
        //     include './module/ToaModule/Toa.php';
        //     $MaToa = $_POST['MaToa'];
        //     $TenToa = $_POST['TenToa'];
        //     $Gia = $_POST['Gia'];
        //     $MoTa = $_POST['MoTa'];
        //     $check = (new Toa)->edit($MaToa, $TenToa , $Gia, $MoTa);
        //     echo $check;
        // }

        // public function remove(){
        //     include './module/ToaModule/Toa.php';
        //     $MaToa = $_POST['MaToa'];
        //     $check = (new Toa)->remove($MaToa);
        //     echo $check;
        // }
    }
?>