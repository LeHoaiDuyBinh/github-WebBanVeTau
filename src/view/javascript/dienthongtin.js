document.addEventListener("DOMContentLoaded", function () {
    //Tạo các form cho người ngồi
    var numberOfForms = 2; // Số lượng form cần tạo
    var table = document.getElementById("Table");
    //var formContainer = document.getElementById("formContainerNguoiNgoi"); // Phần tử chứa các form


    for (var i = 0; i < numberOfForms; i++) {
        var tableRow = document.createElement("tr");
        var tableData = document.createElement("td");
        var form = document.createElement("form"); // Tạo phần tử form
        form.id = "formInforNguoiNgoi" + i; // Gán id cho form
        form.method = "POST";
        form.action = "/?page=xacnhan";

        // Tạo các trường input và các phần tử khác trong form
        var inputRowDiv = document.createElement("div");
        inputRowDiv.className = "input-row";

        var nameLabel = document.createElement("label");
        nameLabel.setAttribute("for", "tenNguoiNgoi" + i); // Thêm biến đếm vào tên trường input
        nameLabel.textContent = "Họ và tên";

        var nameInput = document.createElement("input");
        nameInput.type = "text";
        nameInput.id = "tenNguoiNgoi" + i; // Thêm biến đếm vào id trường input
        nameInput.name = "tenNguoiNgoi" + i; // Thêm biến đếm vào tên trường input

        inputRowDiv.appendChild(nameLabel);
        inputRowDiv.appendChild(nameInput);

        var doiTuongLabel = document.createElement("label");
        doiTuongLabel.setAttribute("for", "doiTuongGiam" + i); // Thêm biến đếm vào tên trường select
        doiTuongLabel.textContent = "Đối tượng";

        var doiTuongSelect = document.createElement("select");
        doiTuongSelect.name = "doiTuongGiam" + i; // Thêm biến đếm vào tên trường select
        doiTuongSelect.id = "doiTuongGiam" + i; // Thêm biến đếm vào id trường select
        doiTuongSelect.setAttribute("onchange", "doiTuongGiamChange(" + i + ")");
        var option1 = document.createElement("option");
        option1.value = "nguoiLon";
        option1.textContent = "Người lớn";

        var option2 = document.createElement("option");
        option2.value = "treEm";
        option2.textContent = "Trẻ em";

        var option3 = document.createElement("option");
        option3.value = "nguoiCaoTuoi";
        option3.textContent = "Người cao tuổi";

        doiTuongSelect.appendChild(option1);
        doiTuongSelect.appendChild(option2);
        doiTuongSelect.appendChild(option3);

        var ngayThangContainer = document.createElement("div");
        ngayThangContainer.id = "ngayThangContainer" + i; // Thêm biến đếm vào id phần tử ngày tháng container
        ngayThangContainer.style.display = "none";

        var ngayThangLabel = document.createElement("label");
        ngayThangLabel.setAttribute("for", "ngayThang" + i); // Thêm biến đếm vào tên trường input ngày tháng
        ngayThangLabel.textContent = "Ngày tháng";

        var ngayThangInput = document.createElement("input");
        ngayThangInput.type = "date";
        ngayThangInput.name = "ngayThang" + i; // Thêm biến đếm vào tên trường input ngày tháng
        ngayThangInput.id = "ngayThang" + i; // Thêm biến đếm vào id trường input ngày tháng
        ngayThangInput.setAttribute("onchange", "updateTotal(" + i + ")");

        ngayThangContainer.appendChild(ngayThangLabel);
        ngayThangContainer.appendChild(ngayThangInput);

        var cccdContainer = document.createElement("div");
        cccdContainer.id = "CCCDContainer" + i; // Thêm biến đếm vào id phần tử CCCD container
        cccdContainer.style.display = "block";

        var cccdLabel = document.createElement("label");
        cccdLabel.setAttribute("for", "cccdNguoiNgoi" + i); // Thêm biến đếm vào tên trường input CCCD
        cccdLabel.style.marginTop = "10px";
        cccdLabel.textContent = "Số CCCD/Hộ chiếu";

        var cccdInput = document.createElement("input");
        cccdInput.type = "text";
        cccdInput.id = "cccdNguoiNgoi" + i; // Thêm biến đếm vào id trường input CCCD
        cccdInput.name = "cccdNguoiNgoi" + i; // Thêm biến đếm vào tên trường input CCCD

        cccdContainer.appendChild(cccdLabel);
        cccdContainer.appendChild(cccdInput);


        var lineBreak = document.createElement("br");
        form.appendChild(inputRowDiv);
        form.appendChild(lineBreak);
        form.appendChild(doiTuongLabel);
        form.appendChild(doiTuongSelect);
        form.appendChild(ngayThangContainer);
        form.appendChild(cccdContainer);

        //formContainer.appendChild(form); // Gắn form vào phần tử container
        tableData.appendChild(form);
        tableRow.appendChild(tableData);
        table.appendChild(tableRow);


        //add thông tin vé
        var thongTinVe = document.createElement("td");
        tableRow.appendChild(thongTinVe);

        //add giá vé
        var gia = document.createElement("td");
        var giaDi = document.createElement("div");
        var giaVe = document.createElement("div");
        tableRow.appendChild(gia);


        //add khuyến mãi
        var khuyenMai = document.createElement("td");
        khuyenMai.type = "text";
        khuyenMai.id = "khuyenMai" + i;
        khuyenMai.name = "khuyenMai" + i;
        khuyenMai.textContent = "Không có khuyến mãi cho vé này";
        tableRow.appendChild(khuyenMai);

        //add thành tiền
        var thanhTien = document.createElement("td");
        var thanhTienChieuDi = document.createElement("div");
        thanhTienChieuDi.type = "text";
        thanhTienChieuDi.id = "thanhTienChieuDi" + i;
        thanhTienChieuDi.name = "thanhTienChieuDi" + i;
        thanhTienChieuDi.textContent = "700,000";
        thanhTienChieuDi.value = 700000;
        thanhTien.appendChild(thanhTienChieuDi);

        var thanhTienChieuVe = document.createElement("div");
        thanhTienChieuVe.type = "text";
        thanhTienChieuVe.id = "thanhTienChieuVe" + i;
        thanhTienChieuVe.name = "thanhTienChieuVe" + i;
        thanhTienChieuVe.textContent = "800,000";
        thanhTienChieuVe.value = 800000;
        thanhTien.appendChild(thanhTienChieuVe);
        
        tableRow.appendChild(thanhTien);
        table.appendChild(tableRow);
    }

});


//Còn phần khuyến mãi của mỗi vé chưa cập nhật
function doiTuongGiamChange(id) {
    var doiTuongGiam = document.getElementById("doiTuongGiam" + id).value;
    var ngayThangContainer = document.getElementById("ngayThangContainer" + id);
    var CCCDContainer = document.getElementById("CCCDContainer" + id);
    var thanhTienChieuDi = document.getElementById("thanhTienChieuDi" + id);
    var thanhTienChieuVe = document.getElementById("thanhTienChieuVe" + id);
    var khuyenMai = document.getElementById("khuyenMai" + id);

    //Giá vé mặc định (add DB sau)
    var giaVeChieuDiDefault = "700,000";
    var giaVeChieuVeDefault = "800,000";

    // Không cho chọn ngày lớn hơn ngày hiện tại
    var ngayThang = document.getElementById("ngayThang" + id);
    var today = new Date().toISOString().split("T")[0];
    document.getElementById("ngayThang" + id).setAttribute("max", today);

    // Kiểm tra nếu lựa chọn là "nguoiLon" thì trả về giá trị ban đầu
    if (doiTuongGiam === "nguoiLon") {
        ngayThangContainer.style.display = "none";
        CCCDContainer.style.display = "block";
        thanhTienChieuDi.textContent = giaVeChieuDiDefault;
        thanhTienChieuVe.textContent = giaVeChieuVeDefault;
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



//Tính phần trăm khuyến mãi
function calculateTotal(id) {
    var doiTuongGiam = document.getElementById("doiTuongGiam" + id).value;
    var ngayThang = document.getElementById("ngayThang" + id).value;
    var khuyenMai = document.getElementById("khuyenMai" + id);
    var giam = 0;

    //Xét ngày
    var today = new Date().toISOString().split("T")[0];
    document.getElementById("ngayThang" + i).setAttribute("max", today);
    document.getElementById("ngayThang" + i).setAttribute("min", "1900-01-01");

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
function updateTotal(id) {

    // var giaVeChieuDi = document.getElementById("giaVeChieuDi" + id);
    // var giaVeChieuVe = document.getElementById("giaVeChieuVe" + id);
    var thanhTienChieuDi = document.getElementById("thanhTienChieuDi" + id);
    var thanhTienChieuVe = document.getElementById("thanhTienChieuVe" + id);

    //var tongTien = document.querySelector('.tongTien');

    var giaTriChieuDi = thanhTienChieuDi.textContent.replace(/,/g, '');
    var giaTriChieuVe = thanhTienChieuVe.textContent.replace(/,/g, '');

    var heSo = calculateTotal(id);
    var giaTriChieuDiSauKM = parseFloat(giaTriChieuDi) * (1 - heSo);
    var giaTriChieuVeSauKM = parseFloat(giaTriChieuVe) * (1 - heSo);

    // Cập nhật nội dung bảng
    thanhTienChieuDi.textContent = giaTriChieuDiSauKM.toLocaleString('en-US');
    thanhTienChieuDi.value = giaTriChieuDiSauKM;
    thanhTienChieuVe.textContent = giaTriChieuVeSauKM.toLocaleString('en-US');
    thanhTienChieuVe.value = giaTriChieuVeSauKM;
    var numberOfForms = 2; // Số lượng người ngồi
    var tongTien = document.getElementById("tongTien");
    tongTien.value = 0;
    for (var i = 0; i < numberOfForms; i++) {
        var ChieuDi = document.getElementById("thanhTienChieuDi" + i).value;
        var ChieuVe = document.getElementById("thanhTienChieuVe" + i).value;
        tongTien.value += ChieuDi + ChieuVe;
    }
    tongTien.textContent = tongTien.value.toLocaleString('en-US');
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
function tiepTheo(event) {
    event.preventDefault();

    var numberOfForms = 2; // Số lượng form cần tạo
    for (var i = 0; i < numberOfForms; i++) {
        var tenNguoiNgoi = document.getElementById("tenNguoiNgoi" + i).value;
        var cccdNguoiNgoi = document.getElementById("cccdNguoiNgoi" + i).value;
        var doiTuongGiam = document.getElementById("doiTuongGiam" + i).value;
        var ngayThang = document.getElementById("ngayThang" + i).value;
        if (tenNguoiNgoi == '') {
            alert("Vui lòng nhập đầy đủ thông tin");
            return;
        }
        else
            if ((doiTuongGiam === "treEm" || doiTuongGiam === "nguoiCaoTuoi") && ngayThang == '') {
                alert("Vui lòng chọn ngày sinh");
                return;
            }
            else
                if ((doiTuongGiam === "nguoiLon" || doiTuongGiam === "nguoiCaoTuoi") && cccdNguoiNgoi == '') {
                    alert("Vui lòng nhập CCCD/Hộ chiếu của người ngồi");
                    return;
                }
    }
    var fullname = document.getElementById("fullname").value;
    var idnumber = document.getElementById("idnumber").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var phoneNumberRegex = /^0\d{9}$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (fullname == '' || phone == '' || email == '' || idnumber == '') {
        alert("Vui lòng nhập đầy đủ thông tin");
        return;
    }
    else
        if (phoneNumberRegex.test(phone) == false) {
            alert("Vui lòng nhập đúng số điện thoại");
            return;
        } else
            if (emailRegex.test(email) == false) {
                alert("Vui lòng nhập đúng email");
                return;
            } else {
                combineForms(numberOfForms);
            }

}

//Gộp form thông tin người ngồi và thông tin người đặt chỗ thành 1 form
function combineForms(id) {

    // Tạo một form mới để chứa dữ liệu từ cả hai form
    var combinedForm = document.createElement("form");
    combinedForm.method = "POST";
    combinedForm.action = "/?page=xacnhan";

    // Sao chép các trường input từ formInfor vào form mới
    for (var i = 0; i < formInfor.elements.length; i++) {
        var input = formInfor.elements[i];
        if (input.type !== "submit") {
            var cloneInput = input.cloneNode(true);
            combinedForm.appendChild(cloneInput);
        }
    }

    // Sao chép các trường input từ formInforNguoiNgoi vào form mới (ngoại trừ đối tượng giảm)
    for (var i = 0; i < id; i++) {
        var formInforNguoiNgoi = document.getElementById("formInforNguoiNgoi" + i);
        for (var j = 0; j < formInforNguoiNgoi.elements.length; j++) {
            var inputNguoiNgoi = formInforNguoiNgoi.elements[j];
            if (inputNguoiNgoi.type !== "select-one" || inputNguoiNgoi.name !== "doiTuongGiam" + i) {
                var cloneInputNguoiNgoi = inputNguoiNgoi.cloneNode(true);
                combinedForm.appendChild(cloneInputNguoiNgoi);
            }
        }
        // Lấy giá trị của select doiTuongGiam trong formInforNguoiNgoi
        var doiTuongGiam = document.getElementById("doiTuongGiam" + i);
        var doiTuongGiamValue = doiTuongGiam.value;
        // Tạo một phần tử input ẩn để chứa giá trị của select doiTuongGiam
        var inputDoiTuongGiam = document.createElement("input");
        inputDoiTuongGiam.type = "hidden";
        inputDoiTuongGiam.name = "doiTuongGiam" + i;
        inputDoiTuongGiam.value = doiTuongGiamValue;
        combinedForm.appendChild(inputDoiTuongGiam);

        // thêm thành tiền chiều đi
        var inputThanhTienChieuDi = document.createElement("input");
        var inputThanhTienChieuDiValue = document.getElementById("thanhTienChieuDi" + i).value;
        inputThanhTienChieuDi.type = "hidden";
        inputThanhTienChieuDi.name = "thanhTienChieuDi" + i;
        inputThanhTienChieuDi.value = inputThanhTienChieuDiValue;
        combinedForm.appendChild(inputThanhTienChieuDi);
        // thêm thành tiền chiều về
        var inputThanhTienChieuVe = document.createElement("input");
        var inputThanhTienChieuVeValue = document.getElementById("thanhTienChieuVe" + i).value;
        inputThanhTienChieuVe.type = "hidden";
        inputThanhTienChieuVe.name = "thanhTienChieuVe" + i;
        inputThanhTienChieuVe.value = inputThanhTienChieuVeValue;
        combinedForm.appendChild(inputThanhTienChieuVe);

    }

    var tongTien = document.getElementById("tongTien").value;
    var inputTongTien = document.createElement("input");
    inputTongTien.type = "hidden";
    inputTongTien.name = "tongTien";
    inputTongTien.value = tongTien;
    combinedForm.appendChild(inputTongTien);

    // Thêm form mới vào body và gửi dữ liệu
    document.body.appendChild(combinedForm);
    combinedForm.submit();
}


