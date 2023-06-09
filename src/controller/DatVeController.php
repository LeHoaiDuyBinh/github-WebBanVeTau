<?php 
    class DatVeController {
        public function index(){
            include 'view/ticketing/BookTickets/ketquatimve.php';
        }
        public function dienthongtin(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$jsonData = file_get_contents('php://input');
                $data = json_decode($jsonData);
                $_SESSION[session_id().'thongtin']=$data;
			}
            $ChieuDi=$_SESSION[session_id().'thongtin']->chieuDi;
            $ChieuVe=$_SESSION[session_id().'thongtin']->chieuVe;
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
                $_SESSION[session_id()]=$data;
			}
            $Ve=$_SESSION[session_id()]->nguoiNgoi;
            $thongTinNguoiDat=$_SESSION[session_id()]->thongTinNguoiDat;
            //var_dump($Ve);
            include 'view/ticketing/BookTickets/xacnhan.php';
        }
        public function thanhToan(){
            if(isset($_GET['HinhThuc'])){
                $HinhThuc=$_GET['HinhThuc'];
                if($HinhThuc==="QR"){
                    $qr="https://quickchart.io/qr?text="."Thanh cong"."=000&light=fff&ecLevel=Q&format=png";
                    include 'view/ticketing/BookTickets/qrcode.php';
                    $_SESSION[session_id()."count"]=0;
                }
                elseif($HinhThuc==="ThanhToanSau"){
                    //include

                }
                else{
                    include 'view/403.html';
                }
            
            }
            if($_POST['DaThanhToan']=='True'){
                
            }
        }
        public function addInfo(){
            $_SESSION[session_id()."count"]=1;
            if(count($_SESSION[session_id()]->thongTinNguoiDat)>0){
                $data=$_SESSION[session_id()]->thongTinNguoiDat;
                $thongTinKhacHang=$_SESSION[session_id()]->nguoiNgoi;
                include_once './model/DatVeModel/NguoiDatVe.php';
                include_once './model/DatVeModel/KhachHang.php';
                include_once './model/DatVeModel/ThongTinDatCho.php';

                (new NguoiDatVe)->insert(array($data->fullname,$data->idnumber,$data->phone,$data->email));
                $arr = (new NguoiDatVe)->select($data->idnumber);
                $ID_NguoiDatCho=$arr[0]->getID_NguoiDatCho();
                (new KhachHang)->insert(array($thongTinKhacHang->HoTen, $thongTinKhacHang->CCCD, $thongTinKhacHang->NgaySinh, $thongTinKhacHang->MaChoNgoi, $thongTinKhacHang->TienVe, $thongTinKhacHang->MaChuyenTau,$ID_NguoiDatCho));
                $sum=0;
                foreach($thongTinKhacHang as $each){
                    $sum+=$each->TienVe;
                }
                if($data->thanhToan=="traSau")
                    $maDatCho=(new ThongTinDatCho)->insert($ID_NguoiDatCho,$data->TienVe,0);
                elseif($data->thanhToan=="QR"){
                    $maDatCho=(new ThongTinDatCho)->insert($ID_NguoiDatCho,$data->TienVe,1);
                    (new ThanhToan)->insert($maDatCho,$data->thanhToan);
                    foreach($thongTinKhacHang as $each){
                        $_SESSION[session_id()."maVe"]=(new Ve)->insert($each->MaChuyenTau,$each->MaChoNgoi);
                    }

                }
                
            }

        }
        public function loadInfor(){           
            if($_SESSION[session_id()."count"]==1){
                $this->addInfo();                   
            }
            sleep(10);
            include_once './model/DatVeModel/Ve.php';
            $arr = (new Ve)->select($_SESSION[session_id()."maVe"]);
            include 'view/ticketing/BookTickets/hienthongtin.php';                   

        }
    }
