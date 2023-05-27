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

        function findCT_CuoiCung_TruocChuyenMoi($MaTau, $thoiGianXuatPhat_new){
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
                    $obj = new ChuyenTauObject($row);
                    $obj->setThoiGianDenNoi($row['ThoiGianDenNoi']);
                }
                if ($obj) {
                    return $obj;
                } else {
                    return NULL;
                }
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }

        function findCT_DauTien_SauChuyenMoi($MaTau, $thoiGianXuatPhat_new){
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
            ) AS TMP2 where TMP2.ThoiGianXuatPhat >= ? ORDER BY TMP2.ThoiGianXuatPhat ASC LIMIT 1";
                $params = array($MaTau, $thoiGianXuatPhat_new);
                $sth = $db->select($sql, $params);
                while($row = $sth->fetch()) {
                    $obj = new ChuyenTauObject($row);
                    $obj->setThoiGianDenNoi($row['ThoiGianDenNoi']);
                }
                if ($obj) {
                    return $obj;
                } else {
                    return NULL;
                }
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
        // kiểm tra 4 trường hợp
        // B là các chuyến có sẵn, A là chuyến mới thêm
        // TH1: A
        // TH2: A B B B B B
        // TH3: B B B B B A
        // TH4: B A B
        function checkTauValid($thoiGianXuatPhat_new, $MaTau, $thoiGianChay_new, $GaXuatPhat_new, $GaDiemDen_new, $mapGa){
            try {
                $gaHienTai = $this->getGaHienTai($MaTau);
                $arrTime2= $this->addTime($thoiGianXuatPhat_new, $thoiGianChay_new);
                $TG_DenNoi_new = $arrTime2[1];
                $arrCT = [];
                //lấy chuyến tàu cuối cùng trước chuyến mới và chuyến đầu tiên sau chuyến mới
                $CT_Cuoi = $this->findCT_CuoiCung_TruocChuyenMoi($MaTau, $thoiGianXuatPhat_new);
                $CT_Dau = $this->findCT_DauTien_SauChuyenMoi($MaTau, $thoiGianXuatPhat_new);

                $arrCT[] = $CT_Cuoi;
                $arrCT[] = $CT_Dau;

                // TH1:
                // check thời gian
                if($CT_Cuoi == NULL && $CT_Dau == NULL){

                    // check ga
                    if($GaXuatPhat_new == $gaHienTai)
                        return "OK:OK";
                    else
                        return "Tuyến phải bắt đầu tại " . $mapGa[$gaHienTai];
                }
                // TH2:
                elseif($CT_Cuoi == NULL && $CT_Dau != NULL){
                    // Check TG
                    if (strtotime($CT_Dau->getThoiGianXuatPhat()) <= strtotime($thoiGianXuatPhat_new) && strtotime($thoiGianXuatPhat_new) <= strtotime($CT_Dau->getThoiGianDenNoi())) {
                        return "Bị trùng thời gian với chuyến có mã là " . $CT_Cuoi->getMaChuyenTau();
                    }
                    if(strtotime($CT_Dau->getThoiGianXuatPhat()) <= strtotime($TG_DenNoi_new) && strtotime($TG_DenNoi_new) <= strtotime($CT_Dau->getThoiGianDenNoi())){
                        return "Bị trùng thời gian với chuyến có mã là " . $CT_Dau->getMaChuyenTau();
                    }


                    // Check Ga
                    if($GaDiemDen_new == $CT_Dau->getXuatPhat())
                        return "OK:OK";
                    else
                        return "Vui lòng chọn tuyến có ga kết thúc là " . $mapGa[$CT_Dau->getXuatPhat()];
                }
                //TH3: 
                elseif($CT_Cuoi != NULL && $CT_Dau == NULL){
                    // Check TG
                    if (strtotime($CT_Cuoi->getThoiGianXuatPhat()) <= strtotime($thoiGianXuatPhat_new) && strtotime($thoiGianXuatPhat_new) <= strtotime($CT_Cuoi->getThoiGianDenNoi())) {
                        return "Bị trùng thời gian với chuyến có mã là " . $CT_Cuoi->getMaChuyenTau();
                    }
                    if(strtotime($CT_Cuoi->getThoiGianXuatPhat()) <= strtotime($TG_DenNoi_new) && strtotime($TG_DenNoi_new) <= strtotime($CT_Cuoi->getThoiGianDenNoi())){
                        return "Bị trùng thời gian với chuyến có mã là " . $CT_Cuoi->getMaChuyenTau();
                    }


                    // Check Ga
                    if($GaXuatPhat_new == $CT_Cuoi->getDiemDen())
                        return "OK:OK";
                    else
                        return "Vui lòng chọn tuyến có ga bắt đầu là " .  $mapGa[$CT_Cuoi->getDiemDen()];
                }
                //TH4:
                else {
                    // check TG
                    foreach($arrCT as $each){
                        if (strtotime($each->getThoiGianXuatPhat()) <= strtotime($thoiGianXuatPhat_new) && strtotime($thoiGianXuatPhat_new) <= strtotime($each->getThoiGianDenNoi())) {
                            return "Bị trùng thời gian với chuyến có mã là " . $CT_Cuoi->getMaChuyenTau();
                        }
                        if(strtotime($each->getThoiGianXuatPhat()) <= strtotime($TG_DenNoi_new) && strtotime($TG_DenNoi_new) <= strtotime($each->getThoiGianDenNoi())){
                            return "Bị trùng thời gian với chuyến có mã là " . $each->getMaChuyenTau();
                        } 
                    }

                    // check ga
                    if($CT_Cuoi->getDiemDen() == $GaXuatPhat_new && $GaDiemDen_new == $CT_Dau->getXuatPhat())
                        return "OK:OK";
                    else
                        return "Không thể thêm chuyến, do ga đi của bạn không đồng bộ với chuyến tàu cuối cùng phía trước hoặc ga đến không đồng bộ với chuyến tàu đầu tiên phía sau";
                }
                // return false;
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Trùng mã chuyến tàu1";
            }
        }

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
                $error = $this->checkTauValid($thoiGianXuatPhat, $maTau, $thoiGianChay_new, $GaXuatPhat_new, $GaDiemDen_new, $mapGa);
                $ETmp = explode(':', $error);
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

        function edit($maChuyenTau, $maTuyenDuong, $maTau, $maTau_old, $thoiGianXuatPhat, $trangThai, $arrTuyen, $arrGa){
            try {
                if($maTau == $maTau_old){
                    return "done";
                }
                else{
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
                $error = $this->checkTauValid($thoiGianXuatPhat, $maTau, $thoiGianChay_new, $GaXuatPhat_new, $GaDiemDen_new, $mapGa);
                $ETmp = explode(':', $error);
                if($ETmp[0] == 'OK'){
                    $sql = "update $this->table set MaTuyenDuong = ?, MaTau = ?, thoiGianXuatPhat = ?, TrangThai = ? where MaChuyenTau = ?";
                    $params = array($maTuyenDuong, $maTau, $thoiGianXuatPhat, $trangThai, $maChuyenTau);
                    $db->execute($sql, $params);
                    return "done";
                }
                else{
                    return $error;
                }    
                }
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }

        function remove_KH_TTDC_NDC_QuaHan($ID_NguoiDatCho){
            try {
                $db = new DB();

                // xóa người đặt chổ
                $sql = "delete from KhachHang where ID_NguoiDatCho = ?";
                $params = array($ID_NguoiDatCho);
                $db->execute($sql, $params);

                // xóa thông tin đặt chổ
                $sql = "delete from ThongTinDatCho where ID_NguoiDatCho = ?";
                $db->execute($sql, $params);

                // xóa người đặt chổ
                $sql = "delete from NguoiDatCho where ID_NguoiDatCho = ?";
                $db->execute($sql, $params);

                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }

        function findTTDatCho_QuaHan($maChuyenTau){
            try {
                $db = new DB();
                $sql = "select * from ThongTinDatCho where TrangThai = 2";
                $sth = $db->select($sql);
                $arr = [];
                while($row = $sth->fetch()){
                    $this->remove_KH_TTDC_NDC_QuaHan($row['ID_NguoiDatCho']);
                }
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }
        function remove($maChuyenTau, $TrangThai){
            try {
                $db = new DB();

                // xóa các đặt chổ quá hạn
                $this->findTTDatCho_QuaHan($maChuyenTau);

                $sql = "delete from $this->table where MaChuyenTau = ?";
                $params = array($maChuyenTau);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // thông báo lỗi toàn vẹn data
                    if ($e->getCode() == '23000') {
                        $errorMessage = $e->getMessage();
                       
                        // tìm thông tin theo match
                        preg_match('/CONSTRAINT `([^`]+)` FOREIGN KEY \(`([^`]+)`\) REFERENCES `([^`]+)`/', $errorMessage, $matches);
                        $foreignKey = $matches[1];
                        $column = $matches[2];
                        $referencedTable = $matches[3];
    
                        // nếu liên quan đến bảng chuyến tàu
                        if (strpos($foreignKey, 'khachhang') !== false || strpos($foreignKey, 've') !== false) {
                            return "Chuyến tàu này đã có khách đặt vé hoặc chổ ngồi, vui lòng liên hệ khách hàng trước sau đó xóa các thông tin đặt chổ cũng như vé liên quan!";
                        }
                        else {
                            return "Lỗi không xác định";
                        }
                        // Thực hiện các hành động phù hợp
                    } else {
                        return "Lỗi";
                    }
            }
        }

        function editTrangThaiChuyenTau($MaChuyenTau, $TrangThai_new){
            try {
                $db = new DB();
                $sql = "update $this->table set TrangThai = ? where MaChuyenTau = ?";
                $params = array($TrangThai_new, $MaChuyenTau);
                $db->execute($sql, $params);
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