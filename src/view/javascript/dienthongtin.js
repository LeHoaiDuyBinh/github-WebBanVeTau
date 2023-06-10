function showLoadingSwal() {
    Swal.fire({
      title: 'Loading...',
      text: 'Vui lòng chờ trong giây lát!',
      timer: 6000,
      showConfirmButton: false,
      imageUrl: '/view/image/gif/loading.gif',
      onBeforeOpen: function() {
        Swal.showLoading();
      },
      allowOutsideClick: false // Không cho phép đóng khi click ra ngoài
    }).then((result) => {
      // Sau khi loading xong, điều hướng qua trang khác
      window.location = "/?page=xacnhan";
    });
  }
document.addEventListener("DOMContentLoaded", function () {
    //Tạo các form cho người ngồi

    var table = document.getElementById("Table");

    var dsGheDiElement = document.querySelector('.dsGheDi');
    var dsGheDiData = dsGheDiElement.dataset.dsGheDi;
    var dsGheDiArray = JSON.parse(dsGheDiData);

    //Vé chiều đi nhiều hơn hoặc bằng vé chiều về
    if ((checkDataVe() === false) || (dsGheDiArray.length >= lenArrVe())) {
        for (var i = 0; i < dsGheDiArray.length; i++) {
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
            nameLabel.setAttribute("for", "HoTen" + i); // Thêm biến đếm vào tên trường input
            nameLabel.textContent = "Họ và tên";

            var nameInput = document.createElement("input");
            nameInput.type = "text";
            nameInput.id = "HoTen" + i; // Thêm biến đếm vào id trường input
            nameInput.name = "HoTen" + i; // Thêm biến đếm vào tên trường input

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

            var NgaySinhContainer = document.createElement("div");
            NgaySinhContainer.id = "NgaySinhContainer" + i; // Thêm biến đếm vào id phần tử ngày tháng container
            //NgaySinhContainer.style.display = "none";

            var NgaySinhLabel = document.createElement("label");
            NgaySinhLabel.setAttribute("for", "NgaySinh" + i); // Thêm biến đếm vào tên trường input ngày tháng
            NgaySinhLabel.textContent = "Ngày tháng";

            var NgaySinhInput = document.createElement("input");
            NgaySinhInput.type = "date";
            NgaySinhInput.name = "NgaySinh" + i; // Thêm biến đếm vào tên trường input ngày tháng
            NgaySinhInput.id = "NgaySinh" + i; // Thêm biến đếm vào id trường input ngày tháng
            NgaySinhInput.setAttribute("onchange", "updateTotal(" + i + ")");

            NgaySinhContainer.appendChild(NgaySinhLabel);
            NgaySinhContainer.appendChild(NgaySinhInput);

            var cccdContainer = document.createElement("div");
            cccdContainer.id = "CCCDContainer" + i; // Thêm biến đếm vào id phần tử CCCD container
            cccdContainer.style.display = "block";

            var cccdLabel = document.createElement("label");
            cccdLabel.setAttribute("for", "CCCD" + i); // Thêm biến đếm vào tên trường input CCCD
            cccdLabel.style.marginTop = "10px";
            cccdLabel.textContent = "Số CCCD/Hộ chiếu/Số khai sinh";

            var cccdInput = document.createElement("input");
            cccdInput.type = "text";
            cccdInput.id = "CCCD" + i; // Thêm biến đếm vào id trường input CCCD
            cccdInput.name = "CCCD" + i; // Thêm biến đếm vào tên trường input CCCD

            cccdContainer.appendChild(cccdLabel);
            cccdContainer.appendChild(cccdInput);


            var lineBreak = document.createElement("br");
            var divDoiTuong = document.createElement("div");
            divDoiTuong.className = "divDoiTuong";
            divDoiTuong.appendChild(doiTuongLabel);
            divDoiTuong.appendChild(doiTuongSelect);

            form.appendChild(inputRowDiv);
            form.appendChild(lineBreak);
            form.appendChild(divDoiTuong);
            form.appendChild(NgaySinhContainer);
            form.appendChild(cccdContainer);

            //formContainer.appendChild(form); // Gắn form vào phần tử container
            tableData.appendChild(form);
            tableRow.appendChild(tableData);
            table.appendChild(tableRow);


            //add thông tin vé đi        
            var thongTin = document.createElement("td");

            var divGaXuatPhat = document.querySelector('div[name="gaXuatPhat"].chieuDi');
            var gaXuatPhatValue = divGaXuatPhat.dataset.gaXuatPhat;

            var divGaDen = document.querySelector('div[name="gaDen"].chieuDi');
            var gaDenValue = divGaDen.dataset.gaDen;

            var divThoiGian = document.querySelector('div[name="thoiGian"].chieuDi');
            var thoiGianValue = divThoiGian.dataset.thoiGian;
            var date = new Date(thoiGianValue); // Tạo đối tượng Date từ giá trị thời gian

            var day = date.getDate(); // Lấy ngày
            var month = date.getMonth() + 1; // Lấy tháng (chú ý: tháng trong JavaScript được đánh số từ 0)
            var year = date.getFullYear(); // Lấy năm
            var hours = date.getHours(); // Lấy giờ
            var minutes = date.getMinutes(); // Lấy phút        

            // Định dạng lại ngày, tháng, năm, giờ, phút, giây thành chuỗi dd/mm/yyyy hh:mm:ss
            var formattedDate = (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year + ' ' +
                (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;

            var gheDiObject = dsGheDiArray[i];
            var tenLoaiToa = gheDiObject.TenLoaiToa;
            var thuTuToa = gheDiObject.ThuTuToa;
            var choNgoi = gheDiObject.MaChoNgoi.slice(-2);

            var divMaChuyenTauDi = document.querySelector('div[name="maChuyenTau"].chieuDi');
            var maChuyenTauDiValue = divMaChuyenTauDi.dataset.maChuyenTau;
            var maChoNgoiDi = gheDiObject.MaChoNgoi;

            var thongTinDi = document.createElement("div");
            thongTinDi.id = "thongTinDi" + i;
            thongTinDi.dataset.maChuyenTau = maChuyenTauDiValue;
            thongTinDi.dataset.maChoNgoi = maChoNgoiDi;
            thongTinDi.dataset.gaXuatPhat = gaXuatPhatValue;
            thongTinDi.dataset.gaDen = gaDenValue;
            thongTinDi.dataset.thoiGian = thoiGianValue;
            thongTinDi.dataset.thuTuToa = thuTuToa;
            thongTinDi.dataset.tenLoaiToa = tenLoaiToa;

            thongTinDi.textContent = "Hành trình: " + gaXuatPhatValue + " - " + gaDenValue + " " + formattedDate +
                " Toa " + thuTuToa + " Chỗ ngồi " + choNgoi + " " + tenLoaiToa;
            thongTin.append(thongTinDi);
            thongTin.appendChild(lineBreak);


            //add thông tin vé về       
            var dsGheVeElement = document.querySelector('.dsGheVe');
            if (dsGheVeElement) {
                // Lớp .dsGheVe có dữ liệu
                var dsGheVeData = dsGheVeElement.dataset.dsGheVe;
                var dsGheVeArray;
                try {
                    dsGheVeArray = JSON.parse(dsGheVeData);
                    if (i < dsGheVeArray.length) {
                        // Thực hiện các tác vụ liên quan đến .dsGheVe ở đây
                        var divGaXuatPhat = document.querySelector('div[name="gaXuatPhat"].chieuVe');
                        var gaXuatPhatValue = divGaXuatPhat.dataset.gaXuatPhat;

                        var divGaDen = document.querySelector('div[name="gaDen"].chieuVe');
                        var gaDenValue = divGaDen.dataset.gaDen;

                        var divThoiGian = document.querySelector('div[name="thoiGian"].chieuVe');
                        var thoiGianValue = divThoiGian.dataset.thoiGian;
                        var date = new Date(thoiGianValue); // Tạo đối tượng Date từ giá trị thời gian

                        var day = date.getDate(); // Lấy ngày
                        var month = date.getMonth() + 1; // Lấy tháng (chú ý: tháng trong JavaScript được đánh số từ 0)
                        var year = date.getFullYear(); // Lấy năm
                        var hours = date.getHours(); // Lấy giờ
                        var minutes = date.getMinutes(); // Lấy phút        

                        // Định dạng lại ngày, tháng, năm, giờ, phút, giây thành chuỗi dd/mm/yyyy hh:mm:ss
                        var formattedDate = (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year + ' ' +
                            (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;

                        var gheVeObject = dsGheVeArray[i];
                        var tenLoaiToa = gheVeObject.TenLoaiToa;
                        var thuTuToa = gheVeObject.ThuTuToa;
                        var choNgoi = gheVeObject.MaChoNgoi.slice(-2);

                        var divMaChuyenTauVe = document.querySelector('div[name="maChuyenTau"].chieuVe');
                        var maChuyenTauVeValue = divMaChuyenTauVe.dataset.maChuyenTau;
                        var maChoNgoiVe = gheVeObject.MaChoNgoi;

                        var thongTinVe = document.createElement("div");
                        thongTinVe.id = "thongTinVe" + i;
                        thongTinVe.dataset.maChuyenTau = maChuyenTauVeValue;
                        thongTinVe.dataset.maChoNgoi = maChoNgoiVe;
                        thongTinVe.dataset.gaXuatPhat = gaXuatPhatValue;
                        thongTinVe.dataset.gaDen = gaDenValue;
                        thongTinVe.dataset.thoiGian = thoiGianValue;
                        thongTinVe.dataset.thuTuToa = thuTuToa;
                        thongTinVe.dataset.tenLoaiToa = tenLoaiToa;

                        thongTinVe.textContent = "Hành trình: " + gaXuatPhatValue + " - " + gaDenValue + " " + formattedDate +
                            " Toa " + thuTuToa + " Chỗ ngồi " + choNgoi + " " + tenLoaiToa;
                        thongTin.append(thongTinVe);
                    }
                } catch (error) {
                    console.error('Lỗi khi chuyển đổi dữ liệu thành mảng:', error);
                }
            }
            tableRow.appendChild(thongTin);

            //add giá vé
            var gia = document.createElement("td");
            //Giá đi
            var giaVeChieuDi = document.createElement("div");
            giaVeChieuDi.id = "giaVeChieuDi" + i;
            giaVeChieuDi.className = "common-class";
            giaVeChieuDi.textContent = parseFloat(gheDiObject.Gia).toLocaleString('en-US');
            giaVeChieuDi.value = gheDiObject.Gia;
            gia.appendChild(giaVeChieuDi);
            //Giá về
            var dsGheVeElement = document.querySelector('.dsGheVe');
            if (dsGheVeElement) {
                // Lớp .dsGheVe có dữ liệu
                var dsGheVeData = dsGheVeElement.dataset.dsGheVe;
                var dsGheVeArray;
                try {
                    dsGheVeArray = JSON.parse(dsGheVeData);
                    if (i < dsGheVeArray.length) {
                        var giaVeChieuVe = document.createElement("div");
                        giaVeChieuVe.id = "giaVeChieuVe" + i;
                        giaVeChieuVe.className = "common-class";
                        giaVeChieuVe.textContent = parseFloat(gheVeObject.Gia).toLocaleString('en-US');
                        giaVeChieuVe.value = gheVeObject.Gia;
                        gia.appendChild(giaVeChieuVe);
                    }
                } catch (error) {
                    console.error('Lỗi khi chuyển đổi dữ liệu thành mảng:', error);
                }
            }
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
            //thành tiền chiều đi
            var thanhTienChieuDi = document.createElement("div");
            thanhTienChieuDi.type = "text";
            thanhTienChieuDi.id = "thanhTienChieuDi" + i;
            thanhTienChieuDi.name = "thanhTienChieuDi" + i;
            thanhTienChieuDi.className = "common-class";
            thanhTienChieuDi.textContent = giaVeChieuDi.textContent;
            thanhTienChieuDi.value = parseInt(giaVeChieuDi.value);
            thanhTien.appendChild(thanhTienChieuDi);

            //thành tiền chiều về
            if (i < lenArrVe()) {
                var thanhTienChieuVe = document.createElement("div");
                thanhTienChieuVe.type = "text";
                thanhTienChieuVe.id = "thanhTienChieuVe" + i;
                thanhTienChieuVe.name = "thanhTienChieuVe" + i;
                thanhTienChieuVe.className = "common-class";
                thanhTienChieuVe.textContent = giaVeChieuVe.textContent;
                thanhTienChieuVe.value = parseInt(giaVeChieuVe.value);
                thanhTien.appendChild(thanhTienChieuVe);
            }
            tableRow.appendChild(thanhTien);
            table.appendChild(tableRow);
        }
    }
    //Vé về nhiều hơn vé đi
    else {
        var dsGheVeElement = document.querySelector('.dsGheVe');
        var dsGheVeData = dsGheVeElement.dataset.dsGheVe;
        var dsGheVeArray = JSON.parse(dsGheVeData);
        for (var i = 0; i < dsGheVeArray.length; i++) {
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
            nameLabel.setAttribute("for", "HoTen" + i); // Thêm biến đếm vào tên trường input
            nameLabel.textContent = "Họ và tên";

            var nameInput = document.createElement("input");
            nameInput.type = "text";
            nameInput.id = "HoTen" + i; // Thêm biến đếm vào id trường input
            nameInput.name = "HoTen" + i; // Thêm biến đếm vào tên trường input

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

            var NgaySinhContainer = document.createElement("div");
            NgaySinhContainer.id = "NgaySinhContainer" + i; // Thêm biến đếm vào id phần tử ngày tháng container
            //NgaySinhContainer.style.display = "none";

            var NgaySinhLabel = document.createElement("label");
            NgaySinhLabel.setAttribute("for", "NgaySinh" + i); // Thêm biến đếm vào tên trường input ngày tháng
            NgaySinhLabel.textContent = "Ngày tháng";

            var NgaySinhInput = document.createElement("input");
            NgaySinhInput.type = "date";
            NgaySinhInput.name = "NgaySinh" + i; // Thêm biến đếm vào tên trường input ngày tháng
            NgaySinhInput.id = "NgaySinh" + i; // Thêm biến đếm vào id trường input ngày tháng
            NgaySinhInput.setAttribute("onchange", "updateTotal(" + i + ")");

            NgaySinhContainer.appendChild(NgaySinhLabel);
            NgaySinhContainer.appendChild(NgaySinhInput);

            var cccdContainer = document.createElement("div");
            cccdContainer.id = "CCCDContainer" + i; // Thêm biến đếm vào id phần tử CCCD container
            cccdContainer.style.display = "block";

            var cccdLabel = document.createElement("label");
            cccdLabel.setAttribute("for", "CCCD" + i); // Thêm biến đếm vào tên trường input CCCD
            cccdLabel.style.marginTop = "10px";
            cccdLabel.textContent = "Số CCCD/Hộ chiếu/Số khai sinh";

            var cccdInput = document.createElement("input");
            cccdInput.type = "text";
            cccdInput.id = "CCCD" + i; // Thêm biến đếm vào id trường input CCCD
            cccdInput.name = "CCCD" + i; // Thêm biến đếm vào tên trường input CCCD

            cccdContainer.appendChild(cccdLabel);
            cccdContainer.appendChild(cccdInput);


            var lineBreak = document.createElement("br");
            var divDoiTuong = document.createElement("div");
            divDoiTuong.className = "divDoiTuong";
            divDoiTuong.appendChild(doiTuongLabel);
            divDoiTuong.appendChild(doiTuongSelect);

            form.appendChild(inputRowDiv);
            form.appendChild(lineBreak);
            form.appendChild(divDoiTuong);
            form.appendChild(NgaySinhContainer);
            form.appendChild(cccdContainer);

            //formContainer.appendChild(form); // Gắn form vào phần tử container
            tableData.appendChild(form);
            tableRow.appendChild(tableData);
            table.appendChild(tableRow);


            //add thông tin vé đi                    
            var thongTin = document.createElement("td");
            var dsGheDiElement = document.querySelector('.dsGheDi');
            if (dsGheDiElement) {
                var dsGheDiData = dsGheDiElement.dataset.dsGheDi;
                var dsGheDiArray;
                try {
                    dsGheDiArray = JSON.parse(dsGheDiData);
                    if (i < dsGheDiArray.length) {
                        var divGaXuatPhat = document.querySelector('div[name="gaXuatPhat"].chieuDi');
                        var gaXuatPhatValue = divGaXuatPhat.dataset.gaXuatPhat;

                        var divGaDen = document.querySelector('div[name="gaDen"].chieuDi');
                        var gaDenValue = divGaDen.dataset.gaDen;

                        var divThoiGian = document.querySelector('div[name="thoiGian"].chieuDi');
                        var thoiGianValue = divThoiGian.dataset.thoiGian;
                        var date = new Date(thoiGianValue); // Tạo đối tượng Date từ giá trị thời gian

                        var day = date.getDate(); // Lấy ngày
                        var month = date.getMonth() + 1; // Lấy tháng (chú ý: tháng trong JavaScript được đánh số từ 0)
                        var year = date.getFullYear(); // Lấy năm
                        var hours = date.getHours(); // Lấy giờ
                        var minutes = date.getMinutes(); // Lấy phút        

                        // Định dạng lại ngày, tháng, năm, giờ, phút, giây thành chuỗi dd/mm/yyyy hh:mm:ss
                        var formattedDate = (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year + ' ' +
                            (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;

                        var gheDiObject = dsGheDiArray[i];
                        var tenLoaiToa = gheDiObject.TenLoaiToa;
                        var thuTuToa = gheDiObject.ThuTuToa;
                        var choNgoi = gheDiObject.MaChoNgoi.slice(-2);

                        var divMaChuyenTauDi = document.querySelector('div[name="maChuyenTau"].chieuDi');
                        var maChuyenTauDiValue = divMaChuyenTauDi.dataset.maChuyenTau;
                        var maChoNgoiDi = gheDiObject.MaChoNgoi;

                        var thongTinDi = document.createElement("div");
                        thongTinDi.id = "thongTinDi" + i;
                        thongTinDi.dataset.maChuyenTau = maChuyenTauDiValue;
                        thongTinDi.dataset.maChoNgoi = maChoNgoiDi;
                        thongTinDi.dataset.gaXuatPhat = gaXuatPhatValue;
                        thongTinDi.dataset.gaDen = gaDenValue;
                        thongTinDi.dataset.thoiGian = thoiGianValue;
                        thongTinDi.dataset.thuTuToa = thuTuToa;
                        thongTinDi.dataset.tenLoaiToa = tenLoaiToa;
                        thongTinDi.textContent = "Hành trình: " + gaXuatPhatValue + " - " + gaDenValue + " " + formattedDate +
                            " Toa " + thuTuToa + " Chỗ ngồi " + choNgoi + " " + tenLoaiToa;
                        thongTin.append(thongTinDi);
                        thongTin.appendChild(lineBreak);
                    }
                } catch (error) {
                    console.error('Lỗi khi chuyển đổi dữ liệu thành mảng:', error);
                }

                //add thông tin vé về       
                var divGaXuatPhat = document.querySelector('div[name="gaXuatPhat"].chieuVe');
                var gaXuatPhatValue = divGaXuatPhat.dataset.gaXuatPhat;

                var divGaDen = document.querySelector('div[name="gaDen"].chieuVe');
                var gaDenValue = divGaDen.dataset.gaDen;

                var divThoiGian = document.querySelector('div[name="thoiGian"].chieuVe');
                var thoiGianValue = divThoiGian.dataset.thoiGian;
                var date = new Date(thoiGianValue); // Tạo đối tượng Date từ giá trị thời gian

                var day = date.getDate(); // Lấy ngày
                var month = date.getMonth() + 1; // Lấy tháng (chú ý: tháng trong JavaScript được đánh số từ 0)
                var year = date.getFullYear(); // Lấy năm
                var hours = date.getHours(); // Lấy giờ
                var minutes = date.getMinutes(); // Lấy phút        

                // Định dạng lại ngày, tháng, năm, giờ, phút, giây thành chuỗi dd/mm/yyyy hh:mm:ss
                var formattedDate = (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year + ' ' +
                    (hours < 10 ? '0' : '') + hours + ':' + (minutes < 10 ? '0' : '') + minutes;

                var gheVeObject = dsGheVeArray[i];
                var tenLoaiToa = gheVeObject.TenLoaiToa;
                var thuTuToa = gheVeObject.ThuTuToa;
                var choNgoi = gheVeObject.MaChoNgoi.slice(-2);

                var divMaChuyenTauVe = document.querySelector('div[name="maChuyenTau"].chieuVe');
                var maChuyenTauVeValue = divMaChuyenTauVe.dataset.maChuyenTau;
                var maChoNgoiVe = gheVeObject.MaChoNgoi;

                var thongTinVe = document.createElement("div");
                thongTinVe.dataset.maChuyenTau = maChuyenTauVeValue;
                thongTinVe.dataset.maChoNgoi = maChoNgoiVe;
                thongTinVe.dataset.gaXuatPhat = gaXuatPhatValue;
                thongTinVe.dataset.gaDen = gaDenValue;
                thongTinVe.dataset.thoiGian = thoiGianValue;
                thongTinVe.dataset.thuTuToa = thuTuToa;
                thongTinVe.dataset.tenLoaiToa = tenLoaiToa;
                thongTinVe.id = "thongTinVe" + i;
                thongTinVe.textContent = "Hành trình: " + gaXuatPhatValue + " - " + gaDenValue + " " + formattedDate +
                    " Toa " + thuTuToa + " Chỗ ngồi " + choNgoi + " " + tenLoaiToa;
                thongTin.append(thongTinVe);
            }
            tableRow.appendChild(thongTin);

            //add giá vé
            var gia = document.createElement("td");
            //Giá đi
            var dsGheDiElement = document.querySelector('.dsGheDi');
            if (dsGheDiElement) {
                var dsGheDiData = dsGheDiElement.dataset.dsGheDi;
                var dsGheDiArray;
                try {
                    dsGheDiArray = JSON.parse(dsGheDiData);
                    if (i < dsGheDiArray.length) {
                        var giaVeChieuDi = document.createElement("div");
                        giaVeChieuDi.id = "giaVeChieuDi" + i;
                        giaVeChieuDi.className = "common-class";
                        giaVeChieuDi.textContent = parseFloat(gheDiObject.Gia).toLocaleString('en-US');
                        giaVeChieuDi.value = gheDiObject.Gia;
                        gia.appendChild(giaVeChieuDi);
                    }
                } catch (error) {
                    console.error('Lỗi khi chuyển đổi dữ liệu thành mảng:', error);
                }
                //Giá về
                var giaVeChieuVe = document.createElement("div");
                giaVeChieuVe.id = "giaVeChieuVe" + i;
                giaVeChieuVe.className = "common-class";
                giaVeChieuVe.textContent = parseFloat(gheVeObject.Gia).toLocaleString('en-US');
                giaVeChieuVe.value = gheVeObject.Gia;
                gia.appendChild(giaVeChieuVe);
            }

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
            //thành tiền chiều đi
            if (i < dsGheDiArray.length) {
                var thanhTienChieuDi = document.createElement("div");
                thanhTienChieuDi.type = "text";
                thanhTienChieuDi.id = "thanhTienChieuDi" + i;
                thanhTienChieuDi.name = "thanhTienChieuDi" + i;
                thanhTienChieuDi.className = "common-class";
                thanhTienChieuDi.textContent = giaVeChieuDi.textContent;
                thanhTienChieuDi.value = parseInt(giaVeChieuDi.value);
                thanhTien.appendChild(thanhTienChieuDi);
            }
            //thành tiền chiều về

            var thanhTienChieuVe = document.createElement("div");
            thanhTienChieuVe.type = "text";
            thanhTienChieuVe.id = "thanhTienChieuVe" + i;
            thanhTienChieuVe.name = "thanhTienChieuVe" + i;
            thanhTienChieuVe.className = "common-class";
            thanhTienChieuVe.textContent = giaVeChieuVe.textContent;
            thanhTienChieuVe.value = parseInt(giaVeChieuVe.value);
            thanhTien.appendChild(thanhTienChieuVe);

            tableRow.appendChild(thanhTien);
            table.appendChild(tableRow);
        }
    }

});

//kiểm tra đối tượng
function doiTuongGiamChange(id) {
    var doiTuongGiam = document.getElementById("doiTuongGiam" + id).value;
    // var NgaySinhContainer = document.getElementById("NgaySinhContainer" + id);
    // var CCCDContainer = document.getElementById("CCCDContainer" + id);
    // var thanhTienChieuDi = document.getElementById("thanhTienChieuDi" + id);
    // var thanhTienChieuVe = document.getElementById("thanhTienChieuVe" + id);
    // var khuyenMai = document.getElementById("khuyenMai" + id);

    //Giá vé mặc định
    // var giaVeChieuDiDefault = document.getElementById("giaVeChieuDi" + i);
    // if (checkDataVe() === true) {
    //     var giaVeChieuVeDefault = document.getElementById("giaVeChieuVe" + i);
    // }
    // Không cho chọn ngày lớn hơn ngày hiện tại
    var NgaySinh = document.getElementById("NgaySinh" + id);
    var today = new Date().toISOString().split("T")[0];
    document.getElementById("NgaySinh" + id).setAttribute("max", today);

    // Kiểm tra nếu lựa chọn là "nguoiLon" thì trả về giá trị ban đầu
    if (doiTuongGiam === "nguoiLon") {
        var age = calculateAge(NgaySinh);
        if (age >= 60 || age <= 10) {
            alert("Tuổi không phù hợp với lựa chọn Người lớn. Vui lòng chọn lại ngày tháng sinh.");
            NgaySinh.value = "";
        }
        else {
            NgaySinh.value = "";
            updateTotal(id);
        }
    }
    else
        if (doiTuongGiam === "treEm") {
            var age = calculateAge(NgaySinh);
            if (age > 10) {
                alert("Tuổi không phù hợp với lựa chọn Trẻ em. Vui lòng chọn lại ngày tháng sinh.");
            }
            NgaySinh.value = "";
        }
        else
            if (doiTuongGiam === "nguoiCaoTuoi") {
                if (age < 60) {
                    alert("Tuổi không phù hợp với lựa chọn Người cao tuổi. Vui lòng chọn lại ngày tháng sinh.");
                }
                NgaySinh.value = "";
            }
}


//Tính phần trăm khuyến mãi
function calculateTotal(id) {
    var doiTuongGiam = document.getElementById("doiTuongGiam" + id).value;
    var NgaySinh = document.getElementById("NgaySinh" + id);
    var khuyenMai = document.getElementById("khuyenMai" + id);

    //Xét ngày
    var today = new Date().toISOString().split("T")[0];
    document.getElementById("NgaySinh" + i).setAttribute("max", today);
    document.getElementById("NgaySinh" + i).setAttribute("min", "1900-01-01");

    if (doiTuongGiam === "treEm") {
        var age = calculateAge(NgaySinh.value);
        if (age <= 10) {
            khuyenMai.textContent = "Giảm giá 25%";
            giam = 0.25;
        }
        else {
            alert("Tuổi không phù hợp với lựa chọn Trẻ em. Vui lòng chọn lại ngày tháng sinh.");
            NgaySinh.value = "";
            giam = 0;
        }
    }
    else
        if (doiTuongGiam === "nguoiCaoTuoi") {
            var age = calculateAge(NgaySinh.value);
            if (age >= 60) {
                khuyenMai.textContent = "Giảm giá 15%";
                giam = 0.15;
            }
            else {
                alert("Tuổi không phù hợp với lựa chọn Người cao tuổi. Vui lòng chọn lại ngày tháng sinh.");
                NgaySinh.value = "";
                giam = 0;
            }
        }
        else
            if (doiTuongGiam === "nguoiLon") {
                var age = calculateAge(NgaySinh.value);
                if (age >= 60 || age <= 10) {
                    alert("Tuổi không phù hợp với lựa chọn Người lớn. Vui lòng chọn lại ngày tháng sinh.");
                    NgaySinh.value = "";
                    giam = 0;
                }
                else {
                    khuyenMai.textContent = "Không có khuyến mãi cho vé này";
                    giam = 0;
                }
            }

    return giam;
}
//Tính thành tiền và tổng tiền
function updateTotal(id) {

    //chiều đi
    if (id < lenArrDi()) {
        var giaVeChieuDi = document.getElementById("giaVeChieuDi" + id).value;
        var thanhTienChieuDi = document.getElementById("thanhTienChieuDi" + id);
        var heSo = calculateTotal(id);
        var giaTriChieuDiSauKM = giaVeChieuDi * (1 - heSo);
        thanhTienChieuDi.textContent = giaTriChieuDiSauKM.toLocaleString('en-US');
        thanhTienChieuDi.value = giaTriChieuDiSauKM;
    }

    //Chiều về
    if (id < lenArrVe()) {
        var giaVeChieuVe = document.getElementById("giaVeChieuVe" + id).value;
        var thanhTienChieuVe = document.getElementById("thanhTienChieuVe" + id);
        var heSo = calculateTotal(id);
        var giaTriChieuVeSauKM = giaVeChieuVe * (1 - heSo);
        thanhTienChieuVe.textContent = giaTriChieuVeSauKM.toLocaleString('en-US');
        thanhTienChieuVe.value = giaTriChieuVeSauKM;
    }
    // Cập nhật nội dung bảng
    var dsGheDiElement = document.querySelector('.dsGheDi');
    var dsGheDiData = dsGheDiElement.dataset.dsGheDi;
    var dsGheDiArray = JSON.parse(dsGheDiData);
    if ((checkDataVe() === false) || (dsGheDiArray.length >= lenArrVe())) {
        //Vé đi nhiều hơn hoặc bằng vé về        
        var tongTien = document.getElementById("tongTien");
        tongTien.value = 0;
        for (var i = 0; i < dsGheDiArray.length; i++) {
            var ChieuDi = parseInt(document.getElementById("thanhTienChieuDi" + i).value);
            tongTien.value += ChieuDi;
            if (i < lenArrVe()) {
                var ChieuVe = parseInt(document.getElementById("thanhTienChieuVe" + i).value);
                tongTien.value += ChieuVe;
            }
        }
    }
    //Vé về nhiều hơn
    else {
        var dsGheVeElement = document.querySelector('.dsGheVe');
        var dsGheVeData = dsGheVeElement.dataset.dsGheVe;
        var dsGheVeArray = JSON.parse(dsGheVeData);
        var tongTien = document.getElementById("tongTien");
        tongTien.value = 0;
        for (var i = 0; i < dsGheVeArray.length; i++) {
            if (i < lenArrDi()) {
                var ChieuDi = parseInt(document.getElementById("thanhTienChieuDi" + i).value);
                tongTien.value += ChieuDi;
            }
            var ChieuVe = parseInt(document.getElementById("thanhTienChieuVe" + i).value);
            tongTien.value += ChieuVe;
        }
    }
    tongTien.textContent = parseInt(tongTien.value).toLocaleString('en-US');
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
    history.back(); // Quay lại trang trước đó trong lịch sử duyệt
}

//Kiểm tra các ràng buộc
function tiepTheo(event) {
    event.preventDefault();

    var dsGheDiElement = document.querySelector('.dsGheDi');
    var dsGheDiData = dsGheDiElement.dataset.dsGheDi;
    var dsGheDiArray = JSON.parse(dsGheDiData);

    if ((checkDataVe() === false) || (dsGheDiArray.length >= lenArrVe())) {
        var numberOfForms = dsGheDiArray.length;
    } else var numberOfForms = lenArrVe();

    for (var i = 0; i < numberOfForms; i++) {
        var HoTen = document.getElementById("HoTen" + i).value;
        var CCCD = document.getElementById("CCCD" + i).value;
        var doiTuongGiam = document.getElementById("doiTuongGiam" + i).value;
        var NgaySinh = document.getElementById("NgaySinh" + i).value;
        if (HoTen == "") {
            alert("Vui lòng nhập đầy đủ thông tin");
            return;
        }
        else if (NgaySinh == "") {
            alert("Vui lòng chọn ngày sinh");
            return;
        }
        else if ((doiTuongGiam === "nguoiLon" || doiTuongGiam === "nguoiCaoTuoi") && CCCD == "") {
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

    if (fullname == "" || phone == "" || email == "" || idnumber == "") {
        alert("Vui lòng nhập đầy đủ thông tin");
        return;
    } else if (phoneNumberRegex.test(phone) == false) {
        alert("Vui lòng nhập đúng số điện thoại");
        return;
    } else if (emailRegex.test(email) == false) {
        alert("Vui lòng nhập đúng email");
        return;
    } else {
        var formData = combineForms(numberOfForms);
        var jsonData = JSON.stringify(formData);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/?page=xacnhan", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.send(jsonData);
        showLoadingSwal();
    }
}

//Gộp form thông tin người ngồi và thông tin người đặt chỗ thành 1 đối tượng JSON
function combineForms(id) {
    var formData = {
        nguoiNgoi: [],
        thongTinNguoiDat: {},
    };
    //add thông tin vé đi
    for (var i = 0; i < id; i++) {
        if (i < lenArrDi()) {
            var formInforNguoiNgoi = document.getElementById("formInforNguoiNgoi" + i);
            var nguoiNgoi = {};

            for (var j = 0; j < formInforNguoiNgoi.elements.length; j++) {
                var inputNguoiNgoi = formInforNguoiNgoi.elements[j];
                if (inputNguoiNgoi.type !== "select-one" || inputNguoiNgoi.name !== "doiTuongGiam" + i) {
                    var fieldName = inputNguoiNgoi.name.replace(/[0-9]+$/, '');
                    nguoiNgoi[fieldName] = inputNguoiNgoi.value;
                }
            }
            var doiTuongGiam = document.getElementById("doiTuongGiam" + i);
            var doiTuongGiamValue = doiTuongGiam.value;
            nguoiNgoi["doiTuongGiam"] = doiTuongGiamValue;

            // Lấy thông tin từ div thongTinDi
            var divThongTinDi = document.getElementById("thongTinDi" + i);
            var maChuyenTauVeValue = divThongTinDi.dataset.maChuyenTau;
            nguoiNgoi["MaChuyenTau"] = maChuyenTauVeValue;
            var maChoNgoiValue = divThongTinDi.dataset.maChoNgoi;
            nguoiNgoi["MaChoNgoi"] = maChoNgoiValue;
            var gaXuatPhatValue = divThongTinDi.dataset.gaXuatPhat;
            nguoiNgoi["gaXuatPhat"] = gaXuatPhatValue;
            var gaDenValue = divThongTinDi.dataset.gaDen;
            nguoiNgoi["gaDen"] = gaDenValue;
            var thoiGianValue = divThongTinDi.dataset.thoiGian;
            nguoiNgoi["thoiGian"] = thoiGianValue;
            var thuTuToaValue = divThongTinDi.dataset.thuTuToa;
            nguoiNgoi["thuTuToa"] = thuTuToaValue;
            var tenLoaiToaValue = divThongTinDi.dataset.tenLoaiToa;
            nguoiNgoi["tenLoaiToa"] = tenLoaiToaValue;

            var thanhTienChieuDiValue = document.getElementById("thanhTienChieuDi" + i).value;
            nguoiNgoi["TienVe"] = thanhTienChieuDiValue;

            var giaVeChieuDiValue = document.getElementById("giaVeChieuDi" + i).value;
            nguoiNgoi["giaVe"] = parseInt(giaVeChieuDiValue);

            formData.nguoiNgoi.push(nguoiNgoi);
        }
    }

    //add thông tin vé về
    for (var i = 0; i < id; i++) {
        if (i < lenArrVe()) {
            var formInforNguoiNgoi = document.getElementById("formInforNguoiNgoi" + i);
            var nguoiNgoi = {};

            for (var j = 0; j < formInforNguoiNgoi.elements.length; j++) {
                var inputNguoiNgoi = formInforNguoiNgoi.elements[j];
                if (inputNguoiNgoi.type !== "select-one" || inputNguoiNgoi.name !== "doiTuongGiam" + i) {
                    var fieldName = inputNguoiNgoi.name.replace(/[0-9]+$/, '');
                    nguoiNgoi[fieldName] = inputNguoiNgoi.value;
                }
            }

            var doiTuongGiam = document.getElementById("doiTuongGiam" + i);
            var doiTuongGiamValue = doiTuongGiam.value;
            nguoiNgoi["doiTuongGiam"] = doiTuongGiamValue;

            // Lấy thông tin từ div thongTinVe
            var divThongTinVe = document.getElementById("thongTinVe" + i);
            var maChuyenTauVeValue = divThongTinVe.dataset.maChuyenTau;
            nguoiNgoi["MaChuyenTau"] = maChuyenTauVeValue;
            var maChoNgoiValue = divThongTinVe.dataset.maChoNgoi;
            nguoiNgoi["MaChoNgoi"] = maChoNgoiValue;
            var gaXuatPhatValue = divThongTinVe.dataset.gaXuatPhat;
            nguoiNgoi["gaXuatPhat"] = gaXuatPhatValue;
            var gaDenValue = divThongTinVe.dataset.gaDen;
            nguoiNgoi["gaDen"] = gaDenValue;
            var thoiGianValue = divThongTinVe.dataset.thoiGian;
            nguoiNgoi["thoiGian"] = thoiGianValue;
            var thuTuToaValue = divThongTinVe.dataset.thuTuToa;
            nguoiNgoi["thuTuToa"] = thuTuToaValue;
            var tenLoaiToaValue = divThongTinVe.dataset.tenLoaiToa;
            nguoiNgoi["tenLoaiToa"] = tenLoaiToaValue;

            var thanhTienChieuVeValue = document.getElementById("thanhTienChieuVe" + i).value;
            nguoiNgoi["TienVe"] = thanhTienChieuVeValue;

            var giaVeChieuVeValue = document.getElementById("giaVeChieuVe" + i).value;
            nguoiNgoi["giaVe"] = parseInt(giaVeChieuVeValue);

            formData.nguoiNgoi.push(nguoiNgoi);
        }
    }

    formData.thongTinNguoiDat.HoTen = document.getElementById("fullname").value;
    formData.thongTinNguoiDat.CCCD = document.getElementById("idnumber").value;
    formData.thongTinNguoiDat.SDT = document.getElementById("phone").value;
    formData.thongTinNguoiDat.Email = document.getElementById("email").value;
    var selectedRadio = document.querySelector('input[name="thanhToan"]:checked');
    if (selectedRadio) {
        formData.thongTinNguoiDat.thanhToan = selectedRadio.value;
    }
    formData.thongTinNguoiDat.TienVe = document.getElementById("tongTien").value;

    return formData;
}


//Check data Về
function checkDataVe() {
    var dsGheVeElement = document.querySelector('.dsGheVe');
    if (dsGheVeElement) {
        var dsGheVeData = dsGheVeElement.getAttribute('data-ds-ghe-ve');
        if (dsGheVeData) {
            try {
                var dsGheVeArray = JSON.parse(dsGheVeData);
                return true;
            } catch (error) {
                return false;
            }
        }
    }
    return false;
}

//Check data Đi
function checkDataDi() {
    var dsGheDiElement = document.querySelector('.dsGheDi');
    if (dsGheDiElement) {
        var dsGheDiData = dsGheDiElement.getAttribute('data-ds-ghe-di');
        if (dsGheDiData) {
            try {
                var dsGheDiArray = JSON.parse(dsGheDiData);
                return true;
            } catch (error) {
                return false;
            }
        }
    }
    return false;
}

function lenArrVe() {
    var dsGheVeElement = document.querySelector('.dsGheVe');
    if (checkDataVe() === true) {
        var dsGheVeData = dsGheVeElement.dataset.dsGheVe;
        var dsGheVeArray = JSON.parse(dsGheVeData);
        return dsGheVeArray.length;
    }
    else return 0;
}
function lenArrDi() {
    var dsGheDiElement = document.querySelector('.dsGheDi');
    if (checkDataDi() === true) {
        var dsGheDiData = dsGheDiElement.dataset.dsGheDi;
        var dsGheDiArray = JSON.parse(dsGheDiData);
        return dsGheDiArray.length;
    }
    else return 0;
}