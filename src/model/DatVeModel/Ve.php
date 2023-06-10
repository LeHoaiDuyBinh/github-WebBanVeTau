<?php 
include_once "./model/db.php";
include_once "VeObject.php";
    class Ve{
        function insert($MaChuyenTau,$MaChoNgoi){
            try {
                $db = new DB();
                $sql="select * from Ve";
                $sth = $db->select($sql);
                $MaVe=sprintf("V%03d",$sth->rowCount()+1);

                $sql="insert into Ve(MaVe, MaChuyenTau, MaChoNgoi) values (?, ?, ?)";
                $db->execute($sql,array($MaVe,$MaChuyenTau,$MaChoNgoi));
                return $MaVe;
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
        function select($maVe){
            try {
                $placeholders = rtrim(str_repeat('?,', count($maVe)), ',');
                $db = new DB();
                $sql = "SELECT Ve.MaVe, KhachHang.HoTen, Ve.MaChuyenTau, Ve.MaChoNgoi, MaTau, MaToa, ThoiGianXuatPhat, GaXuatPhat.TenGa AS TenGaXuatPhat, GaDiemDen.TenGa AS TenGaDiemDen FROM KhachHang, Ve, ChuyenTau, ChoNgoi, TuyenDuong, Ga AS GaXuatPhat, Ga AS GaDiemDen WHERE KhachHang.MaChuyenTau = Ve.MaChuyenTau AND KhachHang.MaChoNgoi = Ve.MaChoNgoi AND ChuyenTau.MaChuyenTau = Ve.MaChuyenTau AND ChuyenTau.MaTuyenDuong = TuyenDuong.MaTuyenDuong AND ChoNgoi.MaChoNgoi = Ve.MaChoNgoi AND TuyenDuong.XuatPhat = GaXuatPhat.MaGa AND TuyenDuong.DiemDen = GaDiemDen.MaGa and MaVe IN ($placeholders)";
                $sth = $db->select($sql, $maVe);
                $arr = [];
                while($row = $sth->fetch()) {
                    $obj = new VeObject($row);
                    $arr[]=$obj;
                }
                    return $arr;
                }
            catch (PDOException $e) {
                //var_dump($e);
                return  $sql . "<br>" . $e->getMessage();
            }
        }
    }
?>