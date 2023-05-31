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
            $ChieuDi=$data->chieuDi;
            $ChieuVe=$data->chieuVe;
            include 'view/ticketing/BookTickets/dienthongtin.php';
        }
        public function xacnhan(){
            include 'view/ticketing/BookTickets/xacnhan.php';
        }
    }
?>
