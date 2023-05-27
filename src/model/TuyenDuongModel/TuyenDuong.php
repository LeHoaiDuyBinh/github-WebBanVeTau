<?php
    include_once "./model/db.php";
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

            // check ga đi ga đên có trùng không
            function checkTuyenValid($XuatPhat, $DiemDen, $MaTuyenDuong){
                try {
                    $db = new DB();
                    $sql = "select * from TuyenDuong where XuatPhat = ? and DiemDen = ?";
                    $params = array($XuatPhat, $DiemDen);
                    $sth = $db->select($sql, $params);
                    while($row = $sth->fetch()) {
                        if($row['MaTuyenDuong'] != $MaTuyenDuong)
                            return true;
                    }
                    return false;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }
    
            function create($MaTuyenDuong, $XuatPhat, $DiemDen, $ThoiGianChay){
                try {
                    $db = new DB();
                    if($this->checkTuyenValid($XuatPhat, $DiemDen, $MaTuyenDuong))
                        return "Đã tồn tại một tuyến có cùng ga đi và ga đến như vậy!";
                    $sql = "insert into $this->table (MaTuyenDuong, XuatPhat, DiemDen, ThoiGianChay) values(?, ?, ?, ?)";
                    $params = array($MaTuyenDuong, $XuatPhat, $DiemDen, $ThoiGianChay);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {

                    // check trùng mã tuyến đường
                    if ($e->getCode() == '23000') {
                        if (strpos($e->getMessage(), 'Duplicate') !== false) {
                            return "Mã tuyến đã tồn tại, vui lòng nhập mã tuyến khác!";
                        }
                        else {
                            return "Lỗi không xác định!";
                        }
                    }
                    else {
                        return "Lỗi";
                    }
                }
            }
    
            function edit($MaTuyenDuong, $XuatPhat, $DiemDen, $ThoiGianChay){
                try {
                    $db = new DB();
                    if($this->checkTuyenValid($XuatPhat, $DiemDen, $MaTuyenDuong))
                        return "Đã tồn tại một tuyến có cùng ga đi và ga đến như vậy!";
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

                    // thông báo lỗi toàn vẹn data
                    if ($e->getCode() == '23000') {
                        $errorMessage = $e->getMessage();
                       
                        // tìm thông tin theo match
                        preg_match('/CONSTRAINT `([^`]+)` FOREIGN KEY \(`([^`]+)`\) REFERENCES `([^`]+)`/', $errorMessage, $matches);
                        $foreignKey = $matches[1];
                        $column = $matches[2];
                        $referencedTable = $matches[3];
    
                        // nếu liên quan đến bảng chuyến tàu
                        if (strpos($foreignKey, 'chuyentau') !== false) {
                            return "Tuyến này tồn tại trong một hoặc nhiều chuyến tàu, vui lòng sửa thông tin chuyến trước!";
                        }
                        else {
                            return "Lỗi không xác định";
                        }
                        // Thực hiện các hành động phù hợp
                    } else {
                        return "Lỗi";
                    }
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