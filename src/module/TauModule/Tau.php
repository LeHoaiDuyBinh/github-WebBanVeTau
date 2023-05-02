<?php
    include_once "./module/db.php";
    include "TauObject.php";
        class Tau{
            private $table = "Tau";
            function load(){
                try {
                    $db = new DB();
                    $sql = "select T.*, G.TenGa from $this->table as T, Ga as G
                    where T.GaHienTai = G.MaGa";
                    $sth = $db->select($sql);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        $obj = new TauObject($row);
                        $arr[] = $obj;
                    }
                        return $arr;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }
    
            function create($MaTau, $GaHienTai , $TrangThai){
                try {
                    $db = new DB();
                    $sql = "insert into $this->table (MaTau, GaHienTai , TrangThai) values(?, ?, ?)";
                    $params = array($MaTau, $GaHienTai , $TrangThai);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Trùng mã tàu";
                }
            }
    
            function edit($MaTau, $GaHienTai , $TrangThai){
                try {
                    $db = new DB();
                    $sql = "update $this->table set GaHienTai = ?, TrangThai = ? where MaTau = ?";
                    $params = array($GaHienTai , $TrangThai, $MaTau);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }
            function remove($MaTau){
                try {
                    $db = new DB();
                    $sql = "delete from $this->table where MaTau = ?";
                    $params = array($MaTau);
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