<?php
    include_once "./model/db.php";
    include_once "./model/KhachHangModel/KhachHangObject.php";
    include_once "NguoiDatChoObject.php";
        class NguoiDatCho{
            private $table = "NguoiDatCho";
            function load(){
                try {
                    $db = new DB();
                    $sql = "select tmp.*, tt.NgayThanhToan, tt.LoaiThanhToan from (
                        select ndc.*, ttdc.NgayDatCho, ttdc.TongTien, ttdc.TrangThai, ttdc.MaDatCho 
                        from NguoiDatCho as ndc, ThongTinDatCho as ttdc 
                        where ndc.ID_NguoiDatCho = ttdc.ID_NguoiDatCho
                        ) as tmp 
                        left join 
                        ThanhToan as tt 
                        on tmp.MaDatCho = tt.MaDatCho";
                    $sth = $db->select($sql);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        $obj = new NguoiDatChoObject($row);

                        if($obj->getTrangThai() == 0)
                            $obj->setTrangThaitxt("Chờ thanh toán");
                        elseif($obj->getTrangThai() == 1)
                            $obj->setTrangThaitxt("Đã thanh toán");
                        elseif($obj->getTrangThai() == 2)
                            $obj->setTrangThaitxt("Bị hủy");
                        $arr[] = $obj;

                    }
                        return $arr;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }

            function getSTTVe(){
                try {
                    $db = new DB();
                    $sql = "select COUNT(*) as Tong from Ve";
                    $sth = $db->select($sql);
                    $Tong = 0;
                    while($row = $sth->fetch()) {
                        $Tong = $row['Tong'];
                    }
                        return $Tong + 1;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }

            function createVe($MaChoNgoi, $MaChuyenTau){
                try{
                    $db = new DB();
                    $stt = $this->getSTTVe();
                    $MaVe = sprintf("V%03d", $stt);
                    $sql = "insert into Ve (MaVe, MaChuyenTau, MaChoNgoi) values(?, ?, ?)";
                    $params = array($MaVe, $MaChuyenTau, $MaChoNgoi);
                    $sth = $db->execute($sql, $params);
                   }
                   catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lôi khi thêm vé";
                }
            }

            function loadKH($MaDatCho){
               try{
                $db = new DB();
                $sql = "select kh.* from (
                    select ttdc.ID_NguoiDatCho from ThongTinDatCho as ttdc where ttdc.MaDatCho = ?
                    ) as tmp, KhachHang as kh 
                    where tmp.ID_NguoiDatCho = kh.ID_NguoiDatCho";
                $params = array($MaDatCho);
                $sth = $db->select($sql, $params);
                while($row = $sth->fetch()) {
                    $this->createVe($row['MaChoNgoi'], $row['MaChuyenTau']);
                }
               }
               catch (PDOException $e) {
                // return $e->getMessage();
                return "Lôi khi load khách hàng";
            }
            }
    
            function createThanhToan($MaDatCho){
                try {
                    $db = new DB();
                    $sql = "insert into ThanhToan (MaDatCho, NgayThanhToan , LoaiThanhToan) values(?, CURDATE(), ?)";
                    $params = array($MaDatCho, "Tien mat");
                    $db->execute($sql, $params);

                    $sql = "update ThongTinDatCho set TrangThai = ? where MaDatCho = ?";
                    $params = array(1, $MaDatCho);
                    $db->execute($sql, $params);

                    // tạo vé
                    $this->loadKH($MaDatCho);
                    
                    return "done";
                    
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Trùng mã loại toa";
                }
            }
    
            function edit($ID, $HoTen, $CCCD, $Email, $SDT){
                try {
                    $db = new DB();
                    $sql = "update $this->table set HoTen = ?, CCCD = ?, Email = ?, SDT = ? where ID_NguoiDatCho = ?";
                    $params = array($HoTen, $CCCD, $Email, $SDT, $ID);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }
            function remove($ID_NguoiDatCho){
                try {
                    $db = new DB();
                    // xóa khách hàng
                    $sql = "delete from KhachHang where ID_NguoiDatCho = ?";
                    $params = array($ID_NguoiDatCho);
                    $db->execute($sql, $params);

                    // xóa thông tin đặt chổ
                    $sql = "delete from ThongTinDatCho where ID_NguoiDatCho = ?";
                    $db->execute($sql, $params);

                    // xóa người đặt chô
                    $sql = "delete from $this->table where ID_NguoiDatCho = ?";
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }

            function findKH($MaDatCho){
                try{
                 $db = new DB();
                 $sql = "select tmp8.*, lt.TenLoaiToa from (
                    select tmp7.*, t.MaLoaiToa from (
                        select tmp6.*, cn.MaToa from (
                            select tmp5.*, g2.TenGa as TenGaDiemDen from ( 
                                select tmp4.*, g1.TenGa as TenGaXuatPhat from ( 
                                    select tmp3.*, td.XuatPhat, td.DiemDen from ( 
                                        select tmp2.*, ct.MaTuyenDuong, ct.MaTau, ct.ThoiGianXuatPhat from ( 
                                            select kh.*, tmp.MaDatCho, tmp.TrangThai from ( 
                                                select ttdc.ID_NguoiDatCho, ttdc.MaDatCho, ttdc.TrangThai from ThongTinDatCho as ttdc 
                                                where ttdc.MaDatCho = ? ) as tmp, KhachHang as kh 
                                                where tmp.ID_NguoiDatCho = kh.ID_NguoiDatCho) as tmp2, ChuyenTau as ct 
                                                where tmp2.MaChuyenTau = ct.MaChuyenTau) as tmp3, TuyenDuong as td 
                                                where tmp3.MaTuyenDuong = td.MaTuyenDuong) as tmp4, Ga as g1 
                                                where tmp4.XuatPhat = g1.MaGa) as tmp5, Ga as g2 
                                                where tmp5.DiemDen = g2.MaGa) as tmp6, ChoNgoi as cn 
                                                where tmp6.MaChoNgoi = cn.MaChoNgoi) as tmp7, Toa as t 
                                                where t.MaToa = tmp7.MaToa) as tmp8, LoaiToa as lt 
                                                where lt.MaLoaiToa = tmp8.MaLoaiToa";
                 $params = array($MaDatCho);
                 $sth = $db->select($sql, $params);
                 $arr = [];
                 while($row = $sth->fetch()) {
                    $obj = new KhachHangObject($row);
                    $obj->setTG_XuatPhat($row['ThoiGianXuatPhat']);
                    $obj->setGaDi($row['TenGaXuatPhat']);
                    $obj->setGaDen($row['TenGaDiemDen']);
                    $obj->setMaToa($row['MaToa']);
                    $obj->setMaTau($row['MaTau']);
                    $obj->setTenLoaiToa($row['TenLoaiToa']);
                    $txt = '';
                    if($row['TrangThai'] == 0)
                        $txt = "Chưa thanh toán";
                    elseif($row['TrangThai'] == 1)
                        $txt = "Đã thanh toán";
                    else
                        $txt = "Đã hết hạn thanh toán";
                    $obj->setThanhToan($txt);
                    $arr[] = $obj;
                 }
                 return $arr;
                }
                catch (PDOException $e) {
                 // return $e->getMessage();
                 return "Lôi khi load khách hàng";
             }
             }

            function find($maDatCho){
                try{
                 $db = new DB();
                 $sql = "select tmp.*, NguoiDatCho.HoTen, NguoiDatCho.CCCD, NguoiDatCho.SDT, NguoiDatCho.Email from (
                    select * from ThongTinDatCho where MaDatCho = ?
                    ) as tmp, NguoiDatCho 
                    where tmp.ID_NguoiDatCho = NguoiDatCho.ID_NguoiDatCho";
                 $params = array($maDatCho);
                 $sth = $db->select($sql, $params);
                 $arr = [];
                 while($row = $sth->fetch()) {
                        $obj = new NguoiDatChoObject($row);

                        if($obj->getTrangThai() == 0)
                            $obj->setTrangThaitxt("Chờ thanh toán");
                        elseif($obj->getTrangThai() == 1)
                            $obj->setTrangThaitxt("Đã thanh toán");
                        elseif($obj->getTrangThai() == 2)
                            $obj->setTrangThaitxt("Bị hủy");
                        $arr[] = $obj;
                 }
                $arrKH = $this->findKH($arr[0]->getMaDatCho());
                $arr[0]->setdsKH($arrKH);
                if(count($arr) > 0)
                    return $arr;
                else
                    return "none";
                }
                catch (PDOException $e) {
                 // return $e->getMessage();
                 return "Lôi khi find khách hàng";
             }
             }

             // KIỂM TRA QUÁ HẠN
             function checkTG_TT(){
                try {
                    $db = new DB();
                    $sql = "UPDATE ThongTinDatCho SET TrangThai = ? WHERE DATEDIFF(CURDATE(), NgayDatCho) > 2 AND TrangThai = 0";
                    $db->execute($sql, array(2));
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }
        }
?>