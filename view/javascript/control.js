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

const ticketTypeInputs = document.getElementsByName('ticket-type');
let departureDateInput = document.querySelector('#departure-date');
let returnDateInput = document.querySelector('#return-date');
returnDateInput.disabled = true;
// Lấy ngày hiện tại và định dạng lại định dạng ngày tháng năm
let currentDate = new Date().toISOString().slice(0,10);
// Thiết lập thuộc tính min cho thời gian đi, để ẩn các ngày trước ngày hiện tại
departureDateInput.min = currentDate;
// Bắt sự kiện khi ngày đi thay đổi
departureDateInput.addEventListener('change', () => {
  returnDateInput.min = departureDateInput.value;
  returnDateInput.disabled = false;
});
ticketTypeInputs.forEach(ticketTypeInput => {
  ticketTypeInput.addEventListener('click', () => {
    if (ticketTypeInput.value === 'one-way') {
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
const pagination = document.querySelector('.pagination');
const pageLinks = pagination.querySelectorAll('.page-link');
const totalPages = 10;
const currentPage = 1;

function generatePaginationLinks(totalPages, currentPage) {
  let startPage, endPage;
  const maxVisibleLinks = 5;
  
  if (totalPages <= maxVisibleLinks) {
    startPage = 1;
    endPage = totalPages;
  } else {
    const maxHalfVisibleLinks = Math.floor(maxVisibleLinks / 2);
    if (currentPage <= maxHalfVisibleLinks) {
      startPage = 1;
      endPage = maxVisibleLinks;
    } else if (currentPage + maxHalfVisibleLinks >= totalPages) {
      startPage = totalPages - maxVisibleLinks + 1;
      endPage = totalPages;
    } else {
      startPage = currentPage - maxHalfVisibleLinks;
      endPage = currentPage + maxHalfVisibleLinks;
    }
  }
  
  const linksHtml = [];
  
  if (currentPage > 1) {
    linksHtml.push(`<li class="page-item"><a class="page-link" href="?page=${currentPage - 1}"><i class="fas fa-chevron-left"></i></a></li>`);
  } else {
    linksHtml.push('<li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>');
  }
  
  if (startPage > 1) {
    linksHtml.push('<li class="page-item"><a class="page-link" href="?page=1">1</a></li>');
    if (startPage > 2) {
      linksHtml.push('<li class="page-item disabled"><span class="page-link">...</span></li>');
    }
  }
  
  for (let i = startPage; i <= endPage; i++) {
    const isActive = i === currentPage ? 'active' : '';
    linksHtml.push(`<li class="page-item ${isActive}"><a class="page-link" href="?page=${i}">${i}</a></li>`);
  }
  
  if (endPage < totalPages) {
    if (endPage < totalPages - 1) {
      linksHtml.push('<li class="page-item disabled"><span class="page-link">...</span></li>');
    }
    linksHtml.push(`<li class="page-item"><a class="page-link" href="?page=${totalPages}">${totalPages}</a></li>`);
  }
  
  if (currentPage < totalPages) {
    linksHtml.push(`<li class="page-item"><a class="page-link" href="?page=${currentPage + 1}"><i class="fas fa-chevron-right"></i></a></li>`);
  } else {
    linksHtml.push('<li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>');
  }
  
  return linksHtml.join('');
}

pagination.innerHTML = generatePaginationLinks(totalPages, currentPage);

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
