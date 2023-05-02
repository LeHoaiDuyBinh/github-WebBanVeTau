<?php
    include_once "./module/db.php";
    include "TuyenObject.php";
        class Tuyen{
            private $table = "Tuyen";
            function load(){
                try {
                    $db = new DB();
                    $sql = "select tmp.*, Ga.TenGa as TenGaDiemDen from Ga, 
                    (
                        select T.*, G.TenGa as TenGaXuatPhat from Tuyen as T, Ga as G 
                        where T.XuatPhat = G.MaGa
                    ) as tmp 
                    where tmp.DiemDen = Ga.MaGa";
                    $sth = $db->select($sql);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        $obj = new TuyenObject($row);
                        $arr[] = $obj;
                    }
                        return $arr;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }
    
            function create($MaTuyen, $XuatPhat, $DiemDen){
                try {
                    $db = new DB();
                    $sql = "insert into $this->table (MaTuyen, XuatPhat, DiemDen) values(?, ?, ?)";
                    $params = array($MaTuyen, $XuatPhat, $DiemDen);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Trùng mã tuyến";
                }
            }
    
            function edit($MaTuyen, $XuatPhat, $DiemDen){
                try {
                    $db = new DB();
                    $sql = "update $this->table set XuatPhat = ?, DiemDen = ? where MaTuyen = ?";
                    $params = array($XuatPhat, $DiemDen, $MaTuyen);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }
            function remove($MaTuyen){
                try {
                    $db = new DB();
                    $sql = "delete from $this->table where MaTuyen = ?";
                    $params = array($MaTuyen);
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