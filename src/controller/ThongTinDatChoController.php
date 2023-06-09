<?php
    class ThongTinDatChoController{
        public function index(){
            include_once 'view/ticketing/thongtindatcho.php';
        }

        public function tracuuthongtin(){
            include_once './model/NguoiDatChoModel/NguoiDatCho.php';
            $maDatCho = $_POST['maDatCho'];
            $arr = (new NguoiDatCho)->findKH($maDatCho);
            
            include_once 'view/ticketing/thongtindatcho.php';
        }
    }
?>