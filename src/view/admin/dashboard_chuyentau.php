
  
    
  <main>
    <header>
      <div class="text">
        <h2>Danh sách chuyến tàu</h2> 
  <table id="myTable">
  <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm chuyến tàu</button>
  <thead>
    <tr>
      <th scope="col" width="80px">Mã chuyến tàu</th>
      <th scope="col" width="60px">Ga xuất phát</th>
      <th scope="col" width="60px">Ga đến</th>
      <th scope="col" width="80px">Mã tàu</th>
      <th scope="col" width="100px">Thời gian xuất phát</th>
      <th scope="col" width="100px">Thời gian đến nơi</th>
      <th scope="col" width="80px">Trạng thái</th>
      <th scope="col" width="100px">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($arrChuyenTau as $each): ?>
    <tr>
      <td data-label="TripCode"><?php echo $each->getMaChuyenTau(); ?></td>
      <td data-label="GaXuatPhat" value="<?php echo $each->getXuatPhat(); ?>" data-ma-tuyen="<?php echo $each->getMaTuyenDuong(); ?>"><?php echo $each->getTenGaXuatPhat(); ?></td>
      <td data-label="GaDen" value="<?php echo $each->getDiemDen(); ?>"><?php echo $each->getTenGaDiemDen(); ?></td>
      <td data-label="TrainCode"><?php echo $each->getMaTau(); ?></td>
      <td data-label="TimeStart"><?php echo $each->getThoiGianXuatPhat(); ?></td>
      <td data-label="EndTime"><?php echo $each->getThoiGianDenNoi(); ?></td>
      <td data-label="Status" value="<?php echo $each->getTrangThai(); ?>"><?php echo $each->getTrangThaitxt(); ?></td>
      <td data-label="Period">
        <i class="fa fa-trash ticon"></i>
        <i class="fa fa-pencil"></i>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form id="ChuyenTauForm">
      <label for="MaChuyenTau">Mã chuyến tàu:</label>
      <input type="text" id="MaChuyenTau" name="MaChuyenTau" required>
      <label for="MaTuyenDuong">Mã tuyến:</label>
      <select name="MaTuyenDuong" id="MaTuyenDuong" required  >
      <option value=""></option>
      <?php foreach($arrTuyenDuong as $each): ?>
        <option value="<?php echo $each->getMaTuyenDuong(); ?>" data-xuat-phat="<?php echo $each->getXuatPhat(); ?>">
              <?php echo $each->getTenGaXuatPhat() . " - " . $each->getTenGaDiemDen();?>
        </option>
      <?php endforeach; ?>
      </select>
      <label for="MaTau">Mã tàu:</label>
      <select name="MaTau" id="MaTau" required>
        <option value=""></option>
      <?php foreach($arrTau as $each): ?>
        <option value="<?php echo $each->getMaTau(); ?>" data-ga-hien-tai="<?php echo $each->getGaHienTai(); ?>">
              <?php echo $each->getMaTau();?>
        </option>
      <?php endforeach; ?>
      </select>
      <label for="ThoiGianXuatPhat">Thời gian xuất phát:</label>
      <input style="width: 99%; height: 41px; border-radius: 4px; border: 2px solid #ccc" type="datetime-local" id="ThoiGianXuatPhat" name="ThoiGianXuatPhat" required>
      <label for="TrangThai">Trạng thái:</label>
      <select name="TrangThai" id="TrangThai" required>
        <option value=""></option>
        <option value="0">Sẵn sàng hoạt động</option>
        <option value="1">Đang gặp sự cố</option>
      </select>
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
  
  <!-- SỬA CHECK -->
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
  const MaChuyenTau = modal.querySelector('#MaChuyenTau');
  const MaTuyenDuong = modal.querySelector('#MaTuyenDuong');
  const optionMaTuyenDuong = MaTuyenDuong.querySelectorAll('option');
  const MaTau = modal.querySelector('#MaTau');
  const optionMaTau= MaTau.querySelectorAll('option');
  const ThoiGianXuatPhat = modal.querySelector('#ThoiGianXuatPhat');
  const TrangThai = modal.querySelector('#TrangThai');
  const optionTrangThai= TrangThai.querySelectorAll('option');
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

function hienThiTauHopLe(){
  // Lấy giá trị XuatPhat của tuyến duong được chọn
  var xuatPhat = MaTuyenDuong.options[MaTuyenDuong.selectedIndex].dataset.xuatPhat;
  for (let i = 0; i < optionMaTau.length; i++) {
      optionMaTau[0].selected = true;
      if (optionMaTau[i].dataset.gaHienTai == xuatPhat)
        optionMaTau[i].style.display = "block";
      else
      optionMaTau[i].style.display = "none";
    }
}

// hiển thị tàu theo tuyến
MaTuyenDuong.addEventListener('change', function() {
  //hienThiTauHopLe();
});

function removeAttrHiddenOption(){
    for (let i = 0; i < optionTrangThai.length; i++) {
      optionTrangThai[i].hidden = false;
    }
  }
  
  addBtn.addEventListener('click', function() {
    modal.style.display = "block";
    action = 'create';
    $('#ChuyenTauForm #submitBtn').text('Thêm');
    optionTrangThai[2].hidden = true;
  });

  $('#cancelBtn').click(function() {
    $('#ChuyenTauForm').find('.alert-danger').remove();
    $('#myModal').hide();
    $('#ChuyenTauForm input[type=text]').val('');
    $('#ChuyenTauForm select').val([]);
    $('#ChuyenTauForm input[type=datetime-local]').val([]);
    $('#ChuyenTauForm input[type=text]').removeAttr('readonly').removeClass('readonly');
  });

  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-pencil')) {
    action = 'edit';
    $('#ChuyenTauForm #submitBtn').text('Lưu');
    const row = event.target.closest('tr');
    const MaChuyenTau_table = row.cells[0].textContent.trim();
    const MaTuyen_table = row.cells[1].getAttribute('data-ma-tuyen');
    const MaTau_table = row.cells[3].textContent.trim();
    const ThoiGianXuatPhat_table = row.cells[4].textContent.trim();
    const TrangThai_table = row.cells[6].getAttribute('value').trim();

    // chuyến đã hoàn thành hoặc đang chạy thì k cho sửa
    if(TrangThai_table != 2 && TrangThai_table != 3){
          // Điền dữ liệu vào form
    MaChuyenTau.value = MaChuyenTau_table;
    for (let i = 0; i < optionMaTuyenDuong.length; i++) {
      if (optionMaTuyenDuong[i].value === MaTuyen_table) {
        optionMaTuyenDuong[i].selected = true;
        break;
      }
    }

    // hienThiTauHopLe();
    
    for (let i = 0; i < optionMaTau.length; i++) {
      if (optionMaTau[i].value === MaTau_table) {
        optionMaTau[i].selected = true;
      }
    }

    // chuẩn hóa thời gian để đưa vào thẻ input
    var [ngay, gio] = ThoiGianXuatPhat_table.split(' ');

    // Tách ngày thành các thành phần ngày, tháng, năm
    var [ngayValue, thangValue, namValue] = ngay.split('-');

    // Tách giờ thành các thành phần giờ, phút, giây
    var [gioValue, phutValue, giayValue] = gio.split(':');

    // Định dạng chuỗi thời gian phù hợp với input datetime-local (Y-m-d\TH:i:s)
    var thoiGianFormatted = `${namValue}-${thangValue}-${ngayValue}T${gioValue}:${phutValue}:${giayValue}`; 

    ThoiGianXuatPhat.value = thoiGianFormatted;
    removeAttrHiddenOption();
    for (let i = 0; i < optionTrangThai.length; i++) {
      if (optionTrangThai[i].value === TrangThai_table) {
        optionTrangThai[i].selected = true;
      }
    }
        // biến thành readonly
      MaChuyenTau.setAttribute('readonly', true);

      // thêm màu cho input readonly
      MaChuyenTau.classList.add("readonly");
    // Hiển thị form
    modal.style.display = "block";
    }
    else {
      Swal.fire(
        'Không thành công',
        'Chuyến tàu đã kết thúc, bạn không được sửa!',
        'error'
      )
    }
  }
});

  $('#ChuyenTauForm').submit(function(e){
		e.preventDefault();
    var $form = $(this);
    var $alert = $form.find('.alert');
    var sw = showLoadingSwal();
		$.ajax({
			url:'/?type=admin&page=chuyentau&action=' + action,
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
              'Bạn đã' + actiontext + ' chuyến tàu thành công!',
              'success'
            )
          setTimeout(function() {
              location.reload();
          }, 1000); 
          $('#ChuyenTauForm').find('.alert-danger').remove();
          $('#myModal').hide();
          $('#ChuyenTauForm input[type=text]').removeAttr('readonly').removeClass('readonly');
				}else{
          sw.close();
          if($alert.length === 0)
					  $('#ChuyenTauForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
          else{

            //nhớ thêm cái này cho mấy trang kia
            $('#ChuyenTauForm').find('.alert-danger').remove();
            $('#ChuyenTauForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
          }
              
				}
    }
		})
	});

  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-trash')) {
    const row = event.target.closest('tr');
    const MaChuyenTau = row.cells[0].textContent.trim();
    const TrangThai = row.cells[6].getAttribute('value').trim();
  Swal.fire({
      title: 'Bạn có chắc là muốn xóa chuyến tàu này không?',
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
        url: 'index.php/?type=admin&page=chuyentau&action=delete',
        type: 'POST',
        data: { 
          MaChuyenTau: MaChuyenTau,
          TrangThai: TrangThai 
        },
        success: function(response) {
          if (response.trim() == "done") {
            Swal.fire(
              'Completed!',
              'Bạn đã xóa chuyến tàu thành công!',
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

  
  // Active
const link = document.querySelector(".sidenav_link.chuyentau");
link.classList.add('active');
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
