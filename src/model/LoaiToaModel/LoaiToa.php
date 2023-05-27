<?php
    include_once "./model/db.php";
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
    
            function create($MaLoaiToa, $TenLoaiToa , $Gia, $MoTa, $SoChoNgoi){
                try {
                    $db = new DB();
                    $sql = "insert into $this->table (MaLoaiToa, TenLoaiToa , Gia, MoTa, SoChoNgoi) values(?, ?, ?, ?, ?)";
                    $params = array($MaLoaiToa, $TenLoaiToa , $Gia, $MoTa, $SoChoNgoi);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    if ($e->getCode() == '23000') {
                        if (strpos($e->getMessage(), 'Duplicate') !== false) {
                            return "Mã loại toa đã tồn tại, vui lòng nhập mã loại toa khác!";
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
    
            function edit($MaLoaiToa, $TenLoaiToa , $Gia, $MoTa, $SoChoNgoi){
                try {
                    $db = new DB();
                    $sql = "update $this->table set TenLoaiToa = ?, Gia = ?, MoTa = ?, SoChoNgoi = ? where MaLoaiToa = ?";
                    $params = array($TenLoaiToa , $Gia, $MoTa, $SoChoNgoi, $MaLoaiToa);
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
                    if ($e->getCode() == '23000') {
                        $errorMessage = $e->getMessage();
                       
                        // tìm thông tin theo match
                        preg_match('/CONSTRAINT `([^`]+)` FOREIGN KEY \(`([^`]+)`\) REFERENCES `([^`]+)`/', $errorMessage, $matches);
                        $foreignKey = $matches[1];
                        $column = $matches[2];
                        $referencedTable = $matches[3];
    
                        // nếu liên quan đến bảng chuyến tàu
                        if (strpos($foreignKey, 'toa') !== false) {
                            return "Loại toa này đã được gán vào toa, bạn không thể xóa!";
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
        }
?>