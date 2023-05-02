<?php
    include_once "./module/db.php";
    include "LoaiToaObject.php";
        class LoaiToa{
            private $table = "LoaiToa";
            function load(){
                try {
                    $db = new DB();
                    $sql = "select * from $this->table";
                    $sth = $db->select($sql);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        $obj = new LoaiToaObject($row);
                        $arr[] = $obj;
                    }
                        return $arr;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }
    
            function create($MaLoaiToa, $TenLoaiToa , $Gia, $MoTa){
                try {
                    $db = new DB();
                    $sql = "insert into $this->table (MaLoaiToa, TenLoaiToa , Gia, MoTa) values(?, ?, ?, ?)";
                    $params = array($MaLoaiToa, $TenLoaiToa , $Gia, $MoTa);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Trùng mã loại toa";
                }
            }
    
            function edit($MaLoaiToa, $TenLoaiToa , $Gia, $MoTa){
                try {
                    $db = new DB();
                    $sql = "update $this->table set TenLoaiToa = ?, Gia = ?, MoTa = ? where MaLoaiToa = ?";
                    $params = array($TenLoaiToa , $Gia, $MoTa, $MaLoaiToa);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }
            function remove($MaLoaiToa){
                try {
                    $db = new DB();
                    $sql = "delete from $this->table where MaLoaiToa = ?";
                    $params = array($MaLoaiToa);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }
        }
?>