<?php 
include_once "./model/db.php";
include_once "NguoiDatVeObject.php";
    class NguoiDatVe{
        function insert($thongTinNguoiDat){
            try {
                $db = new DB();
                $sql="insert into NguoiDatCho(HoTen, CCCD, SDT, Email) values (?, ?, ?, ?)";
                $db->execute($sql,$thongTinNguoiDat);
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
        function select($cccd){
            try {
                $db = new DB();
                $sql = "select * from NguoiDatCho where cccd=? order by ID_NguoiDatCho DESC limit 1"; // lấy chuyến tàu
                $sth = $db->select($sql, array($cccd));
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