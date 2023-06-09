<?php
    class ThongTinDatChoController{
        public function index(){
            include_once 'view/ticketing/thongtindatcho.php';
        }

        public function tracuuthongtin(){
            include_once './model/NguoiDatChoModel/NguoiDatCho.php';
            $maDatCho = $_POST['maDatCho'];
            $maDatCho = 'DC001';
            $arr = (new NguoiDatCho)->findKH($maDatCho);
            
            include_once 'view/ticketing/thongtindatcho.php';
        }
    }
?>