<?php 
include_once "./model/db.php";
include_once "NguoiDatChoObject.php";
    class NguoiDatVe{
        function insert($thongTinNguoiDat,$Ve){
            try {
                $db = new DB();
                $sql="insert into NguoiDatCho(HoTen, CCCD, SDT, Email) values (?, ?, ?, ?)";
                $db->execute($sql,$thongTinNguoiDat);
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
        function select($maDatVe){
            try {
                $db = new DB();
                $sql = "select * from NguoiDatCho"; // lấy chuyến tàu
                $sth = $db->select($sql, array($maDatVe));
                $arr = [];
                while($row = $sth->fetch()) {
                    $obj = new NguoiDatVeObject($row);
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