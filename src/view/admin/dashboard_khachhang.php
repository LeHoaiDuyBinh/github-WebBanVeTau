  
  <main>
    <header>
      <div class="text">
        <h2>Khách hàng</h2> 
        
<table id="myTable">
<div class="search-container left">
    <input value="<?php echo $data; ?>" type="text" id="search-input" style="font-style: italic;background-color:var(--accent-clr); color: var(--text);" placeholder="--Tra cứu tên người đặt chỗ--">
    <input value="" type="text" hidden id="hiddenInput">
</div>
  <thead>
    <tr>
      <th scope="col" width="100px" style="text-align: left !important;">ID khách hàng</th>
      <th scope="col" width="150px" style="text-align: left !important;">Mã chuyến tàu</th>
      <th scope="col" width="150px" style="text-align: left !important;">Họ tên</th>
      <th scope="col" width="150px" style="text-align: left !important;">CCCD</th>
      <th scope="col" width="150px" style="text-align: left !important;">Ngày sinh</th>
      <th scope="col" width="150px" style="text-align: left !important;">Email</th>
      <th scope="col" width="150px" style="text-align: left !important;">SDT</th>
      <th scope="col" width="150px" style="text-align: left !important;">Mã vé</th>
      <th scope="col" width="150px" style="text-align: left !important;">Tiền vé</th>
      <th scope="col" width="220px" style="text-align: left !important;">Mã chỗ ngồi</th>
      <th scope="col" width="100px" style="text-align: left !important;">ID Người đặt chổ</th>
      <th scope="col" width="150px" style="text-align: left !important; width: 177px;">Tên người đặt chỗ</th>
      <th scope="col" width="100px">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($arrKH as $each): ?>
    <tr>
      <td data-label="id"><?php echo $each->getID_KH(); ?></td>
      <td data-label="train-code"><?php echo $each->getMaChuyenTau(); ?></td>
      <td data-label="name"><?php echo $each->getHoTen_KH(); ?></td>
      <td data-label="cccd"><?php echo $each->getCCCD_KH(); ?></td>
      <td data-label="birthday"><?php echo $each->getNgaySinh(); ?></td>
      <td data-label="email"><?php echo $each->getEmail_KH(); ?></td>
      <td data-label="sdt"><?php echo $each->getSDT_KH(); ?></td>
      <td data-label="ticketcode" value="<?php echo ($each->getMaVe() !== null) ? $each->getMaVe() : 0; ?>">
        <?php
        echo ($each->getMaVe() !== null) ? $each->getMaVe() : "Chưa thanh toán";
        ?>
      </td>
      <td data-label="ticketcost"><?php echo $each->getTienVe(); ?></td>
      <td data-label="seat-code"><?php echo $each->getMaChoNgoi(); ?></td>
      <td data-label="idNguoiDatCho"><?php echo $each->getID_NguoiDatCho(); ?></td>
      <td data-label="booking-person"><?php echo $each->getTenNguoiDatCho(); ?></td>
      <td data-label="Period">
        <i class="fa fa-trash ticon" style="margin-right: 10px;"></i>
        <i class="fa fa-pencil editBtn"></i>
      </td>
    </tr>
    <?php endforeach; ?>
    
  </tbody>
</table>
<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form id="KhachHangForm">
      <input style="height: 47px;" type="text" id="id" name="id" hidden>
      <label for="name">Họ tên:</label>
      <input style="height: 47px;" type="text" id="name" name="name" required>
      <label for="cccd">CCCD:</label>
      <input style="height: 47px;" type="text" id="cccd" name="cccd" required>
      <label for="birthday">Ngày sinh:</label>
      <input style="height: 47px; width:100%;" type="date" id="birthday" name="birthday" required>
      <br></br>
      <label for="Email">Email:</label>
      <input style="height: 47px;" type="email" id="Email" name="Email" required>
      <label for="SDT">SDT:</label>
      <input style="height: 47px;" type="text" id="SDT" name="SDT" required>
      <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px; margin-right: 10px;" type="submit" id="submitBtn">Lưu</button>
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
const hiddenInput = document.getElementById('hiddenInput');
const table = document.getElementById('myTable');
const rows = table.getElementsByTagName('tr');

if(searchInput.value.trim() != hiddenInput.value.trim()){
  const keyword = searchInput.value.trim();
  filterTable(keyword);
}

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
  var action = '';
  const addBtn = document.getElementById('addBtn');
  const submitBtn = document.getElementById('submitBtn');
  const tableBody = document.querySelector('#myTable tbody');

  const table2 = document.querySelector('#myTable');
  const form = document.querySelector('#myModal form');
  const modal = document.getElementById('myModal');
  const ID = modal.querySelector('#id');
  const HoTen = modal.querySelector('#name');
  const CCCD = modal.querySelector('#cccd');
  const Email = modal.querySelector('#Email');
  const NgaySinh = modal.querySelector('#birthday');
  const SDT = modal.querySelector('#SDT');
  const editBtns = document.getElementsByClassName('editBtn');

  function showLoadingSwal() {
  return Swal.fire({
    title: 'Loading...',
    text: 'Vui lòng chờ trong giây lát!',
    timer: 2000,
    showConfirmButton: false,
    imageUrl: '/view/image/gif/loading.gif',
    onBeforeOpen: function() {
      Swal.showLoading();
    },
    allowOutsideClick: false // Không cho phép đóng khi click ra ngoài
  });
}


for (let i = 0; i < editBtns.length; i++) {
  const editBtn = editBtns[i];
  editBtn.addEventListener('click', function() {

    action = 'edit';
    const row = event.target.closest('tr');
    const ID_table = row.cells[0].textContent.trim();
    const HoTen_table = row.cells[2].textContent.trim();
    const CCCD_table = row.cells[3].textContent.trim();
    const NgaySinh_table = row.cells[4].textContent.trim();
    const Email_table = row.cells[5].textContent.trim();
    const SDT_table = row.cells[6].textContent.trim();

    // chuẩn hóa thời gian để đưa vào thẻ input
    var [ngay, gio] = NgaySinh_table.split(' ');
    
    ID.value = ID_table;
    HoTen.value = HoTen_table;
    CCCD.value = CCCD_table;
    Email.value = Email_table;
    NgaySinh.value = ngay;
    SDT.value = SDT_table;

    modal.style.display = "block";
  });
}

$('#KhachHangForm').submit(function(e){
		e.preventDefault();
    var $form = $(this);
    var $alert = $form.find('.alert');
    var sw = showLoadingSwal();
		$.ajax({
			url:'/?type=admin&page=khachhang&action=' + action,
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
			},
			success:function(resp){
        actiontext = action == 'create' ? 'thêm' : 'sửa';
				if(resp.trim() == "done"){
          Swal.fire(
              'Completed!',
              'Bạn đã' + actiontext + ' khách hàng thành công!',
              'success'
            )
          setTimeout(function() {
              location.reload();
          }, 1000); 
          $('#KhachHangForm').find('.alert-danger').remove();
          $('#myModal').hide();
				}else{
          sw.close();
          if($alert.length === 0)
					  $('#KhachHangForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
          else{

            //nhớ thêm cái này cho mấy trang kia
            $('#KhachHangForm').find('.alert-danger').remove();
            $('#KhachHangForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
          }
              
				}
    }
		})
	});

// Bấm hủy thoát form
const cancelBtn = document.getElementById('cancelBtn');
cancelBtn.addEventListener('click', function() {
  modal.style.display = "none";
});


//------------------------------------------Xóa thông tin---------------------------------------

table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-trash')) {
    const row = event.target.closest('tr');
    const ID_KhachHang = row.cells[0].textContent.trim();
    const ID_NguoiDatCho = row.cells[10].textContent.trim();
    const TienVe = row.cells[8].textContent.trim();

      Swal.fire({
      title: 'Bạn có chắc là muốn xóa khách hàng này không?',
      text: "Bạn sẽ không thể hoàn tác sau khi hoàn tất!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Vẫn xóa',
      cancelButtonText: 'Hủy'
  }).then((result) => {
    if (result.isConfirmed) {
      var sw = showLoadingSwal();
      $.ajax({
        url: 'index.php/?type=admin&page=khachhang&action=delete',
        type: 'POST',
        data: { 
          ID_KhachHang: ID_KhachHang,
          TienVe: TienVe,
          ID_NguoiDatCho: ID_NguoiDatCho
        },
        success: function(response) {
          if (response.trim() == "done") {
            Swal.fire(
              'Completed!',
              'Bạn đã xóa khách hàng thành công!',
              'success'
            )
            // sau 2 giây sẽ tải lại trang
            setTimeout(function() {
                location.reload();
            }, 1000); 
          } else {
            sw.close();
            // Nếu có lỗi thì hiển thị thông báo lỗi
            Swal.fire(
              'Oops...',
              'Đã có lỗi xảy ra!',
              'error'
            )
          }
        },
      });
    }
  })

}
});

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
