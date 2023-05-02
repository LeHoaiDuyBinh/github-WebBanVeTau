    
  <main>
    <header>
      <div class="text">
        <h2>Danh sách tuyến đường</h2> 
        
<table id="myTable">
  <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm tuyến đường</button>
  <thead>
    <tr>
      <th scope="col" width="80px">Mã tuyến</th>
      <th scope="col" width="100px">Ga xuất phát</th>
      <th scope="col" width="100px">Ga đến</th>
      <th scope="col" width="50px">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($arrTuyen as $each): ?>
    <form>
    <tr>
        <td data-label="LineCode" ><?php echo $each->getMaTuyen(); ?></td>
        <td data-label="StartStation" value ="<?php echo $each->getXuatPhat(); ?>"><?php echo $each->getTenGaXuatPhat(); ?></td>
        <td data-label="ToStation" value="<?php echo $each->getDiemDen(); ?>"><?php echo $each->getTenGaDiemDen(); ?></td>
        <td data-label="Period">
          <i class="fa fa-trash ticon"></i>
          <i class="fa fa-pencil"></i>
      </tr>
    </form>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form id=TuyenForm>
      <label for="MaTuyen">Mã tuyến:</label>
      <input type="text" id="MaTuyen" name="MaTuyen" required>
      <label for="XuatPhat">Ga xuất phát:</label>
      <select id="XuatPhat" name="XuatPhat" required>
        <option value=""></option>
        <?php foreach($arrGa as $each): ?>
          <option value="<?php echo $each->getMaGa() ?>">
            <?php echo $each->getTenGa(); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <label for="DiemDen">Ga đến:</label>
      <select id="DiemDen" name="DiemDen" required>
        <option value=""></option>
        <?php foreach($arrGa as $each): ?>
          <option value="<?php echo $each->getMaGa() ?>" >
            <?php echo $each->getTenGa(); ?>
          </option>
        <?php endforeach; ?>
      </select>
      <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px; margin-right: 10px;" type="submit" id="submitBtn">Thêm</button>
      <button style="color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px;" class= "btnCancel" type="button" id="cancelBtn">Hủy</button>
    </form>
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
  // check trùng
const xuatPhatSelect = document.getElementById("XuatPhat");
const diemDenSelect = document.getElementById("DiemDen");

xuatPhatSelect.addEventListener("change", function() {
    let selectedXuatPhat = xuatPhatSelect.value;
    for (let i = 0; i < diemDenSelect.options.length; i++) {
        let diemDenValue = diemDenSelect.options[i].value;
        if (diemDenValue == selectedXuatPhat) {
            diemDenSelect.options[i].style.display = "none";
        } else {
            diemDenSelect.options[i].style.display = "block";
        }
    }
});

diemDenSelect.addEventListener("change", function() {
    let selectedDiemDen = diemDenSelect.value;
    for (let i = 0; i < xuatPhatSelect.options.length; i++) {
        let xuatPhatValue = xuatPhatSelect.options[i].value;
        if (xuatPhatValue == selectedDiemDen) {
            xuatPhatSelect.options[i].style.display = "none";
        } else {
            xuatPhatSelect.options[i].style.display = "block";
        }
    }
});

  // Khai báo các biến
  var action = '';
  const addBtn = document.getElementById('addBtn');
  const modal = document.getElementById('myModal');
  const submitBtn = document.getElementById('submitBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const tableBody = document.querySelector('#myTable tbody');

  const table2 = document.querySelector('#myTable');
  const form = document.querySelector('#myModal form');
  const MaTuyen = modal.querySelector('#MaTuyen');
  const XuatPhat = modal.querySelector('#XuatPhat');
  const optionXuatPhat = XuatPhat.querySelectorAll('option');
  const DiemDen = modal.querySelector('#DiemDen');
  const optionDiemDen = DiemDen.querySelectorAll('option');
  const editBtn = document.querySelectorAll('.fa-pencil');
  
  
  // khi nhấn Thêm tuyến
  addBtn.addEventListener('click', function() {
    modal.style.display = "block";
    action = 'create';
    $('#GaForm #submitBtn').text('Thêm');
  });

  // khi bấm sửa
  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-pencil')) {
    action = 'edit';
    $('#TuyenForm #submitBtn').text('Lưu');
    const row = event.target.closest('tr');
    const MaTuyen_table = row.cells[0].textContent;
    const XuatPhat_table = row.cells[1].getAttribute('value');;
    const DiemDen_table = row.cells[2].getAttribute('value');;
    console.log(XuatPhat_table);
    // Điền dữ liệu vào form
    MaTuyen.value = MaTuyen_table;
    for (let i = 0; i < optionDiemDen.length; i++) {
      if (optionDiemDen[i].value === DiemDen_table) {
        optionDiemDen[i].selected = true;
        optionXuatPhat[i].style.display = "none";
        break;
      }
    }
    for (let i = 0; i < optionXuatPhat.length; i++) {
      if (optionXuatPhat[i].value === XuatPhat_table) {
        optionXuatPhat[i].selected = true;
        optionDiemDen[i].style.display = "none";
        break;
      }
    }

        // biến thành readonly
    MaTuyen.setAttribute('readonly', true);

      // thêm màu cho input readonly
    MaTuyen.classList.add("readonly");
    // Hiển thị form
    modal.style.display = "block";
  }
});

// khi bấm hủy
  $('#cancelBtn').click(function() {
    $('#TuyenForm').find('.alert-danger').remove();
    $('#myModal').hide();
    $('#TuyenForm input[type=text]').val('');
    $('#TuyenForm select').val([]);
    $('#TuyenForm input[type=text]').removeAttr('readonly').removeClass('readonly');
  });

  // xử lý các data và nhận resp
  $('#TuyenForm').submit(function(e){
		e.preventDefault()
		$.ajax({
			url:'/?type=admin&page=tuyenduong&action=' + action,
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
			},
			success:function(resp){
        action = action == 'create' ? 'thêm' : 'sửa';
				if(resp.trim() == "done"){
          Swal.fire(
              'Completed!',
              'Bạn đã thêm ' + action + ' thành công!',
              'success'
            )
          setTimeout(function() {
              location.reload();
          }, 1000); 
          $('#myModal').hide();
          $('#TuyenForm input[type=text]').removeAttr('readonly').removeClass('readonly');
				}else{
					$('#TuyenForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>')
				}
    }
		})
	});

// Xóa
table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-trash')) {
    const row = event.target.closest('tr');
    const MaTuyen = row.cells[0].textContent;
  Swal.fire({
      title: 'Bạn có chắc là muốn xóa tuyến này không?',
      text: "Bạn sẽ không thể hoàn tác sau khi hoàn tất!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Vẫn xóa',
      cancelButtonText: 'Hủy'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: 'index.php/?type=admin&page=tuyenduong&action=delete',
        type: 'POST',
        data: { MaTuyen: MaTuyen },
        success: function(response) {
          if (response.trim() == "done") {
            Swal.fire(
              'Completed!',
              'Bạn đã xóa tuyến thành công!',
              'success'
            )
            // sau 2 giây sẽ tải lại trang
            setTimeout(function() {
                location.reload();
            }, 1000); 
          } else {
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
const link = document.querySelector(".sidenav_link.tuyenduong");
link.classList.add('active');

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
