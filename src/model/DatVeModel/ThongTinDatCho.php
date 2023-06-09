<?php 
include_once "./model/db.php";
#include_once "NguoiDatVeObject.php";
    class ThongTinDatCho{
        function insert($ID_NguoiDatCho,$TongTien,$TrangThai){
            try {
                $db = new DB();
                $sql="select * from ThongTinDatCho";
                $sth = $db->select($sql);
                $maDatCho=sprintf("DC%03d",$sth->rowCount()+1);

                $sql="insert into KhachHang(MaDatCho, ID_NguoiDatCho, NgayDatCho, TongTien, TrangThai) values (?, ?, CURDATE(), ?, ?)";
                $db->execute($sql,array($maDatCho,$ID_NguoiDatCho,$TongTien,$TrangThai));
                return $maDatCho;
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
    }
?>