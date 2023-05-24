<?php
    include_once "./module/db.php";
    include "ChoNgoiObject.php";
    include "MaObject.php";
    
        class ChoNgoi{
            function load($maToa,$maChuyenTau,$maTau,$ThoiGianXuatPhat){
                try {
                    // truy xuất tất cả chỗ ngồi của toa
                    $db = new DB();
                    $sqlTatCaChoNgoi = "select *,2 as 'TrangThai' from ChoNgoi where maToa=?";
                    $sth = $db->select($sqlTatCaChoNgoi,array($maToa));
                    $arr = [];

                    while($row = $sth->fetch()) {
                        $obj = new ChoNgoiObject($row,$maTau,$ThoiGianXuatPhat);
                        $arr[] = $obj;
                    }
                    // truy xuất những ghế đã được đặt trong chuyến
                    $sqlChoDaDat="select MaChoNgoi,TrangThai from ChuyenTau,KhachHang,ThongTinDatCho where ChuyenTau.MaChuyenTau=? and ChuyenTau.MaChuyenTau=KhachHang.MaChuyenTau and KhachHang.ID_NguoiDatCho=ThongTinDatCho.ID_NguoiDatCho";
                    $sth2=$db->select($sqlChoDaDat,array($maChuyenTau));
                    $arrChoDuocDat = [];
                    while($row = $sth2->fetch()) {
                        $obj = new MaObject($row);
                        $arrChoDuocDat[] = $obj;
                    }
                    foreach($arr as $each){
                        foreach($arrChoDuocDat as $eachChoDuocDat){
                            if($each->getMaChoNgoi()==$eachChoDuocDat->getMaChoNgoi()){
                                $each->getTrangThai()=$eachChoDuocDat->getTrangThai();
                            }
                        }
                    }
                    return $arr;
                }
                catch (PDOException $e) {
                    return  $sqlChoDaDat . "<br>" . $e->getMessage();
                }
            }           

          
        }
?>