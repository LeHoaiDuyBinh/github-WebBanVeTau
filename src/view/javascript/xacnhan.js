function dongY(event){
    event.preventDefault();
    var thanhToan = document.querySelector('.thanhToan');
    var thanhToanValue = thanhToan.dataset.thanhToan;
   if (thanhToanValue === "QR"){
        window.location = "http://localhost:8090/?page=thanhToan&HinhThuc=QR";
    }
   else
    window.location = "http://localhost:8090/?page=loadInfor";
}