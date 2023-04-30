 <main>
    <header>
      <div class="text">
        <h2>Danh sách ga</h2> 
        
<table id="myTable">
  <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm chuyến tàu</button>
  <thead>
    <tr>
      <th scope="col" width="100px">Mã ga</th>
      <th scope="col" width="100px">Tên ga</th>
      <th scope="col" width="10px">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($arr as $each): ?>
    <form>
      <tr>
        <td id="MaGa" data-label="StationCode" ><?php echo $each->getMaGa(); ?></td>
        <td data-label="StationName"><?php echo $each->getTenGa(); ?></td>
        <td data-label="Period">
          <i id = "trash" class="fa fa-trash ticon" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" > </i>
          <i id="pencil" class="fa fa-pencil"></i>
      </tr>
    </form>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form id="GaForm">
      <label for="code">Mã ga:</label>
      <input type="text" id="code" name="MaGa" required>
      <label for="name">Tên ga:</label>
      <input type="text" id="name" name="TenGa" required>
      <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px; margin-right: 10px;" type="submit" id="submitBtn">Thêm</button>
      <button style="color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px;" class= "btnCancel" type="button" id="cancelBtn">Hủy</button>
    </form>
  </div>
</div>

<div id="myModal2" class="modal" style="display: none;">
  <div class="modal-content">
    <form id="GaEditForm">
      <label for="codeEdit">Mã ga:</label>
      <input style="background-color: #adb5bdfc" readonly type="text" id="codeEdit" name="MaGa" required>
      <label for="nameEdit">Tên ga:</label>
      <input type="text" id="nameEdit" name="TenGa" required>
      <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px; margin-right: 10px;" type="submit" id="submitBtn2">Lưu</button>
      <button style="background-color: red; color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px;" class= "btnCancel" type="button" id="cancelBtn2">Hủy</button>
    </form>
  </div>
</div>

      </div>
      <div>
        <button id="theme_switch">
          <i class='bx bx-sun'></i>
        </button>
      </div>
      <div>
        <button class="log" id="theme_switch">
          <i style="margin-left: 8px;" class='bx bx-power-off'></i>
        </button>
      </div>

      <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa Ga</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Bạn có chắc chắn muốn xóa Ga này không?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
              <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Xóa</button>
            </div>
          </div>
        </div>
      </div>
    </header>
    
    
  </main>
  
  
</div>
<script>
  // Thêm dữ liệu
  const addBtn = document.getElementById('addBtn');
  const modal = document.getElementById('myModal');
  const submitBtn = document.getElementById('submitBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const tableBody = document.querySelector('#myTable tbody');
  
  addBtn.addEventListener('click', function() {
    modal.style.display = "block";
  });
  
  $('#cancelBtn').click(function() {
    $('#GaForm').find('.alert-danger').remove();
    $('#myModal').hide();
    $('#GaForm input[type=text]').val('');
  });

  $('#GaForm').submit(function(e){
		e.preventDefault()
		$.ajax({
			url:'/?type=admin&page=ga&action=create',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
			},
			success:function(resp){
        console.log(resp);
				if(resp.trim() == "done"){
            window.location.href = '/?type=admin&page=ga';
            alert_toast("Data successfully created","success");
				}else{
					$('#GaForm').prepend('<div class="alert alert-danger">'+ resp + '</div>')
				}
    }
		})
	});

// Lấy danh sách tất cả các icon pencil trong bảng và đăng ký sự kiện click cho chúng
const table2 = document.querySelector('#myTable');
const modal2 = document.getElementById('myModal2');
const form = document.querySelector('#myModal2 form');
const submitBtn2 = document.getElementById('submitBtn2');
const cancelBtn2 = document.getElementById('cancelBtn2');
const codeEdit = modal2.querySelector('#codeEdit');
const nameEdit = modal2.querySelector('#nameEdit');
const editBtn = document.querySelectorAll('.fa-pencil');
 
table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-pencil')) {
    const row = event.target.closest('tr');
    const code = row.cells[0].textContent;
    const name = row.cells[1].textContent;
    
    // Điền dữ liệu vào form
    codeEdit.value = code;
    nameEdit.value = name;
    // Hiển thị form
    modal2.style.display = "block";
  }
});

  $('#GaEditForm').submit(function(e){
		e.preventDefault()
		$.ajax({
			url:'/?type=admin&page=ga&action=edit',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp.trim() == "done"){
            window.location.href = '/?type=admin&page=ga';
            alert_toast("Data successfully saved","success");
				}else{
					$('#GaEditForm').prepend('<div class="alert alert-danger">'+ resp + '</div>')
				}
    }
		})
	});

  $('#cancelBtn2').click(function() {
    $('#GaEditForm').find('.alert-danger').remove();
    $('#myModal2').hide();
    $('#GaEditForm input[type=text]').val('');
  });


// xóa

table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-trash')) {
    const row = event.target.closest('tr');
    const MaGa = row.cells[0].textContent;
    $('#confirmDeleteBtn').click(function() {
      // Gửi request xóa Ga đến server
      $.ajax({
        url: 'index.php/?type=admin&page=ga&action=delete',
        type: 'POST',
        data: { MaGa: MaGa },
        success: function(response) {
          if (response.trim() == "done") {
            // Nếu xóa Ga thành công thì chuyển hướng đến trang danh sách Ga
            window.location.href = '/?type=admin&page=ga';
          } else {
            // Nếu có lỗi thì hiển thị thông báo lỗi
            $('#deleteErrorModal').modal('show');
          }
        },
      });
    });
  }
});

// Xóa modal xác nhận khi ẩn
// $('#confirmDeleteModal').on('hidden.bs.modal', function (e) {
//   $(this).find('form')[0].reset();
// });

// Active
const link = document.querySelector(".sidenav_link.ga");
link.classList.add('active');

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
