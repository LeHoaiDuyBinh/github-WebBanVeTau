<?php 
include_once "./model/db.php";
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
            $db = new DB();
            $sql ="select HoTen,CCCD,TenLoaiToa as LoaiCho,ChoNgoi.MaToa,ChuyenTau.MaTau,KhachHang.MaChoNgoi,ThoiGianXuatPhat, GaXuatPhat.TenGa AS TenGaXuatPhat,GaDiemDen.TenGa AS TenGaDiemDen,TienVe
            from ThongTinDatCho,KhachHang,ChoNgoi,Toa,LoaiToa,ChuyenTau,Ga AS GaXuatPhat, Ga AS GaDiemDen,TuyenDuong
            where ThongTinDatCho.ID_NguoiDatCho=KhachHang.ID_NguoiDatCho and KhachHang.MaChoNgoi=ChoNgoi.MaChoNgoi and ChoNgoi.MaToa=Toa.MaToa and
            Toa.MaLoaiToa=LoaiToa.MaLoaiToa and TuyenDuong.XuatPhat = GaXuatPhat.MaGa and  TuyenDuong.DiemDen = GaDiemDen.MaGa where MaDatCho=?";
            $sth = $db->select($sql, $maDatCho);
            $arr = [];
            while($row = $sth->fetch()) {
                $obj = new ThongTinDatChoObject($row,$maDatCho);
                $arr[]=$obj;
            }
                return $arr;
        }
    }
?>