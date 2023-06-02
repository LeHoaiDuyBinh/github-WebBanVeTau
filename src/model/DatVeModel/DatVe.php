<?php 
include_once "./model/db.php";
include_once "DatVeObject.php";
include_once "Ghe.php";


    class DatVe{
        function load($maChuyenTau,$dsMaGhe){
            try {
                $db = new DB();
                $sql = "select * from(SELECT ChuyenTau.MaChuyenTau, ChuyenTau.ThoiGianXuatPhat, ChuyenTau.MaTau, GaXuatPhat.TenGa AS TenGaXuatPhat, GaDen.TenGa AS TenGaDen FROM ChuyenTau JOIN TuyenDuong ON ChuyenTau.MaTuyenDuong = TuyenDuong.MaTuyenDuong JOIN Ga AS GaXuatPhat ON TuyenDuong.XuatPhat = GaXuatPhat.MaGa JOIN Ga AS GaDen ON TuyenDuong.DiemDen = GaDen.MaGa) as chuyen where chuyen.MaChuyenTau=?"; // lấy chuyến tàu
                $sth = $db->select($sql, array($maChuyenTau));
                $arr = [];
                while($row = $sth->fetch()) {
                    $dsGhe=(new Ghe)->load($dsMaGhe);
                    $obj = new DatVeObject($row,$dsGhe);
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