<?php
    include_once "./module/db.php";
    include "MaObject.php";
    
        class Ma{
            function load($maChuyenTau){
                try {
                    // truy xuất những ghế đã được đặt trong chuyến
                    $db = new DB();
                    $sqlChoDaDat="select MaChoNgoi,ThongTinDatCho.TrangThai from ChuyenTau,KhachHang,ThongTinDatCho where ChuyenTau.MaChuyenTau=? and ChuyenTau.MaChuyenTau=KhachHang.MaChuyenTau and KhachHang.ID_NguoiDatCho=ThongTinDatCho.ID_NguoiDatCho";

                    $sth=$db->select($sqlChoDaDat,array($maChuyenTau));
                    $arr = [];

                    while($row = $sth->fetch()) {
                        $obj = new MaObject($row);
                        $arr[] = $obj;
                    }
                    return $arr;
                }
                catch (PDOException $e) {
                    return  $sqlChoDaDat . "<br>" . $e->getMessage();
                }
            }           

          
        }
?>