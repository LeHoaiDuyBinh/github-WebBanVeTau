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
                $sql = "select MaVe,HoTen,Ve.MaChuyenTau,Ve.MaChoNgoi,MaTau,MaToa,ThoiGianXuatPhat from KhachHang,Ve,ChuyenTau,ChoNgoi where KhachHang.MaChuyenTau=Ve.MaChuyenTau and KhachHang.MaChoNgoi=Ve.MaChoNgoi and ChuyenTau.MaChuyenTau=Ve.MaChuyenTau and ChoNgoi.MaChoNgoi=Ve.MaChoNgoi and MaVe IN ($placeholders)";
                $sth = $db->select($sql, $maVe);
                $arr = [];
                while($row = $sth->fetch()) {
                    $obj = new VeObject($row);
                    $arr[]=$obj;
                }
                    return $arr;
                }
            catch (PDOException $e) {
                var_dump($e);
                return  $sql . "<br>" . $e->getMessage();
            }
        }
    }
?>