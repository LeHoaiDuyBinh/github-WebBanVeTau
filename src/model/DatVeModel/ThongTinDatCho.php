<?php 
include_once "./model/db.php";
include_once "ThongTinDatChoObject.php";
#include_once "NguoiDatVeObject.php";
    class ThongTinDatCho{
        function insert($ID_NguoiDatCho,$TongTien,$TrangThai){
            try {
                $db = new DB();
                $sql="select * from ThongTinDatCho";
                $sth = $db->select($sql);
                $maDatCho=sprintf("DC%03d",$sth->rowCount()+1);

                $sql="insert into ThongTinDatCho(MaDatCho, ID_NguoiDatCho, NgayDatCho, TongTien, TrangThai) values (?, ?, CURDATE(), ?, ?)";
                $db->execute($sql,array($maDatCho,$ID_NguoiDatCho,$TongTien,$TrangThai));
                return $maDatCho;
                }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
        }
        function select($maDatCho){
            try{
                $db = new DB();
                $sql ="SELECT tmp7.*, g2.TenGa as TenGaDiemDen from (SELECT tmp6.*, g1.TenGa as TenGaXuatPhat from (SELECT tmp5.*, td.XuatPhat, td.DiemDen from (SELECT tmp4.*, lt.TenLoaiToa as LoaiCho from (SELECT tmp3.*, t.MaLoaiToa from (SELECT tmp2.*, cn.MaToa from (SELECT tmp.*, ct.MaTuyenDuong, ct.MaTau, ct.ThoiGianXuatPhat from (select KhachHang.* from ThongTinDatCho,KhachHang WHERE MaDatCho=? and ThongTinDatCho.ID_NguoiDatCho=KhachHang.ID_NguoiDatCho) as tmp, ChuyenTau as ct WHERE tmp.MaChuyenTau = ct.MaChuyenTau) as tmp2, ChoNgoi as cn WHERE tmp2.MaChoNgoi = cn.MaChoNgoi) as tmp3, Toa as t WHERE tmp3.MaToa = t.MaToa) as tmp4, LoaiToa as lt WHERE tmp4.MaLoaiToa = lt.MaLoaiToa) as tmp5, TuyenDuong as td WHERE tmp5.MaTuyenDuong = td.MaTuyenDuong) as tmp6, Ga as g1 WHERE tmp6.XuatPhat = g1.MaGa) as tmp7, Ga as g2 WHERE tmp7.DiemDen = g2.MaGa;";
                $sth = $db->select($sql, array($maDatCho));
                $arr = [];
                while($row = $sth->fetch()) {
                    $obj = new ThongTinDatChoObject($row,$maDatCho);
                    $arr[]=$obj;
                }
                    return $arr;
            }
            catch (PDOException $e) {
                return  $sql . "<br>" . $e->getMessage();
            }
            
        }
    }
?>