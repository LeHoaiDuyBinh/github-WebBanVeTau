<?php
    include_once "./model/db.php";
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

                    // check trùng mã tàu
                    if ($e->getCode() == '23000') {
                        if (strpos($e->getMessage(), 'Duplicate') !== false) {
                            return "Mã tàu đã tồn tại, vui lòng nhập mã tàu khác!";
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

            function checkValidToEdit($MaTau){
                try {
                    $db = new DB();
                    $sql = "select * from ChuyenTau where ChuyenTau.MaTau = ? and ChuyenTau.ThoiGianXuatPhat >= CURDATE()";
                    $params = array($MaTau);
                    $sth = $db->select($sql, $params);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        return true;
                    }
                    return false;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }
    
            function edit($MaTau, $GaHienTai , $TrangThai, $TrangThai_old){
                try {
                    $db = new DB();
                    if($TrangThai_old == $TrangThai)
                        return "done";
                    if($this->checkValidToEdit($MaTau)){
                        return "Tàu này hiện sắp chạy cho một hoặc nhiều chuyến tàu, vui lòng chọn một tàu khác chạy các chuyến đó trước!";
                    }
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
                    if ($e->getCode() == '23000') {
                        $errorMessage = $e->getMessage();
                       // Lấy thông tin tuyenduong, XuatPhat và MaGa từ thông báo lỗi
                        preg_match('/CONSTRAINT `([^`]+)` FOREIGN KEY \(`([^`]+)`\) REFERENCES `([^`]+)`/', $errorMessage, $matches);
                        $foreignKey = $matches[1];
                        $column = $matches[2];
                        $referencedTable = $matches[3];
    
                        if (strpos($foreignKey, 'chuyentau') !== false) {
                            return "Tàu này tồn tại trong một hoặc nhiều chuyến tàu, vui lòng sửa thông tin chuyến trước!";
                        }
                        elseif(strpos($foreignKey, 'toa') !== false){
                            return "Tàu này hiện đã có toa, vui lòng xóa toa trước!";
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