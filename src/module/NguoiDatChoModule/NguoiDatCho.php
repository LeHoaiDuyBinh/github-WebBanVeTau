<?php
    include_once "./module/db.php";
    include "NguoiDatChoObject.php";
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
    
            function createThanhToan($MaDatCho){
                try {
                    $db = new DB();
                    $sql = "insert into ThanhToan (MaDatCho, NgayThanhToan , LoaiThanhToan) values(?, CURDATE(), ?)";
                    $params = array($MaDatCho, "Tien mat");
                    $db->execute($sql, $params);

                    $sql = "update ThongTinDatCho set TrangThai = ? where MaDatCho = ?";
                    $params = array(1, $MaDatCho);
                    $db->execute($sql, $params);
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
        }
?>