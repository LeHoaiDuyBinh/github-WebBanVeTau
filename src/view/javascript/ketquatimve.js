// Xử lý sự kiện click vào tàu hover lên + ẩn đi chỗ ngồi và title toa khi bấm vào tàu khác
const trains = document.querySelectorAll('.et-train-block.train-oneway');
trains.forEach(train => {
    //Ẩn đi chỗ ngồi + tàu khác + title toa
    train.addEventListener('click', () => {
        var khoangs = document.querySelectorAll('.khoang.oneway');
        khoangs.forEach(function (khoang) {
            khoang.style.display = 'none';
        });
        var container1 = document.querySelector('.col-xs-12.col-sm-12.col-md-12.text-center.oneway');
        container1.style.display = 'none';
        trains.forEach(train => {
            train.querySelector('.et-train-head').classList.remove('et-train-head-selected');
        });
        train.querySelector('.et-train-head').classList.add('et-train-head-selected');
    });
});

const trainRounds = document.querySelectorAll('.et-train-block.train-return');
trainRounds.forEach(train => {
    //Ẩn đi chỗ ngồi + tàu khác + title toa
    train.addEventListener('click', () => {
        var khoangs = document.querySelectorAll('.khoang.return');
        khoangs.forEach(function (khoang) {
            khoang.style.display = 'none';
        });
        var container2 = document.querySelector('.col-xs-12.col-sm-12.col-md-12.text-center.return');
        container2.style.display = 'none';
        trainRounds.forEach(train => {
            train.querySelector('.et-train-head').classList.remove('et-train-head-selected');
        });
        train.querySelector('.et-train-head').classList.add('et-train-head-selected');
    });
});


/*======================================================================================================*/
//Hiển thị các toa tàu khi click vào tàu
// Tàu một chiều
const trainOneways = document.querySelectorAll('.train-oneway');
console.log(trainOneways);
trainOneways.forEach(trainOneway => {
    trainOneway.addEventListener('click', () => {
        const trainCodeOneway = trainOneway.dataset.code;
        const coachOneways = document.querySelectorAll('.coach-oneway');
        coachOneways.forEach(coachOneway => {
            if (coachOneway.dataset.code === trainCodeOneway) {
                coachOneway.style.display = 'block';
            } else {
                coachOneway.style.display = 'none';
            }
        });
    });
});
// Tàu khứ hồi
const trainReturns = document.querySelectorAll('.train-return');
trainReturns.forEach(trainReturn => {
    trainReturn.addEventListener('click', () => {
        const trainCodeReturn = trainReturn.dataset.code;
        const coachReturns = document.querySelectorAll('.coach-return');
        coachReturns.forEach(coachReturn => {
            if (coachReturn.dataset.code === trainCodeReturn) {
                coachReturn.style.display = 'block';
            } else {
                coachReturn.style.display = 'none';
            }
        });
    });
});


/*======================================================================================================*/
// Xử lý sự kiện hover khi click vào toa và hiển thị số toa + thông tin toa + danh sách chỗ ngồi
var selectedToaElement = null;
var toaElements = document.querySelectorAll('.toa');
var khoangs = document.querySelectorAll('.khoang');
khoangs.forEach(function (khoang) {
    khoang.style.display = 'none';
});

toaElements.forEach(function (toaElement) {
    toaElement.addEventListener('click', function () {
        // chỉnh màu cho toa
        var icon = this.querySelector('.et-car-icon');
        icon.classList.add('et-car-icon-selected');
        icon.classList.remove('et-car-icon-avaiable');
        if (selectedToaElement !== null && selectedToaElement !== this) {
            var selectedIcon = selectedToaElement.querySelector('.et-car-icon');
            selectedIcon.classList.add('et-car-icon-avaiable');
            selectedIcon.classList.remove('et-car-icon-selected');
        }

        // đặt thông tin cho toa
        selectedToaElement = this;
        var dataCode = this.getAttribute('data-code');
        var toaNumber = this.getAttribute('data-toa');
        var toaTitle = this.getAttribute('tooltip');
        var toaInfo = "Toa số " + toaNumber + ": " + toaTitle;

        // tàu chiều đi, hiển thị khoang được chọn tại lớp 'seatTrain-oneway' nếu toa có class 'oneway'
        if (this.classList.contains('oneway')) {
            var seatTrainOneway = document.querySelector('.seatTrain-oneway');
            seatTrainOneway.style.display = 'block';

            var khoangElements = seatTrainOneway.querySelectorAll('.khoang');
            khoangElements.forEach(function (khoang) {
                khoang.style.display = 'none';
            });
            if (toaTitle.includes('Giường Nằm 6')) {
                var khoang1 = seatTrainOneway.querySelector('#khoang1[data-code="' + dataCode + '"]');
                khoang1.style.display = 'block';
            } else if (toaTitle.includes('Ngồi mềm điều hòa')) {
                var khoang2 = seatTrainOneway.querySelector('#khoang2[data-code="' + dataCode + '"]');
                khoang2.style.display = 'block';
            } else if (toaTitle.includes('Giường Nằm 4')) {
                var khoang3 = seatTrainOneway.querySelector('#khoang3[data-code="' + dataCode + '"]');
                khoang3.style.display = 'block';
            }
        }

        // tàu chiều về, hiển thị khoang được chọn tại lớp 'seatTrain-round' nếu toa có class 'round'
        if (this.classList.contains('return')) {
            var seatTrainRound = document.querySelector('.seatTrain-return');
            seatTrainRound.style.display = 'block';

            var khoangElements = seatTrainRound.querySelectorAll('.khoang');
            khoangElements.forEach(function (khoang) {
                khoang.style.display = 'none';
            });
            if (toaTitle.includes('Giường Nằm 6')) {
                var khoang1 = seatTrainRound.querySelector('#khoang1[data-code="' + dataCode + '"]');
                khoang1.style.display = 'block';
            } else if (toaTitle.includes('Ngồi mềm điều hòa')) {
                var khoang2 = seatTrainRound.querySelector('#khoang2[data-code="' + dataCode + '"]');
                khoang2.style.display = 'block';
            } else if (toaTitle.includes('Giường Nằm 4')) {
                var khoang3 = seatTrainRound.querySelector('#khoang3[data-code="' + dataCode + '"]');
                khoang3.style.display = 'block';
            }
        }
        // Hiển thị thông tin toa
        var message = document.createElement('h4');
        message.textContent = toaInfo;
        //message.classList.add('oneway');
        var container;
        if (this.classList.contains('oneway')) {
            container = document.querySelector('.col-xs-12.col-sm-12.col-md-12.text-center.oneway');
            container.style.display = 'block';
            container.innerHTML = '';
            container.appendChild(message);
        } else if (this.classList.contains('return')) {
            container = document.querySelector('.col-xs-12.col-sm-12.col-md-12.text-center.return');
            container.style.display = 'block';
            container.innerHTML = '';
            container.appendChild(message);
        }
    });
});


/*======================================================================================================*/
// xử lý sự kiện hover khi click vào chỗ ngồi sẽ hiện màu và ẩn dòng chữ "chưa chọn vé" tại giỏ vé
var noHave = document.querySelector('.nohave');
var chieuDi = document.querySelector('.chieuDi');
var chieuVe = document.querySelector('.chieuVe');
var selectedSeatElements = [];

var seatElements = document.querySelectorAll('.et-sit-check');
console.log(seatElements);
seatElements.forEach (seatElement => { 
    seatElement.addEventListener('click', function () {
        // lấy data chỗ ngồi
        var maChoNgoi = seatElement.getAttribute('data-seat');
        var soChoNgoi = seatElement.getAttribute('number-seat');
        var maToa = seatElement.getAttribute('data-toa');
        var soToa = seatElement.getAttribute('number-toa');
        var toaInfo = "<strong>Mã toa:</strong> " + maToa + " - toa số " + soToa;
        var choInfor = "<strong>Mã chỗ:</strong> " + maChoNgoi + " - chỗ số " + soChoNgoi;
        //var tauInfor = "<strong>Mã tàu:</strong> " + maTau + "<br><strong>Tuyến:</strong> " + xuatPhat + " - " + diemDen;
        var mess = toaInfo + "<br>" + choInfor + "<br>";

        // kiểm tra chỗ được mua chưa
        var icon = seatElement.querySelector('.seat.et-sit-bought');
        if (icon === null || !icon.classList.contains('et-sit-bought')) {
            var iconCheck = seatElement.querySelector('.seat');
            // Chỉ thực hiện chọn/hủy chọn nếu không có class "et-sit-bought"
            if (iconCheck.classList.contains('et-sit-avaiable')) {
                // Phần tử chưa được chọn, thêm vào mảng và chọn
                iconCheck.classList.add('et-sit-selected');
                iconCheck.classList.remove('et-sit-avaiable');
                selectedSeatElements.push(seatElement);
                if (this.classList.contains('oneway')) {
                    //ẩn dòng chữ "Chưa chọn vé"
                    noHave.style.display = 'none';
                    chieuDi.style.display = 'block';
                    //thêm data vào giỏ vé
                    addData(mess, 'table-oneway');                            
                }
                else if (this.classList.contains('return')) {
                    //ẩn dòng chữ "Chưa chọn vé"
                    noHave.style.display = 'none';
                    chieuVe.style.display = 'block';
                    //thêm data vào giỏ vé
                    addData(mess, 'table-return');
                }

            } else {
                // Phần tử đã được chọn trước đó, hủy chọn
                iconCheck.classList.remove('et-sit-selected');
                iconCheck.classList.add('et-sit-avaiable');

                // delete data
                var index = selectedSeatElements.indexOf(seatElement);
                if (index > -1) {
                    selectedSeatElements.splice(index, 1);
                }
                if (seatElement.classList.contains('oneway'))
                    deleteData(maChoNgoi, "table-oneway");
                else if (seatElement.classList.contains('return'))
                    deleteData(maChoNgoi, "table-return");
                if (selectedSeatElements.length === 0) {
                    noHave.style.display = 'block';
                    chieuDi.style.display = 'none';
                    chieuVe.style.display = 'none';
                }
            }
        }
    });
});

// Chức năng thêm dữ liệu
function addData(data, id) {
    // Lấy tham chiếu đến bảng
    var table = document.getElementById(id);
    var tbody = table.querySelector('tbody');

    // Tạo một dòng mới
    var row = document.createElement('tr');

    // Tạo các ô dữ liệu
    var dataCell = document.createElement('td');
    dataCell.innerHTML = data;
    row.appendChild(dataCell);

    // Thêm dòng vào tbody
    tbody.appendChild(row);
    tbody.style.display = "block";
}

function deleteData(data, id) {
    var table = document.getElementById(id);
    // Lấy danh sách các hàng (tr) trong bảng
    var rows = table.getElementsByTagName('tr');

    // Duyệt qua từng hàng (tr)
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        // Lấy giá trị của cột trong hàng
        var columnValue = row.cells[0].innerHTML; // Giả sử cột đầu tiên

        // Kiểm tra nếu giá trị cột chứa chuỗi "TU00"
        if (columnValue.includes(data)) {
            // Xóa hàng (tr)
            table.deleteRow(i);
            // Giảm chỉ số i để duyệt đúng các hàng tiếp theo sau khi xóa
            i--;
        }
    }
}


/*======================================================================================================*/
//Bắt sự kiện thời gian đi và thời gian quay về
const ticketTypeInputs = document.getElementsByName('ticket_type');
let departureDateInput = document.querySelector('#departure-date');
let returnDateInput = document.querySelector('#return-date');
returnDateInput.disabled = true;
// Lấy ngày hiện tại và định dạng lại định dạng ngày tháng năm
let currentDate = new Date().toISOString().slice(0, 10);

// Thiết lập thuộc tính min cho thời gian đi, để ẩn các ngày trước ngày hiện tại
departureDateInput.min = currentDate;

// Bắt sự kiện khi ngày đi thay đổi
departureDateInput.addEventListener('change', () => {
    returnDateInput.min = departureDateInput.value;
    if (returnDateInput.disabled && ticketTypeInputs[1].checked) {
        // Bỏ disable ngày quay về nếu nó đang bị disable và loại vé là "Khứ hồi"
        returnDateInput.disabled = false;
    }
});

ticketTypeInputs.forEach(ticketTypeInput => {
    ticketTypeInput.addEventListener('click', () => {
        if (ticketTypeInput.value === 'round-trip') {
            returnDateInput.disabled = false;
        } else {
            returnDateInput.disabled = true;
        }
    });
});

// Bắt sự kiện khi ngày quay về thay đổi
returnDateInput.addEventListener('change', () => {
    // Lấy giá trị ngày đi và ngày quay về
    let departureDate = new Date(departureDateInput.value);
    let returnDate = new Date(returnDateInput.value);
    if (returnDate <= departureDate) {
        alert('Ngày quay về phải lớn hơn ngày đi!');
        returnDateInput.value = '';
    }
});