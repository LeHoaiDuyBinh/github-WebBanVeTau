<?php
    include_once "./module/db.php";
    include "ToaObject.php";
        class Toa{
            private $table = "Toa";
            function load(){
                try {
                    $db = new DB();
                    $sql = "select T.*, LT.TenLoaiToa from $this->table as T, LoaiToa as LT
                    where T.MaLoaiToa = LTL.MaLoaiToa";
                    $sth = $db->select($sql);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        $obj = new ToaObject($row);
                        $arr[] = $obj;
                    }
                        return $arr;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }
    
            // function create($MaToa, $TenToa , $Gia, $MoTa){
            //     try {
            //         $db = new DB();
            //         $sql = "insert into $this->table (MaToa, TenToa , Gia, MoTa) values(?, ?, ?, ?)";
            //         $params = array($MaToa, $TenToa , $Gia, $MoTa);
            //         $db->execute($sql, $params);
            //         return "done";
            //         }
            //     catch (PDOException $e) {
            //         // return $e->getMessage();
            //         return "Trùng mã toa";
            //     }
            // }
    
            // function edit($MaToa, $TenToa , $Gia, $MoTa){
            //     try {
            //         $db = new DB();
            //         $sql = "update $this->table set TenToa = ?, Gia = ?, MoTa = ? where MaToa = ?";
            //         $params = array($TenToa , $Gia, $MoTa, $MaToa);
            //         $db->execute($sql, $params);
            //         return "done";
            //         }
            //     catch (PDOException $e) {
            //         // return $e->getMessage();
            //         return "Lỗi";
            //     }
            // }
            // function remove($MaToa){
            //     try {
            //         $db = new DB();
            //         $sql = "delete from $this->table where MaToa = ?";
            //         $params = array($MaToa);
            //         $db->execute($sql, $params);
            //         return "done";
            //         }
            //     catch (PDOException $e) {
            //         // return $e->getMessage();
            //         return "Lỗi";
            //     }
            // }
        }
?>