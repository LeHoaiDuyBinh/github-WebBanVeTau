//Ga đến và Ga đi bắt sự kiện không cho trùng
// Lấy các phần tử HTML cần sử dụng
const gaDi = document.querySelector('#ga-di');
const gaDen = document.querySelector('#ga-den');

// Lắng nghe sự kiện thay đổi giá trị của ga đi
gaDi.addEventListener('change', function() {
  // Lấy giá trị của ga đi được chọn
  const selectedValue = gaDi.value;

  // Lặp qua các option của ga đến để tìm các option giống với ga đi được chọn
  for (let option of gaDen.options) {
    if (option.value === selectedValue) {
      // Ẩn option giống với ga đi được chọn
      option.hidden = true;
    } else {
      option.hidden = false;
    }
  }
});

// Lắng nghe sự kiện thay đổi giá trị của ga đến
gaDen.addEventListener('change', function() {
  // Lấy giá trị của ga đến được chọn
  const selectedValue = gaDen.value;

  // Lặp qua các option của ga đi để tìm các option giống với ga đến được chọn
  for (let option of gaDi.options) {
    if (option.value === selectedValue) {
      // Ẩn option giống với ga đến được chọn
      option.hidden = true;
    } else {
      option.hidden = false;
    }
  }
});

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


// Phân trang 
var reviewsPerPage = 4; 
var currentPage = 1; 

function showReviews() {
  var startIndex = (currentPage - 1) * reviewsPerPage;
  var endIndex = startIndex + reviewsPerPage;

  var reviews = $('.review-list .review');
  reviews.hide();

  for (var i = startIndex; i < endIndex; i++) {
    $(reviews[i]).show();
  }
}

$('.pagination li').click(function() {
  event.preventDefault();
  var page = parseInt($(this).find('a').text());
  if (page != currentPage) {
    currentPage = page;
    $('.pagination li').removeClass('active');
    $(this).addClass('active');
    showReviews();
  }
});

showReviews();

//Scroll chuột hiển thị button
var backToTopButton = document.querySelector("#back-to-top-btn");

window.addEventListener("scroll", function() {
  if (window.pageYOffset > 0) {
    backToTopButton.style.display = "block";
  } else {
    backToTopButton.style.display = "none";
  }
});

backToTopButton.addEventListener("click", function() {
  window.scrollTo(0, 0);
});
