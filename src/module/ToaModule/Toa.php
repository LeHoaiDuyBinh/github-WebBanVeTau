<?php
    include_once "./module/db.php";
    include "ToaObject.php";
        class Toa{
            private $table = "Toa";
            function load(){
                try {
                    $db = new DB();
                    $sql = "select TMP.*, LT.TenLoaiToa from 
                    (select T.* from Tau as TU, $this->table as T where TU.MaTau = T.MaTau) as TMP, LoaiToa as LT 
                    where TMP.MaLoaiToa = LT.MaLoaiToa 
                    order by TMP.ThuTuToa DESC";
                    $sth = $db->select($sql);
                    $arr = [];
                    while($row = $sth->fetch()) {
                        $obj = new ToaObject($row);
                        $arr[] = $obj;
                    }
                    $map = [];
                    foreach ($arr as $item) {
                        $ma_tau = $item->getMaTau();
                        // Kiểm tra xem key có tồn tại trong mảng kết hợp chưa
                        if (!isset($map[$ma_tau])) {
                            $map[$ma_tau] = [];
                        }

                        // Thêm toa vào danh sách toa thuộc tàu đó
                        $map[$ma_tau][] = $item;
                    }

                        return $map;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }

            function getSTT($MaTau){
                try {
                    $db = new DB();
                    $sql = "select COUNT(*) as Tong from $this->table as T where T.MaTau = ?";
                    $params = array($MaTau);
                    $sth = $db->select($sql, $params);
                    $Tong = 0;
                    while($row = $sth->fetch()) {
                        $Tong = $row['Tong'];
                    }
                        return $Tong + 1;
                    }
                catch (PDOException $e) {
                    return  $sql . "<br>" . $e->getMessage();
                }
            }

            function addChoNgoi($MaToa, $max){
                try{
                    $db = new DB();
                    for ($i = 1; $i <= $max; $i++) {
                        $MaChoNgoi = sprintf('%s%03d', $MaToa, $i);
                        $sqlChoNgoi = "insert into ChoNgoi (MaChoNgoi, MaToa, TrangThai) values (?, ?, ?)";
                        $paramsChoNgoi = array($MaChoNgoi, $MaToa, 0);
                        $db->execute($sqlChoNgoi, $paramsChoNgoi);
                    }
                }
                catch (PDOException $e) {
                    // Xử lý ngoại lệ tại chỗ
                    return "Lỗi khi thêm Chỗ ngồi: " . $e->getMessage();
                }
            }

            function checkTrangThaiTau($MaTau){
                try {
                    $db = new DB();
                    $sql = "select Tau.TrangThai from Tau where Tau.MaTau = ?";
                    $params = array($MaTau);
                    $sth = $db->select($sql, $params);

                    while($row = $sth->fetch()) {
                        if($row['TrangThai'] == 0)
                            return true;
                    }
                    return false;
                }
                    
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }
    
            function create($MaToa, $MaTau , $MaLoaiToa){
                try {
                    $db = new DB();
                    if($this->checkTrangThaiTau($MaTau)){
                        return "Tàu đang chạy không thể thêm toa";
                    }
                    $stt = $this->getSTT($MaTau);
                    $sql = "insert into $this->table (MaToa, MaTau, MaLoaiToa, ThuTuToa) values(?, ?, ?, ?)";
                    $params = array($MaToa, $MaTau, $MaLoaiToa, $stt);
                    $db->execute($sql, $params);
                    if ($MaLoaiToa == 'LT001') {
                        $error = $this->addChoNgoi($MaToa, 64, $db);
                    }
                    elseif ($MaLoaiToa == 'LT002') {
                        $error = $this->addChoNgoi($MaToa, 48, $db);
                    }
                    elseif($MaLoaiToa == 'LT003') {
                        $error = $this->addChoNgoi($MaToa, 32, $db);
                    }
                    if($error == NULL)
                        return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Trùng mã toa";
                }
            }
    
            function edit($MaToa, $MaTau){
                try {
                    $db = new DB();
                    if($this->checkTrangThaiTau($MaTau)){
                        return "Tàu đang chạy không thể sửa toa";
                    }
                    $sql = "update $this->table set MaTau = ? where MaToa = ?";
                    $params = array($MaTau, $MaToa);
                    $db->execute($sql, $params);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Lỗi";
                }
            }

            function removeChoNgoi($MaToa){
                try{
                    $db = new DB();
                    $sqlChoNgoi = "delete from ChoNgoi where ChoNgoi.MaToa = ?";
                    $paramsChoNgoi = array($MaToa);
                    $db->execute($sqlChoNgoi, $paramsChoNgoi);
                }
                catch (PDOException $e) {
                    // Xử lý ngoại lệ tại chỗ
                    return "Lỗi khi xóa Chỗ ngồi: " . $e->getMessage();
                }
            }

            function remove($MaToa, $ThuTuToa, $MaTau){
                try {
                    if($this->checkTrangThaiTau($MaTau)){
                        return "Tàu đang chạy không thể xóa toa";
                    }
                    $this->removeChoNgoi($MaToa);
                    $db = new DB();
                    $sql = "delete from $this->table where MaToa = ?";
                    $params = array($MaToa);
                    $res = $db->execute($sql, $params);
                    $sql = "update $this->table set ThuTuToa = ThuTuToa - 1 where ThuTuToa > ? and MaTau = ?";
                    $params = array($ThuTuToa, $MaTau);
                    $db->execute($sql, $params);
                    $this->removeChoNgoi($MaToa);
                    return "done";
                    }
                catch (PDOException $e) {
                    // return $e->getMessage();
                    return "Có ngoại lệ khi xóa!";
                }
            }
        }
?>