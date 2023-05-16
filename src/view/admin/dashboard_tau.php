    
  <main>
    <header>
      <div class="text">
        <h2>Danh sách tàu hỏa</h2> 
        
<table id="myTable">
  <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm tuyến đường</button>
  <thead>
    <tr>
      <th scope="col" width="80px">Mã tàu</th>
      <th scope="col" width="150px">Ga hiện tại</th>
      <th scope="col" width="150px">trạng thái</th>
      <th scope="col" width="100px">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
          $trangThaiList = [
            0 => "Đang hoạt động",
            1 => "Đang không hoạt động",
            2 => "Đang sửa chữa"
          ];
    ?>
    <?php foreach($arrTau as $each): ?>
    <tr>
      <td data-label="TrainCode">
        <?php echo $each->getMaTau(); ?>
      </td>
      <td data-label="CurrentStation" value="<?php echo $each->getGaHienTai() ?>">
        <?php echo $each->getTenGa(); ?>
      </td>
      <td data-label="Status" value="<?php echo $each->getTrangThai(); ?>">
        <?php
              echo $trangThaiList[$each->getTrangThai()];
        ?>
      </td>
      <td data-label="Period">
        <i class="fa fa-trash ticon"></i>
        <i class="fa fa-pencil"></i>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form id ="TauForm">
      <label for="MaTau">Mã tàu:</label>
      <input type="text" id="MaTau" name="MaTau" required>
      <label for="GaHienTai">Ga hiện tại:</label>
      <select id="GaHienTai" name="GaHienTai" required>
        <option value=""></option>
        <?php foreach($arrGa as $each): ?>
          <option value="<?php echo $each->getMaGa() ?>">
            <?php echo $each->getTenGa(); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <label for="TrangThai">Trạng thái:</label>
      <select id="TrangThai" name="TrangThai" required>
        <option value=""></option>
        <option value="0">Đang hoạt động</option>
        <option value="1">Đang không hoạt động</option>
        <option value="2">Đang sửa chữa</option>
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
  
  
</div>
<script>

  // khai báo các biến sẽ dùng
  var action = '';
  const addBtn = document.getElementById('addBtn');
  const modal = document.getElementById('myModal');
  const submitBtn = document.getElementById('submitBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const tableBody = document.querySelector('#myTable tbody');

  const table2 = document.querySelector('#myTable');
  const form = document.querySelector('#myModal form');
  const MaTau = modal.querySelector('#MaTau');
  const GaHienTai = modal.querySelector('#GaHienTai');
  const TrangThai = modal.querySelector('#TrangThai');
  const optionTrangThai = TrangThai.querySelectorAll('option');
  const optionGaHienTai = GaHienTai.querySelectorAll('option');
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

  // các hàm ẩn Trạng Thái
  function addAttrHiddenOption(){
    for (let i = 0; i < optionTrangThai.length; i++) {
      optionTrangThai[i].hidden = true;
    }
  }

  function removeAttrHiddenOption(){
    for (let i = 0; i < optionTrangThai.length; i++) {
      optionTrangThai[i].hidden = false;
    }
  }
  
  // khi nhấn thêm
  addBtn.addEventListener('click', function() {
    modal.style.display = "block";
    action = 'create';
    $('#TauForm #submitBtn').text('Thêm');
    addAttrHiddenOption();
    optionTrangThai[2].hidden = false;
  });

  // khi nhấn sửa
  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-pencil')) {
    action = 'edit';
    $('#TauForm #submitBtn').text('Lưu');
    const row = event.target.closest('tr');
    const MaTau_table = row.cells[0].textContent.trim();
    const GaHienTai_table = row.cells[1].getAttribute('value').trim();
    const TrangThai_table = row.cells[2].getAttribute('value').trim();

    // Điền dữ liệu vào form
    MaTau.value = MaTau_table;
    for (let i = 0; i < optionGaHienTai.length; i++) {
      if (optionGaHienTai[i].value === GaHienTai_table) {
        optionGaHienTai[i].selected = true;
        break;
      }
    }

    // set trạng thái
    if (TrangThai_table === "0") {
      optionTrangThai[1].selected = true; // Đang hoạt động
      optionTrangThai[2].hidden = true; // Ẩn Đang không hoạt động
    } else if (TrangThai_table === "1") {
      optionTrangThai[2].selected = true; // Đang không hoạt động
      optionTrangThai[1].hidden = true; // Ẩn Đang hoạt động
    } else if (TrangThai_table === "2") {
      optionTrangThai[3].selected = true; // Đang sửa chữa
      optionTrangThai[1].hidden = true; // Ẩn Đang hoạt động
    }

        // biến thành readonly
    MaTau.setAttribute('readonly', true);

      // thêm màu cho input readonly
    MaTau.classList.add("readonly");
    // Hiển thị form
    modal.style.display = "block";
  }
});

// submit data đi và nhận resp
  $('#TauForm').submit(function(e){
		e.preventDefault();
    var $form = $(this);
    var $alert = $form.find('.alert');
    var sw = showLoadingSwal();
		$.ajax({
			url:'/?type=admin&page=tau&action=' + action,
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
              'Bạn đã ' + actiontext + ' tàu thành công!',
              'success'
            )
          setTimeout(function() {
              location.reload();
          }, 1000); 
          $('#myModal').hide();
          $('#TauForm input[type=text]').removeAttr('readonly').removeClass('readonly');

          removeAttrHiddenOption();
				}else{
          sw.close();
          if($alert.length === 0)
					  $('#TauForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>')
				}
    }
		})
	});

  // khi nhấn cancel
  $('#cancelBtn').click(function() {
    $('#TauForm').find('.alert-danger').remove();
    $('#myModal').hide();
    $('#TauForm input[type=text]').val('');
    $('#TauForm select').val([]);
    $('#TauForm input[type=text]').removeAttr('readonly').removeClass('readonly');
    removeAttrHiddenOption();
  });

  // xóa
  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-trash')) {
    const row = event.target.closest('tr');
    const MaTau = row.cells[0].textContent.trim();
  Swal.fire({
      title: 'Bạn có chắc là muốn xóa tàu này không?',
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
        url: 'index.php/?type=admin&page=tau&action=delete',
        type: 'POST',
        data: { MaTau: MaTau},
        success: function(response) {
          if (response.trim() == "done") {
            Swal.fire(
              'Completed!',
              'Bạn đã xóa tàu thành công!',
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
const link = document.querySelector(".sidenav_link.tau");
link.classList.add('active');
</script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
