<?php
    class KetQuaTimVe {
        public function index(){
            if(isset($_POST['XuatPhat'])){
                $xuatPhat=$_POST['XuatPhat']; // ten ga
                //ma ga
            }
            if(isset($_POST['DiemDen'])){
                $DiemDen=$_POST['DiemDen'];
            }
            if(isset($_POST['ThoiGianXuatPhat'])){
                $ThoiGianXuatPhat=$_POST['ThoiGianXuatPhat'];
            }
            if(isset($_POST['ThoiDiemQuayVe'])){
                $ThoiDiemQuayVe=$_POST['ThoiDiemQuayVe'];
            }
            if(isset($_POST['ticket_type'])){
                $ticket_type=$_POST['ticket_type'];
            }
            include './module/TimVeModule/TimVe.php';
            $arrChuyen = (new TimVe)->load($xuatPhat,$DiemDen,$ThoiGianXuatPhat);
            if($ticket_type!="one-way"){
                $arrVe= (new TimVe)->load($DiemDen,$xuatPhat,$ThoiDiemQuayVe);
            }
            include 'view/ticketing/BookTickets/ketquatimve.php';
            //var_dump($arrChuyen);
        }
    }
    
?>