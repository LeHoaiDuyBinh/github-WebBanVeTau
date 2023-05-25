  
  <main>
    <header>
      <div class="text">
        <h2>Liên lạc</h2> 
        
<table id="myTable">
<div class="search-container left">
    <input type="text" id="search-input" style="font-style: italic;background-color:var(--accent-clr); color: var(--text);" placeholder="--Tra cứu tên người đặt chỗ--">
  </div>
  <thead>
    <tr>
      <th scope="col" width="100px" style="text-align: left !important;">ID</th>
      <th scope="col" width="150px" style="text-align: left !important;">Mã chuyến tàu</th>
      <th scope="col" width="150px" style="text-align: left !important;">Họ tên</th>
      <th scope="col" width="150px" style="text-align: left !important;">CCCD</th>
      <th scope="col" width="150px" style="text-align: left !important;">Ngày sinh</th>
      <th scope="col" width="220px" style="text-align: left !important;">Mã chỗ ngồi</th>
      <th scope="col" width="150px" style="text-align: left !important; width: 177px;">Tên người đặt chỗ</th>
      <th scope="col" width="100px">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="id">TK0001</td>
      <td data-label="train-code">T004</td>
      <td data-label="name">Duy Bình</td>
      <td data-label="cccd">123456789</td>
      <td data-label="birthday">04/12/2002</td>
      <td data-label="seat-code">CH0001</td>
      <td data-label="booking-person">Lê Văn Đạt</td>
      <td data-label="Period">
        <i class="fa fa-trash ticon" style="margin-right: 10px;"></i>
        <i class="fa fa-pencil editBtn"></i>
      </td>
    </tr>
    <tr>
      <td data-label="id">TK0001</td>
      <td data-label="train-code">T004</td>
      <td data-label="name">Duy Bình</td>
      <td data-label="cccd">123456789</td>
      <td data-label="birthday">04/12/2002</td>
      <td data-label="seat-code">CH0001</td>
      <td data-label="booking-person">Lê Duy Bình</td>
      <td data-label="Period">
        <i class="fa fa-trash ticon" style="margin-right: 10px;"></i>
        <i class="fa fa-pencil editBtn"></i>
      </td>
    </tr>
    <tr>
      <td data-label="id">TK0002</td>
      <td data-label="train-code">T006</td>
      <td data-label="name">Thủy Tiên</td>
      <td data-label="cccd">123456789</td>
      <td data-label="birthday">30/03/2002</td>
      <td data-label="Code-seat">CH0002</td>
      <td data-label="booking-person">Nguyễn Thị Mười</td>
      <td data-label="Period">
        <i class="fa fa-trash ticon" style="margin-right: 10px;"></i>
        <i class="fa fa-pencil editBtn"></i>
      </td>
    </tr>
  </tbody>
</table>
<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form>
      <label for="id">ID:</label>
      <input style="height: 47px;" type="text" id="id" name="id" required>
      <label for="train-code">Mã chuyến tàu: </label>
      <input style="height: 47px;" type="text" id="train-code" name="train-code" required>
      <label for="name">Họ tên:</label>
      <input style="height: 47px;" type="text" id="name" name="name" required>
      <label for="cccd">CCCD:</label>
      <input style="height: 47px;" type="text" id="cccd" name="cccd" required>
      <label for="birthday">Ngày sinh:</label>
      <input style="height: 47px; width:100%;" type="date" id="birthday" name="birthday" required>
      <br></br>
      <label for="seat-code">Mã chỗ ngồi:</label>
      <input style="height: 47px;" type="text" id="seat-code" name="seat-code" required>
      <label for="booking-person">Tên người đặt chỗ:</label>
      <input style="height: 47px;" type="text" id="booking-person" name="booking-person" required>
      <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px; margin-right: 10px;" type="button" id="submitBtn">Thêm</button>
      <button style="color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px;" class="btnCancel" type="button" id="cancelBtn">Hủy</button>
    </form>
  </div>
</div>

      </div>
      <div>
        <button style="position: absolute; top: 21px; right: 60px;" id="theme_switch">
          <i class='bx bx-sun'></i>
        </button>
      </div>
      <div>
        <button class="log" id="theme_switch">
          <i style="margin-left: 8px; position: absolute; margin-left: 8px;top: 24px;right: 23px;" class='bx bx-power-off'></i>
        </button>
      </div>
    </header>
    
    
  </main>
</div>
<script>

//------------------------------Bỏ thuộc tính overflow:hidden cho form không bị ẩn----------------------------
// Lấy tất cả các phần tử <link> trên trang
const linkElements = document.getElementsByTagName('link');

// Duyệt qua từng phần tử <link>
for (let i = 0; i < linkElements.length; i++) {
  const linkElement = linkElements[i];

  // Kiểm tra xem href của phần tử có trùng với đường dẫn CSS cần xóa hay không
  if (linkElement.getAttribute('href') === '/view/css/train.css') {
    // Xóa đối tượng <link> khỏi DOM
    linkElement.remove();
    break; // Kết thúc vòng lặp nếu đã tìm thấy và xóa đường dẫn CSS
  }
}

//-------------------------Tìm kiếm theo ký tự nhập vào--------------------------------------------------
const searchInput = document.getElementById('search-input');
const table = document.getElementById('myTable');
const rows = table.getElementsByTagName('tr');

searchInput.addEventListener('input', function() {
  const keyword = searchInput.value.trim();
  filterTable(keyword);
});

function filterTable(keyword) {
  for (let i = 1; i < rows.length; i++) {
    const row = rows[i];
    const bookingPerson = row.querySelector('td[data-label="booking-person"]').textContent;
    if (bookingPerson.toLowerCase().indexOf(keyword.toLowerCase()) !== -1) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  }
}



//------------------------------------------Sửa thông tin---------------------------------------
//Hiển thị form khi click vào icon pencil
const editBtns = document.getElementsByClassName('editBtn');
const modal = document.getElementById('myModal');
for (let i = 0; i < editBtns.length; i++) {
  const editBtn = editBtns[i];
  editBtn.addEventListener('click', function() {
    modal.style.display = "block";
  });
}

// Bấm hủy thoát form
const cancelBtn = document.getElementById('cancelBtn');
cancelBtn.addEventListener('click', function() {
  modal.style.display = "none";
});


//------------------------------------------Xóa thông tin---------------------------------------

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<!-- <script src="/view/javascript/PaginationDashboardLienHe.js"></script> -->

</body>
</html>

<script>
  // Active
const link = document.querySelector(".sidenav_link.lienhe");
link.classList.add('active');
</script>
