<?php 
include_once "./model/db.php";
#include_once "NguoiDatVeObject.php";
    class ThanhToan{
        function insert($maDatCho,$LoaiThanhToan){
            try {
                $db = new DB();
                $sql="insert into ThanhToan(MaDatCho, NgayThanhToan, LoaiThanhToan) values (?, CURDATE(), ?)";
                $db->execute($sql,array($maDatCho,$LoaiThanhToan));
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
    }
?>