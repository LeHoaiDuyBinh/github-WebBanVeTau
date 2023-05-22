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
        var khoangs = document.querySelectorAll('.khoang.round');
        khoangs.forEach(function (khoang) {
            khoang.style.display = 'none';
        });
        var container2 = document.querySelector('.col-xs-12.col-sm-12.col-md-12.text-center.round');
        container2.style.display = 'none';
        trainRounds.forEach(train => {
            train.querySelector('.et-train-head').classList.remove('et-train-head-selected');
        });
        train.querySelector('.et-train-head').classList.add('et-train-head-selected');
    });
});

//Hiển thị các toa tàu khi click vào tàu
// Tàu một chiều
const trainOneways = document.querySelectorAll('.train-oneway');
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
        if (this.classList.contains('round')) {
            var seatTrainRound = document.querySelector('.seatTrain-round');
            seatTrainRound.style.display = 'block';

            var khoangElements = seatTrainRound.querySelectorAll('.khoang');
            khoangElements.forEach(function (khoang) {
                khoang.style.display = 'none';
            });
            if (toaTitle.includes('Giường nằm khoang 6 điều hòa')) {
                var khoang1 = seatTrainRound.querySelector('#khoang1');
                khoang1.style.display = 'block';
            } else if (toaTitle.includes('Ngồi mềm điều hòa')) {
                var khoang2 = seatTrainRound.querySelector('#khoang2');
                khoang2.style.display = 'block';
            } else if (toaTitle.includes('Giường nằm khoang 4 điều hòa')) {
                var khoang3 = seatTrainRound.querySelector('#khoang3');
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
        } else if (this.classList.contains('round')) {
            container = document.querySelector('.col-xs-12.col-sm-12.col-md-12.text-center.round');
            container.style.display = 'block';
            container.innerHTML = '';
            container.appendChild(message);
        }
    });
});


// xử lý sự kiện hover khi click vào chỗ ngồi sẽ hiện màu và ẩn dòng chữ "chưa chọn vé" tại giỏ vé
var selectedSeatElements = null;
var seatElements = document.querySelectorAll('.et-sit-check');

for (var i = 0; i < seatElements.length; i++) {
    var noHave = document.querySelector('.nohave');
    var chieuDi = document.querySelector('.chieuDi');
    var chieuVe = document.querySelector('.chieuVe');
    var seatElement = seatElements[i];
    seatElement.addEventListener('click', function () {
        var icon = this.querySelector('.seat.et-sit-bought');
        if (icon === null || !icon.classList.contains('et-sit-bought')) {
            // Chỉ thực hiện chọn/hủy chọn nếu không có class "et-sit-bought"
            var iconCheck = this.querySelector('.seat');
            if (iconCheck.classList.contains('et-sit-avaiable')) {
                // Phần tử chưa được chọn, thêm vào mảng và chọn
                iconCheck.classList.add('et-sit-selected');
                iconCheck.classList.remove('et-sit-avaiable');
                // code cứng giả định add data
                noHave.style.display = 'none';
                chieuDi.style.display = 'block';
                chieuVe.style.display = 'block';
                /*code add data*/
            } else {
                // Phần tử đã được chọn trước đó, hủy chọn
                iconCheck.classList.remove('et-sit-selected');
                iconCheck.classList.add('et-sit-avaiable');
                // code cứng giả định xóa data
                noHave.style.display = 'block';
                chieuDi.style.display = 'none';
                chieuVe.style.display = 'none';
                /*code xóa data*/
            }
        }
    });
}

// xử lý sự kiện hover khi chỗ đã được bán thì tự động chuyển thành màu đỏ

// Active
const link = document.querySelector(".sidenav_link.toa.et-sit-sur");
link.classList.add('active');
