<?php 
include_once "./model/db.php";
include_once "GaObject.php";
    class Ga{
        private $table = "Ga";
        function load(){
            try {
                $db = new DB();
                $sql = "select * from $this->table";
                $sth = $db->select($sql);
                $arr = [];
                while($row = $sth->fetch()) {
                    $obj = new GaObject($row);
                    $arr[] = $obj;
                }
                    return $arr;
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }

        function create($MaGa, $TenGa){
            try {
                $db = new DB();
                $sql = "insert into $this->table (MaGa, TenGa) values(?, ?)";
                $params = array($MaGa, $TenGa);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                
                // check trùng mã
                if ($e->getCode() == '23000') {
                    if (strpos($e->getMessage(), 'Duplicate') !== false) {
                        return "Mã ga đã tồn tại, vui lòng nhập mã ga khác!";
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

        function edit($MaGa, $TenGa){
            try {
                $db = new DB();
                $sql = "update $this->table set TenGa = ? where MaGa = ?";
                $params = array($TenGa, $MaGa);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                // return $e->getMessage();
                return "Lỗi";
            }
        }
        function remove($MaGa){
            try {
                $db = new DB();
                $sql = "delete from $this->table where MaGa = ?";
                $params = array($MaGa);
                $db->execute($sql, $params);
                return "done";
                }
            catch (PDOException $e) {
                
                // xóa nhưng lỗi khóa ngoại tới bảng tuyến
                if ($e->getCode() == '23000') {
                    $errorMessage = $e->getMessage();
                   // Lấy thông tin tuyenduong, XuatPhat và MaGa từ thông báo lỗi
                    preg_match('/CONSTRAINT `([^`]+)` FOREIGN KEY \(`([^`]+)`\) REFERENCES `([^`]+)`/', $errorMessage, $matches);
                    $foreignKey = $matches[1];
                    $column = $matches[2];
                    $referencedTable = $matches[3];

                    if (strpos($foreignKey, 'tuyenduong') !== false) {
                        return "Ga này tồn tại trong một hoặc nhiều tuyến đường, vui lòng xóa tuyến trước!";
                    }
                    elseif(strpos($foreignKey, 'tau') !== false){
                        return "Ga này hiện đang có tàu dừng chân, vui lòng xóa tàu trước!";
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