<?php 
include_once "./module/db.php";
include_once "ChuyenTauObject.php";
include_once "./module/TuyenDuongModule/TuyenDuongObject.php";
    class ChuyenTau{
        private $table = "ChuyenTau";

        function addTime($thoiGianXuatPhat, $thoiGianChay){
            $arr = [];
            // tạo các đối tượng thời gian
            $thoiGianXuatPhatTmp = new DateTime($thoiGianXuatPhat);
            $tmp = $thoiGianXuatPhatTmp->format('d-m-Y H:i:s');
            $arr[] = $tmp;
            $thoiGianChayTmp = explode(':', $thoiGianChay);
            $thoiGianChayInterval = new DateInterval(
                'PT' . $thoiGianChayTmp[0] . 'H' . $thoiGianChayTmp[1] . 'M' . $thoiGianChayTmp[2] . 'S'
            );
            // cộng thời gian
            $thoiGianXuatPhatTmp->add($thoiGianChayInterval);
            $thoiGianDenNoi = $thoiGianXuatPhatTmp->format('d-m-Y H:i:s');
            $arr[] = $thoiGianDenNoi;
            return $arr;
        }
        function load(){
            try {
                $db = new DB();
                $sql = "select CT.*, TD_TMP.TenGaDiemDen, TD_TMP.TenGaXuatPhat, TD_TMP.ThoiGianChay, TD_TMP.XuatPhat, TD_TMP.DiemDen, T.GaHienTai, T.TrangThai as TrangThaiTau
                from ChuyenTau as CT,
                (
                    select tmp1.*, G2.TenGa as TenGaDiemDen 
                    from 
                    (
                        select TD.*, G.TenGa as TenGaXuatPhat 
                        from Ga as G, TuyenDuong as TD 
                        where G.MaGa = TD.XuatPhat
                    ) as tmp1, Ga as G2 
                    where tmp1.DiemDen = G2.MaGa
                ) as TD_TMP, Tau as T where CT.MaTuyenDuong = TD_TMP.MaTuyenDuong and CT.MaTau = T.MaTau";
                $sth = $db->select($sql);
                $arr = [];
                while($row = $sth->fetch()) {
                    $obj = new ChuyenTauObject($row);

                    $arrTime = $this->addTime($obj->getThoiGianXuatPhat(), $obj->getThoiGianChay());
                    $obj->setThoiGianXuatPhat($arrTime[0]);
                    $obj->setThoiGianDenNoi($arrTime[1]);

                    // set Trang thai
                    if($obj->getTrangThai() == 0)
                        $obj->setTrangThaitxt("Sẵn sàng hoạt động");
                    else if($obj->getTrangThai() == 1)
                        $obj->setTrangThaitxt("Đang gặp sự cố");
                    else if($obj->getTrangThai() == 2)
                        $obj->setTrangThaitxt("Đang chạy");
                    else if($obj->getTrangThai() == 3)
                        $obj->setTrangThaitxt("Đã hoàn thành");
                    $arr[] = $obj;
                }

                    return $arr;
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
        function checkGaHienTai($arrTG_DenNoi){
            $timestamps = array_map(function($arrTG_DenNoi) {
                return strtotime($arrTG_DenNoi);
            }, $arrTG_DenNoi);
            
            // Tìm thời gian lớn nhất trong mảng timestamp
            $maxTimestamp = max($timestamps);
            
            // Chuyển đổi thời gian lớn nhất từ timestamp về định dạng "d-m-Y H:i:s"
            $maxDatetime = date("d-m-Y H:i:s", $maxTimestamp);

            return $maxDatetime;
        }

        function checkTauValid($thoiGianXuatPhat_new, $MaTau, $thoiGianChay_new, $GaXuatPhat_new){
            try {
                $db = new DB();
                $ngayXuatPhat_new = explode(' ', $thoiGianXuatPhat_new);
                $sql = "select TMP.*, TU.GaHienTai, TU.TrangThai as TrangThaiTau, TD.ThoiGianChay, TD.XuatPhat, TD.DiemDen 
                from (
                    select * from ChuyenTau 
                    where ChuyenTau.ThoiGianXuatPhat LIKE ? AND ChuyenTau.MaTau = ?
                    ) as TMP, Tau as TU, TuyenDuong as TD 
                    where TMP.MaTau = TU.MaTau and TMP.MaTuyenDuong = TD.MaTuyenDuong";
                $params = array($ngayXuatPhat_new[0] . "%", $MaTau);
                $sth = $db->select($sql, $params);
                $arr = [];
                $arrTG_DenNoi = [];
                while($row = $sth->fetch()) {
                    $obj = new ChuyenTauObject($row);

                    $arrTime = $this->addTime($obj->getThoiGianXuatPhat(), $obj->getThoiGianChay());
                    $obj->setThoiGianXuatPhat($arrTime[0]);
                    $obj->setThoiGianDenNoi($arrTime[1]);

                    $arr[] = $obj;
                    $arrTG_DenNoi[] = $obj->getThoiGianDenNoi();
                    
                    $arrTime2= $this->addTime($thoiGianXuatPhat_new, $thoiGianChay_new);
                    $TG_DenNoi_tmp = $arrTime2[1];
                    // kiểm tra thời gian của các chuyến đã có và so sánh với thời gian bắt đàu của chuyến sắp thêm
                    if (strtotime($obj->getThoiGianXuatPhat()) <= strtotime($thoiGianXuatPhat_new) && strtotime($thoiGianXuatPhat_new) <= strtotime($obj->getThoiGianDenNoi())) {
                        return "CT:" . $obj->getMaChuyenTau();
                    }
                    // kiểm tra thời gian của các chuyến đã có và so sánh với thời gian kết thúc của chuyến sắp thêm
                    if(strtotime($obj->getThoiGianXuatPhat()) <= strtotime($TG_DenNoi_tmp) && strtotime($TG_DenNoi_tmp) <= strtotime($obj->getThoiGianDenNoi())){
                        return "CT:" . $obj->getMaChuyenTau();
                    }
                }
                if($arrTG_DenNoi == NULL)
                    return false;
                $maxTG_DenNoi = $this->checkGaHienTai($arrTG_DenNoi);
;
                $GaDiemDenCuoiCung = '';
                foreach($arr as $each){
                    if($maxTG_DenNoi == $each->getThoiGianDenNoi()){
                        $GaDiemDenCuoiCung = $each->getDiemDen();
                        break;
                    }
                }


                if($GaDiemDenCuoiCung != $GaXuatPhat_new && $GaDiemDenCuoiCung != '')
                    return "G:" . $GaDiemDenCuoiCung;
                return false;
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Trùng mã chuyến tàu1";
            }
        }

        function create($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai, $arrTuyen){
            try {
                $db = new DB();

                // khởi tạo các biến cần để check
                $thoiGianXuatPhat = date('Y-m-d H:i:s', strtotime($thoiGianXuatPhat));
                $thoiGianChay_new = $arrTuyen[0]->getThoiGianChay();
                $GaXuatPhat_new = $arrTuyen[0]->getXuatPhat();
                $error = $this->checkTauValid($thoiGianXuatPhat, $maTau, $thoiGianChay_new, $GaXuatPhat_new);
                $ETmp = explode(':', $error);
                if($ETmp[0] == 'CT')
                    return "Vui lòng chọn thời gian thích hợp, tàu đang chạy cho chuyến " . $ETmp[1] . "  vào thời gian mà bạn chọn";
                if($ETmp[0] == 'G')
                    return "Vui lòng chọn tàu hoặc tuyến phù hợp, tàu bạn chọn sẽ dừng ở ga cuối là " . $ETmp[1];
                $sql = "insert into $this->table (MaChuyenTau, MaTuyenDuong , MaTau, thoiGianXuatPhat, TrangThai) values(?, ?, ?, ?, ?)";
                $params = array($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return $e;
            }
        }

        function edit($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai, $arrTuyen){
            try {
                $db = new DB();

                // khởi tạo các biến cần để check
                $thoiGianXuatPhat = date('Y-m-d H:i:s', strtotime($thoiGianXuatPhat));
                $thoiGianChay_new = $arrTuyen[0]->getThoiGianChay();
                $GaXuatPhat_new = $arrTuyen[0]->getXuatPhat();
                $error = $this->checkTauValid($thoiGianXuatPhat, $maTau, $thoiGianChay_new, $GaXuatPhat_new);
                $ETmp = explode(':', $error);
                if($ETmp[0] == 'CT')
                    return "Vui lòng chọn thời gian thích hợp, tàu đang chạy cho chuyến " . $ETmp[1] . "  vào thời gian mà bạn chọn";
                if($ETmp[0] == 'G')
                    return "Vui lòng chọn tàu hoặc tuyến phù hợp, tàu bạn chọn sẽ dừng ở ga cuối là " . $ETmp[1];
                $sql = "update $this->table set MaTuyenDuong = ?, MaTau = ?, thoiGianXuatPhat = ?, TrangThai = ? where MaChuyenTau = ?";
                $params = array($maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai, $maChuyenTau);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }
        function remove($maChuyenTau, $TrangThai){
            try {
                $db = new DB();
                if($TrangThai == 2){
                    return "Tàu đang chạy không thể xóa!";
                }
                $sql = "delete from $this->table where MaChuyenTau = ?";
                $params = array($maChuyenTau);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }

        function editTrangThaiChuyenTau($MaChuyenTau, $TrangThai_new){
            try {
                $db = new DB();
                $sql = "update $this->table set TrangThai = ? where MaChuyenTau = ?";
                $params = array($TrangThai_new, $MaChuyenTau);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }

        // update các cột trong bảng tàu theo chuyến
        function editTau($MaTau, $TrangThai_new, $DiemDen){
            try {
                $db = new DB();
                $sql = "update Tau set GaHienTai = ? TrangThai = ? where MaTau = ?";
                $params = array($DiemDen, $TrangThai_new, $MaTau);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }
        // hàm check xem tàu còn chạy cho chuyến không
        function check($arrChuyenTau){
            try {
                $db = new DB();
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $currentDateTime = date('d-m-Y H:i:s');
                foreach($arrChuyenTau as $each){
                    // set tàu nào đang chạy
                    if (strtotime($each->getThoiGianXuatPhat()) <= strtotime($currentDateTime) && strtotime($currentDateTime) < strtotime($each->getThoiGianDenNoi())) {
                        $this->editTrangThaiChuyenTau($each->getMaChuyenTau(), 2);
                        $this->editTau($each->getMaTau(), 0, 'G000');
                    }
                    // set hoàn thành chuyến

                    // xem lại
                    if(strtotime($currentDateTime) >= strtotime($each->getThoiGianDenNoi())) {
                        $this->editTrangThaiChuyenTau($each->getMaChuyenTau(), 3);
                        $this->editTau($each->getMaTau(), 1, $each->getDiemDen());
                    }
                }
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }
    }
?>