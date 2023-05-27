<?php 
include_once "./model/db.php";
include_once "ChuyenTauObject.php";
include_once "./model/TuyenDuongModel/TuyenDuongObject.php";
include_once "./model/GaModel/GaObject.php";
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
        function getMaxTG_DenNoi($arrTG_DenNoi){
            $timestamps = array_map(function($arrTG_DenNoi) {
                return strtotime($arrTG_DenNoi);
            }, $arrTG_DenNoi);
            
            // Tìm thời gian lớn nhất trong mảng timestamp
            $maxTimestamp = max($timestamps);
            
            // Chuyển đổi thời gian lớn nhất từ timestamp về định dạng "d-m-Y H:i:s"
            $maxDatetime = date("d-m-Y H:i:s", $maxTimestamp);

            return $maxDatetime;
        }

        function getMinTG_DenNoi($arrTG_DenNoi){
            $timestamps = array_map(function($arrTG_DenNoi) {
                return strtotime($arrTG_DenNoi);
            }, $arrTG_DenNoi);
            
            // Tìm thời gian lớn nhất trong mảng timestamp
            $minTimestamp = min($timestamps);
            
            // Chuyển đổi thời gian lớn nhất từ timestamp về định dạng "d-m-Y H:i:s"
            $minTimestamp = date("d-m-Y H:i:s", $minTimestamp);

            return $minTimestamp;
        }

        function checkChuyenTauDauTien($MaTau){
            try {
                $db = new DB();
                $sql = "select * from $this->table where MaTau = ?";
                $params = array($MaTau);
                $sth = $db->select($sql, $params);
                while($row = $sth->fetch()) {
                    return false;
                }
                    return true;
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }

        function findThoiGianDenNoiCuoiCung($MaTau, $thoiGianXuatPhat_new){
            try {
                $db = new DB();
                $sql = "SELECT *,
                ADDTIME(TMP2.ThoiGianXuatPhat, TMP2.ThoiGianChay) AS ThoiGianDenNoi
            FROM (
                SELECT TMP.*, TU.GaHienTai, TU.TrangThai AS TrangThaiTau, TD.ThoiGianChay, TD.XuatPhat, TD.DiemDen
                FROM (
                    SELECT *
                    FROM ChuyenTau
                    WHERE ChuyenTau.MaTau = ?
                ) AS TMP, Tau AS TU, TuyenDuong AS TD
                WHERE TMP.MaTau = TU.MaTau AND TMP.MaTuyenDuong = TD.MaTuyenDuong
            ) AS TMP2 where ADDTIME(TMP2.ThoiGianXuatPhat, TMP2.ThoiGianChay) <= ? ORDER BY ThoiGianDenNoi DESC LIMIT 1";
                $params = array($MaTau, $thoiGianXuatPhat_new);
                $sth = $db->select($sql, $params);
                while($row = $sth->fetch()) {
                    return $row['DiemDen'];
                }
                return '';
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }

        function getGaHienTai($MaTau){
            try {
                $db = new DB();
                $sql = "select * from Tau where MaTau = ?";
                $params = array($MaTau);
                $sth = $db->select($sql, $params);
                while($row = $sth->fetch()) {
                    return $row['GaHienTai'];
                }
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }

        function checkTauValid($thoiGianXuatPhat_new, $MaTau, $thoiGianChay_new, $GaXuatPhat_new, $GaDiemDen_new){
            try {
                $db = new DB();
                $ngayXuatPhat_new = explode(' ', $thoiGianXuatPhat_new);
                $sql = "select TMP.*, TU.GaHienTai, TU.TrangThai as TrangThaiTau, TD.ThoiGianChay, TD.XuatPhat, TD.DiemDen 
                from (
                    select * from ChuyenTau 
                    where ChuyenTau.ThoiGianXuatPhat >= ? AND ChuyenTau.MaTau = ?
                    ) as TMP, Tau as TU, TuyenDuong as TD 
                    where TMP.MaTau = TU.MaTau and TMP.MaTuyenDuong = TD.MaTuyenDuong";
                $params = array($ngayXuatPhat_new[0] . "%", $MaTau);
                $sth = $db->select($sql, $params);
                $arr = [];
                $arrTG_DenNoi = [];
                $count = 0;

                // while chẹc tgian có hợp lệ không

                // if ($count > 0) {
                    while($row = $sth->fetch()) {
                        $count += 1;
                        $obj = new ChuyenTauObject($row);
    
                        // cộng thời gian
                        $arrTime = $this->addTime($obj->getThoiGianXuatPhat(), $obj->getThoiGianChay());
                        $obj->setThoiGianXuatPhat($arrTime[0]);
                        $obj->setThoiGianDenNoi($arrTime[1]);
    
                        $arr[] = $obj;
                        $arrTG_DenNoi[] = $obj->getThoiGianDenNoi();
                        
                        $arrTime2= $this->addTime($thoiGianXuatPhat_new, $thoiGianChay_new);
                        $TG_DenNoi_new = $arrTime2[1];
                        // kiểm tra thời gian của các chuyến đã có và so sánh với thời gian bắt đàu của chuyến sắp thêm
                        if (strtotime($obj->getThoiGianXuatPhat()) <= strtotime($thoiGianXuatPhat_new) && strtotime($thoiGianXuatPhat_new) <= strtotime($obj->getThoiGianDenNoi())) {
                            return "CT:" . $obj->getMaChuyenTau();
                        }
                        // kiểm tra thời gian của các chuyến đã có và so sánh với thời gian kết thúc của chuyến sắp thêm
                        if(strtotime($obj->getThoiGianXuatPhat()) <= strtotime($TG_DenNoi_new) && strtotime($TG_DenNoi_new) <= strtotime($obj->getThoiGianDenNoi())){
                            return "CT:" . $obj->getMaChuyenTau();
                        }
                    }
                // }

                // check ga có hợp lệ không
                // nghĩa là hoặc là đây là chuyến tàu đầu tiên của tàu hoặc 
                // tìm điểm đến cuối cùng của chuyến trước thời gian xuất phát mới mà gần thời gian xuất
                //phát mới nhất
                $lastDiemDen = $this->findThoiGianDenNoiCuoiCung($MaTau, $thoiGianXuatPhat_new);
                $gaHienTai = $this->getGaHienTai($MaTau);
                if($arrTG_DenNoi == NULL){
                    if($this->checkChuyenTauDauTien($MaTau)){
                        if($gaHienTai != $GaXuatPhat_new)
                            return "GF:" . $gaHienTai;
                        if($gaHienTai == $GaXuatPhat_new)
                            return "OK:OK";
                    }
                    else{
                        if($lastDiemDen != $GaXuatPhat_new){
                            return "G:" . $lastDiemDen;
                        }
                    }
                }

                // nếu có danh sách các thời gian đến nơi thì tìm max,
                // sau đó tìm ra đến cuối cùng
                $maxTG_DenNoi = $this->getMaxTG_DenNoi($arrTG_DenNoi);
                $GaDiemDenCuoiCung = '';
                foreach($arr as $each){
                    if($maxTG_DenNoi == $each->getThoiGianDenNoi()){
                        $GaDiemDenCuoiCung = $each->getDiemDen();
                        break;
                    }
                }
                $gaBatDauDauTien = '';
                $minTG_DenNoi = $this->getMinTG_DenNoi($arrTG_DenNoi);
                foreach($arr as $each){
                    if($minTG_DenNoi == $each->getThoiGianDenNoi()){
                        $gaBatDauDauTien = $each->getDiemDen();
                        break;
                    }
                }

                return $lastDiemDen;
                // return $lastDiemDen;
                if($lastDiemDen != ''){
                    // thêm chuyến tàu mới vào giữa 2 chuyến
                // mà chuyến 1:  A->B chuyến 2 là B->C
                if($lastDiemDen == $gaBatDauDauTien){
                    return "GTrung:" . $GaDiemDenCuoiCung;
                }elseif($lastDiemDen == $GaXuatPhat_new && $GaDiemDen_new == $gaBatDauDauTien ){
                    return "OK:OK";
                }
                }else{
                    if($gaHienTai == $GaXuatPhat_new && $GaDiemDen_new == $gaBatDauDauTien)
                        return "OK:OK";
                    else
                        return "GS:" . $gaBatDauDauTien;
                }
                // return false;
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Trùng mã chuyến tàu1";
            }
        }

        // giải sử mỗi tàu chỉ chạy một tuyến cố định
        // không có tgian sửa DB
        function create($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai, $arrTuyen, $arrGa){
            try {
                $db = new DB();
                // Mảng kết hợp mới
                $mapGa = array();
                foreach ($arrGa as $obj) {
                    $mapGa[$obj->getMaGa()] = $obj->getTenGa();
                }
                $thoiGianXuatPhat = date('Y-m-d H:i:s', strtotime($thoiGianXuatPhat));
                $thoiGianChay_new = $arrTuyen[0]->getThoiGianChay();
                $GaXuatPhat_new = $arrTuyen[0]->getXuatPhat();
                $GaDiemDen_new = $arrTuyen[0]->getDiemDen();
                $error = $this->checkTauValid($thoiGianXuatPhat, $maTau, $thoiGianChay_new, $GaXuatPhat_new, $GaDiemDen_new);
                $ETmp = explode(':', $error);
                if($ETmp[0] == 'CT')
                    return "Vui lòng chọn thời gian thích hợp, tàu đang chạy cho chuyến " . $ETmp[1] . "  vào thời gian mà bạn chọn";
                if($ETmp[0] == 'G')
                    return "Vui lòng chọn tàu hoặc tuyến phù hợp, tàu bạn chọn sẽ dừng ở ga cuối là " .$mapGa[$ETmp[1]] ;
                if($ETmp[0] == 'GT')
                    return "Không thể thêm chuyến, do đã tồn tại 2 chuyến trước đó mà kết thúc chuyến đầu tiên tại ga" . $mapGa[$ETmp[1]]  . " và bắt đầu cũng tại đó";
                if($ETmp[0] == 'GF')
                    return "Không thể thêm chuyến, tuyến bạn chọn khác với ga hiện tại";
                if($ETmp[0] == 'GS')
                    return "Không thể thêm chuyến, tuyến bạn chọn phải kết thúc tại " .  $mapGa[$ETmp[1]] ;          
                if($ETmp[0] == 'OK'){
                    $sql = "insert into $this->table (MaChuyenTau, MaTuyenDuong , MaTau, thoiGianXuatPhat, TrangThai) values(?, ?, ?, ?, ?)";
                    $params = array($maChuyenTau, $maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai);
                    $db->execute($sql, $params);
                    return "done";
                }else{
                    return $error;
                }    
                }
            catch (PDOException $e) {
                // check trùng mã tàu
                if ($e->getCode() == '23000') {
                    if (strpos($e->getMessage(), 'Duplicate') !== false) {
                        return "Mã chuyến tàu đã tồn tại, vui lòng nhập mã chuyến tàu khác!";
                    }
                    else {
                        return "Lỗi không xác định!";
                    }
                }
                else {
                    return "Lỗi";
                }
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
                $sql = "update Tau set GaHienTai = ?, TrangThai = ? where MaTau = ?";
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