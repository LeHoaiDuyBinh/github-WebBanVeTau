<?php 
include_once "./module/db.php";
include_once "Toa.php";
include_once "timVeObject.php";


    class TimVe{
        function load($TenGaXuatPhat,$TenGaDiemDen,$ThoiGianXuatPhat){
            try {
                $db = new DB();
                $sql = "SELECT * FROM (select CT.*, TD_TMP.TenGaDiemDen, TD_TMP.TenGaXuatPhat, TD_TMP.ThoiGianChay, TD_TMP.XuatPhat, TD_TMP.DiemDen 
                from ChuyenTau as CT, ( 
                    select tmp1.*, G2.TenGa as TenGaDiemDen from ( 
                        select TD.*, G.TenGa as TenGaXuatPhat from Ga as G, TuyenDuong as TD where G.MaGa = TD.XuatPhat 
                        ) 
                        as tmp1, Ga as G2 where tmp1.DiemDen = G2.MaGa 
                        ) as TD_TMP where CT.MaTuyenDuong = TD_TMP.MaTuyenDuong
                        )  as chuyen WHERE chuyen.TenGaXuatPhat=? and chuyen.TenGaDiemDen=? and chuyen.ThoiGianXuatPhat LIKE ? and chuyen.TrangThai=0"; // lấy chuyến tàu
                $sth = $db->select($sql, array($TenGaXuatPhat,$TenGaDiemDen,$ThoiGianXuatPhat."%"));
                $arr = [];
                while($row = $sth->fetch()) {
                    $toa=(new Toa)->load($row['MaTau'],$row['MaChuyenTau'],$ThoiGianXuatPhat);
                    $obj = new TimVeObject($row,$toa);
                    $arr[]=$obj;
                }

                    return $arr;
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
    }
?>