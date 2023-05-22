function handleDoiTuongGiamChange() {
    var doiTuongGiam = document.getElementById("doiTuongGiam").value;
    var ngayThangContainer = document.getElementById("ngayThangContainer");
    var CCCDContainer = document.getElementById("CCCDContainer");
    var thanhTien = document.querySelector('.thanhTien');
    var khuyenMai = document.getElementById("khuyenMaiCell");
    var giaVeChieuDiDefault = "1,200,000";
    var giaVeChieuVeDefault = "1,204,000";

    // Không cho chọn ngày lớn hơn ngày hiện tại
    var ngayThang = document.getElementById("ngayThang");
    var today = new Date().toISOString().split("T")[0];
    document.getElementById("ngayThang").setAttribute("max", today);

    // Kiểm tra nếu lựa chọn là "nguoiLon" thì trả về giá trị ban đầu
    if (doiTuongGiam === "nguoiLon") {
        ngayThangContainer.style.display = "none";
        CCCDContainer.style.display = "block";
        thanhTien.textContent = giaVeChieuDiDefault;
        thanhTien.append(document.createElement('br'));
        thanhTien.append(giaVeChieuVeDefault);
        ngayThang.value = "";
        khuyenMai.textContent = "Không có khuyến mãi vé này";
    }
    else
        if (doiTuongGiam === "treEm") {
            ngayThangContainer.style.display = "block";
            CCCDContainer.style.display = "none";
        }
        else
            if (doiTuongGiam === "nguoiCaoTuoi") {
                ngayThangContainer.style.display = "block";
                CCCDContainer.style.display = "block";
            }
            else {
                ngayThang.value = "";
                ngayThangContainer.style.display = "none";
            }
}

//Lấy thông tin người ngồi -> người đặt vé

const tenNguoiNgoi = document.getElementById('tenNguoiNgoi');
const fullname = document.getElementById('fullname');
const cccdNguoiNgoi = document.getElementById('cccdNguoiNgoi');
const idnumber = document.getElementById('idnumber');

tenNguoiNgoi.addEventListener('input', function () {
    fullname.value = tenNguoiNgoi.value;    
});
cccdNguoiNgoi.addEventListener('input', function () {
    idnumber.value = cccdNguoiNgoi.value;    
});


//Tính phần trăm khuyến mãi
function calculateTotal() {
    var doiTuongGiam = document.getElementById("doiTuongGiam").value;
    var ngayThang = document.getElementById("ngayThang").value;
    var khuyenMai = document.getElementById("khuyenMaiCell");
    var giam = 0;

    //Xét ngày
    var today = new Date().toISOString().split("T")[0];
    document.getElementById("ngayThang").setAttribute("max", today);
    document.getElementById("ngayThang").setAttribute("min", "1900-01-01");

    if (doiTuongGiam === "treEm") {
        var age = calculateAge(ngayThang);
        if (age <= 10) {
            khuyenMai.textContent = "Giảm giá 25%";
            giam = 0.25;
        }
        else {
            alert("Tuổi không phù hợp với lựa chọn Trẻ em. Vui lòng chọn lại ngày tháng sinh.");
            ngayThang.value = "";
            giam = 0;
        }
    }
    else
        if (doiTuongGiam === "nguoiCaoTuoi") {
            var age = calculateAge(ngayThang);
            if (age >= 60) {
                khuyenMai.textContent = "Giảm giá 15%";
                giam = 0.15;
            }
            else {
                alert("Tuổi không phù hợp với lựa chọn Người cao tuổi. Vui lòng chọn lại ngày tháng sinh.");
                ngayThang.value = "";
                giam = 0;
            }
        }
        else
            if (doiTuongGiam === "nguoiLon") {
                khuyenMai.textContent = "Không có khuyến mãi vé này";
                giam = 0;
            }
    return giam;
}
//Tính thành tiền và tổng tiền
function updateTotal() {
    var giaVeChieuDi = document.querySelector('.giaVeChieuDi .ng-binding');
    var giaVeChieuVe = document.querySelector('.giaVeChieuVe .ng-binding');
    var thanhTien = document.querySelector('.thanhTien');
    var tongTien = document.querySelector('.tongTien');

    var giaTriChieuDi = giaVeChieuDi.textContent.replace(/,/g, '');
    var giaTriChieuVe = giaVeChieuVe.textContent.replace(/,/g, '');

    var heSo = calculateTotal();
    var giaTriChieuDiSauKM = parseFloat(giaTriChieuDi) * (1 - heSo);
    var giaTriChieuVeSauKM = parseFloat(giaTriChieuVe) * (1 - heSo);

    // Cập nhật nội dung bảng
    thanhTien.textContent = giaTriChieuDiSauKM.toLocaleString().replace(/\./g, ',');
    thanhTien.append(document.createElement('br'));
    thanhTien.append(giaTriChieuVeSauKM.toLocaleString().replace(/\./g, ','));
    tongTien.textContent = parseFloat(giaTriChieuDiSauKM + giaTriChieuVeSauKM).toLocaleString().replace(/\./g, ',');
}

function calculateAge(birthDate) {
    var today = new Date();
    var birthDateObj = new Date(birthDate);
    var age = today.getFullYear() - birthDateObj.getFullYear();
    var monthDiff = today.getMonth() - birthDateObj.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDateObj.getDate())) {
        age--;
    }
    return age;
}

function apDungVoucher() {
    // Lấy giá trị của trường mã coupon
    var couponCode = document.getElementById('coupon').value;
    var messageElement = document.getElementById('couponMessage');
    // Kiểm tra nếu không có dữ liệu trong trường mã coupon
    if (couponCode === '') {
        // Hiển thị thông báo "Chưa nhập mã"
        document.getElementById('couponMessage').textContent = 'Chưa nhập mã.';
    } else {
        messageElement.textContent = 'Mã không đúng hoặc đã hết hiệu lực.';
    }
}
function quayLai() {
    window.location.href = "?page=ketquatimve";
}

//Kiểm tra các ràng buộc
function tiepTheo() {
    document.getElementById("formInfor").addEventListener("submit", function (event) {
        // Ngăn chặn gửi form mặc định
        event.preventDefault();
        var tenNguoiNgoi = document.getElementById("tenNguoiNgoi").value;
        var cccdNguoiNgoi = document.getElementById("cccdNguoiNgoi").value;
        var doiTuongGiam = document.getElementById("doiTuongGiam").value;
        var ngayThang = document.getElementById("ngayThang").value;
        var fullname = document.getElementById("fullname").value;
        var idnumber = document.getElementById("idnumber").value;
        var phone = document.getElementById("phone").value;
        var email = document.getElementById("email").value;
        var phoneNumberRegex = /^0\d{9}$/;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (tenNguoiNgoi == '' || fullname == '' || phone == '' || email == '' || idnumber == '') {
            alert("Vui lòng nhập đầy đủ thông tin");
        } else
            if ((doiTuongGiam === "treEm" || doiTuongGiam === "nguoiCaoTuoi") && ngayThang == '') {
                alert("Vui lòng chọn ngày sinh");
            }
            else
                if ((doiTuongGiam === "nguoiLon" || doiTuongGiam === "nguoiCaoTuoi") && cccdNguoiNgoi == '') {
                    alert("Vui lòng nhập CCCD/Hộ chiếu của người ngồi");
                } else
                    if (phoneNumberRegex.test(phone) == false) {
                        alert("Vui lòng nhập đúng số điện thoại");
                    } else
                        if (emailRegex.test(email) == false) {
                            alert("Vui lòng nhập đúng email");
                        } else {
                            document.getElementById("formInfor").submit();
                        }
    });
}