<?php 
    class DatVeController {
        public function index(){
            include 'view/ticketing/BookTickets/ketquatimve.php';
        }
        public function dienthongtin(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$jsonData = file_get_contents('php://input');
                $data = json_decode($jsonData);
                $_SESSION['data']=$data;
			}
            $ChieuDi=$_SESSION['data']->chieuDi;
            $ChieuVe=$_SESSION['data']->chieuVe;
            include_once './model/DatVeModel/DatVe.php';
            $arrDi = (new DatVe)->load($ChieuDi->maChuyenDi,$ChieuDi->maGheDi);
            if(count($ChieuVe) > 0){
                $arrVe=(new DatVe)->load($ChieuVe->maChuyenVe,$ChieuVe->maGheVe);
            }
            //var_dump($arrDi);
            //var_dump($arrVe);
            include 'view/ticketing/BookTickets/dienthongtin.php';
        }
        public function xacnhan(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$jsonData = file_get_contents('php://input');
                $data = json_decode($jsonData);
                $_SESSION['data_xacnhan']=$data;
			}
            $Ve=$_SESSION['data_xacnhan']->nguoiNgoi;
            var_dump($Ve);
            //include 'view/ticketing/BookTickets/xacnhan.php';
        }
    }
