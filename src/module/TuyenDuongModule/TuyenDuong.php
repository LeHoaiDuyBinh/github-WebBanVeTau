<?php
    include_once "./module/db.php";
    include_once "TuyenDuongObject.php";
        class TuyenDuong{
            private $table = "TuyenDuong";
            function load(){
                try {
                    $db = new DB();
                    $sql = "select tmp.*, Ga.TenGa as TenGaDiemDen from Ga, 
                    (
                        select T.*, G.TenGa as TenGaXuatPhat from TuyenDuong as T, Ga as G 
                        where T.XuatPhat = G.MaGa
                    ) as tmp 
                    where tmp.DiemDen = Ga.MaGa";
                    $sth = $db->select($sql);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        $obj = new TuyenDuongObject($row);
                        $arr[] = $obj;
                    }
                        return $arr;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }
    
            function create($MaTuyenDuong, $XuatPhat, $DiemDen, $ThoiGianChay){
                try {
                    $db = new DB();
                    $sql = "insert into $this->table (MaTuyenDuong, XuatPhat, DiemDen, ThoiGianChay) values(?, ?, ?, ?)";
                    $params = array($MaTuyenDuong, $XuatPhat, $DiemDen, $ThoiGianChay);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    return $e->getMessage();
                    // return "Trùng mã tuyến";
                }
            }
    
            function edit($MaTuyenDuong, $XuatPhat, $DiemDen, $ThoiGianChay){
                try {
                    $db = new DB();
                    $sql = "update $this->table set XuatPhat = ?, DiemDen = ?, ThoiGianChay = ? where MaTuyenDuong = ?";
                    $params = array($XuatPhat, $DiemDen, $ThoiGianChay, $MaTuyenDuong);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }
            function remove($MaTuyenDuong){
                try {
                    $db = new DB();
                    $sql = "delete from $this->table where MaTuyenDuong = ?";
                    $params = array($MaTuyenDuong);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }

            function find($MaTuyenDuong){
                try {
                    $db = new DB();
                    $sql = "select * from $this->table where MaTuyenDuong = ?";
                    $params = array($MaTuyenDuong);
                    $sth = $db->select($sql, $params);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        $obj = new TuyenDuongObject($row);
                        $arr[] = $obj;
                    }
                        return $arr;
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }
        }
?>