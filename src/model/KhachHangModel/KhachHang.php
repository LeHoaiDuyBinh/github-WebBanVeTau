<?php
    include_once "./model/db.php";
    include_once "KhachHangObject.php";
        class KhachHang{
            private $table = "KhachHang";
            function load(){
                try {
                    $db = new DB();
                    $sql = "select tmp.*, v.MaVe from (
                        select kh.*, ndc.HoTen as HoTenNguoiDatCho 
                        from KhachHang as kh, NguoiDatCho as ndc 
                        where kh.ID_NguoiDatCho = ndc.ID_NguoiDatCho
                        ) as tmp 
                        left join Ve as v 
                        on tmp.MaChoNgoi = v.MaChoNgoi";
                    $sth = $db->select($sql);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        $obj = new KhachHangObject($row);

                        $arr[] = $obj;

                    }
                        return $arr;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }
    
            function edit($ID, $HoTen, $CCCD, $NgaySinh){
                try {
                    $db = new DB();
                    $sql = "update $this->table set HoTen = ?, CCCD = ?, NgaySinh = ? where ID_KhachHang = ?";
                    $params = array($HoTen, $CCCD, $NgaySinh, $ID);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }
            function remove($ID_KhachHang, $TienVe, $ID_NguoiDatCho){
                try {
                    $db = new DB();
                    // xóa khách hàng
                    $sql = "delete from KhachHang where ID_KhachHang = ?";
                    $params = array($ID_KhachHang);
                    $db->execute($sql, $params);

                    // update tổng tiền
                    $sql = "update ThongTinDatCho set TongTien = TongTien - ? where ID_NguoiDatCho = ?";
                    $params = array($TienVe, $ID_NguoiDatCho);
                    $db->execute($sql, $params);

                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return $e;
                }
            }
        }
?>