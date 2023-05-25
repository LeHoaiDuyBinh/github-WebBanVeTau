
  
    
  <main>
    <header>
      <div class="text">
        <h2>Danh sách người đặt chổ</h2> 
  <table id="myTable">
  <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm chuyến tàu</button>
  <thead>
    <tr>
      <th scope="col" width="60px">ID Người đặt chổ</th>
      <th scope="col" width="80px">Họ tên</th>
      <th scope="col" width="100px">CCCD</th>
      <th scope="col" width="100px">Email</th>
      <th scope="col" width="100px">SDT</th>
      <th scope="col" width="80px">Mã đặt chổ</th>
      <th scope="col" width="80px">Ngày đặt chổ</th>
      <th scope="col" width="80px">Tổng tiền</th>
      <th scope="col" width="80px">Trạng thái thanh toán</th>
      <th scope="col" width="80px">Ngày thanh toán</th>
      <th scope="col" width="80px">Loại thanh toán</th>
      <th scope="col" width="80px">Danh sách khách hàng</th>
      <th scope="col" width="100px">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($arrNguoiDatCho as $each): ?>
    <tr>
      <td data-label="ID"><?php echo $each->getID_NguoiDatCho(); ?></td>
      <td data-label="HoTen"><?php echo $each->getHoTenNguoiDatCho(); ?></td>
      <td data-label="CCCD"><?php echo $each->getCCCD(); ?></td>
      <td data-label="Email"><?php echo $each->getEmail(); ?></td>
      <td data-label="SDT"><?php echo $each->getSDT(); ?></td>
      <td data-label="MaDatCho"><?php echo $each->getMaDatCho(); ?></td>
      <td data-label="NgayDatCho"><?php echo $each->getNgayDatCho(); ?></td>
      <td data-label="TongTien"><?php echo $each->getTongTien(); ?></td>
      <a href=""></a>
      <td data-label="TrangThai" value="<?php echo $each->getTrangThai(); ?>">
      <?php
      if($each->getTrangThai() == 1 || $each->getTrangThai() == 2)
       echo $each->getTrangThaitxt();
      else
        echo '<button href="" id="addThanhToanBtn">Thanh toán</button>';
        ?>
      </td>
      <td data-label="NgayThanhToan"><?php echo $each->getNgayThanhToan(); ?></td>
      <td data-label="LoaiThanhToan"><?php echo $each->getLoaiThanhToan(); ?></td>

      <td data-label="ListKhachHang"><a href="<?php echo "?/type=admin&page=khachhang&action=find&data=" . $each->getHoTenNguoiDatCho(); ?>">Xem</a></td>
      <td data-label="Period">
        <i class="fa fa-trash ticon"></i>
        <i class="fa fa-pencil"></i>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form id="NguoiDatChoForm">
      <input type="text" id="ID" name="ID" hidden>
      <label for="HoTen">Họ tên:</label>
      <input type="text" id="HoTen" name="HoTen" required>
      <label for="CCCD">CCCD:</label>
      <input type="text" id="CCCD" name="CCCD" required>
      <label for="Email">Email:</label>
      <input type="email" id="Email" name="Email" required>
      <label for="SDT">SDT:</label>
      <input type="text" id="SDT" name="SDT" required>
      <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px; margin-right: 10px;" type="submit" id="submitBtn">Thêm</button>
      <button style="color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px;" class= "btnCancel" type="button" id="cancelBtn">Hủy</button>
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
  // Thêm dữ liệu
  var action = '';
  const addBtn = document.getElementById('addBtn');
  const modal = document.getElementById('myModal');
  const submitBtn = document.getElementById('submitBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const tableBody = document.querySelector('#myTable tbody');

  const table2 = document.querySelector('#myTable');
  const form = document.querySelector('#myModal form');
  const ID = modal.querySelector('#ID');
  const HoTen = modal.querySelector('#HoTen');
  const CCCD = modal.querySelector('#CCCD');
  const Email = modal.querySelector('#Email');
  const SDT = modal.querySelector('#SDT');


  const editBtn = document.querySelectorAll('.fa-pencil');

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
$('#addThanhToanBtn').click(function() {
  const row = event.target.closest('tr');
  const MaDatCho = row.cells[5].textContent.trim();
  Swal.fire({
      title: 'Thực hiện thanh toán',
      text: "Thanh toán cho người đặt chổ này?",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Thanh toán',
      cancelButtonText: 'Hủy'
  }).then((result) => {
    if (result.isConfirmed) {
      var sw = showLoadingSwal();
      $.ajax({
        url: 'index.php/?type=admin&page=nguoidatcho&action=createThanhToan',
        type: 'POST',
        data: { 
          MaDatCho: MaDatCho,
        },
        success: function(response) {
          if (response.trim() == "done") {
            Swal.fire(
              'Completed!',
              'Đã thanh toán và tạo vé thành công!',
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
  });

  $('#cancelBtn').click(function() {
    $('#NguoiDatChoForm').find('.alert-danger').remove();
    $('#myModal').hide();
    $('#NguoiDatChoForm input[type=text]').val('');
  });

  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-pencil')) {
    action = 'edit';
    const row = event.target.closest('tr');
    const ID_table = row.cells[0].textContent.trim();
    const HoTen_table = row.cells[1].textContent.trim();
    const CCCD_table = row.cells[2].textContent.trim();
    const Email_table = row.cells[3].textContent.trim();
    const SDT_table = row.cells[4].textContent.trim();
    const TrangThai_table = row.cells[8].getAttribute('value').trim();

    if(TrangThai_table != 2){
      ID.value = ID_table;
      HoTen.value = HoTen_table;
      CCCD.value = CCCD_table;
      Email.value = Email_table;
      SDT.value = SDT_table

      // Hiển thị form
      modal.style.display = "block";
    }
    else {
      Swal.fire(
        'Không thành công',
        'Thông tin đặt chổ này đã bị hủy, bạn không được sửa!',
        'error'
      )
    }
  }
});

  $('#NguoiDatChoForm').submit(function(e){
		e.preventDefault();
    var $form = $(this);
    var $alert = $form.find('.alert');
    var sw = showLoadingSwal();
		$.ajax({
			url:'/?type=admin&page=nguoidatcho&action=' + action,
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
              'Bạn đã' + actiontext + ' người đặt chổ thành công!',
              'success'
            )
          setTimeout(function() {
              location.reload();
          }, 1000); 
          $('#NguoiDatChoForm').find('.alert-danger').remove();
          $('#myModal').hide();
				}else{
          sw.close();
          if($alert.length === 0)
					  $('#NguoiDatChoForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
          else{

            //nhớ thêm cái này cho mấy trang kia
            $('#NguoiDatChoForm').find('.alert-danger').remove();
            $('#NguoiDatChoForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
          }
              
				}
    }
		})
	});

  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-trash')) {
    const row = event.target.closest('tr');
    const ID_NguoiDatCho = row.cells[0].textContent.trim();
    const TrangThai = row.cells[8].getAttribute('value').trim();

    if(TrangThai == 2){
      Swal.fire({
      title: 'Bạn có chắc là muốn xóa người đặt chổ này không?',
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
        url: 'index.php/?type=admin&page=nguoidatcho&action=delete',
        type: 'POST',
        data: { 
          ID_NguoiDatCho: ID_NguoiDatCho,
        },
        success: function(response) {
          if (response.trim() == "done") {
            Swal.fire(
              'Completed!',
              'Bạn đã xóa người đặt chổ thành công!',
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

}else{
  Swal.fire(
        'Không thành công',
        'Thông tin đặt chổ này đã hoàn thành hoặc đang chờ thanh toán, bạn không được xóa!',
        'error'
      )
}
}
});

  
  // Active
const link = document.querySelector(".sidenav_link.chuyentau");
link.classList.add('active');
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
