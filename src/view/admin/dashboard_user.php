  <main>
    <header>
      <div class="text">
        <h2>Danh sách user</h2> 
        
<table id="myTable">
<button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm user</button>
  <thead>
    <tr>
      <th scope="col" width="150px">ID</th>
      <th scope="col" width="200px">Email</th>
      <th scope="col" width="220px">Mật khẩu</th>
      <th scope="col" width="150px">Chức vụ</th>
      <th scope="col" width="100px">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($arrUser as $each): ?>
    <tr>
      <td data-label="ID"><?php echo $each->getID(); ?></td>
      <td data-label="Email"><?php echo $each->getEmail(); ?></td>
      <td data-label="Password"><?php echo $each->getPassword(); ?></td>
      <td data-label="ChucVu" value="<?php echo $each->getChucVu(); ?>"><?php echo $each->getChucVutxt(); ?></td>
      <td data-label="Period">
        <i class="fa fa-trash ticon"></i>
        <i class="fa fa-pencil"></i>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form id = "UserForm">
      <input type="text" id="ID" name="ID" hidden>
      <label for="Email">Email:</label>
      <input type="email" id="Email" name="Email" required>
      <label for="MatKhau">Mật khẩu:</label>
      <input type="text" id="MatKhau" name="MatKhau" required>
      <label for="ChucVu">Chức vụ:</label>
      <select name="ChucVu" id="ChucVu">
        <option value="">
        </option>
        <option value="1">
            SuperAdmin
        </option>
        <option value="0">
            Admin
        </option>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboardLienHe.js"></script>
</body>
</html>

<script>

   var action = '';
  const addBtn = document.getElementById('addBtn');
  const modal = document.getElementById('myModal');
  const submitBtn = document.getElementById('submitBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const tableBody = document.querySelector('#myTable tbody');

  const table2 = document.querySelector('#myTable');
  const form = document.querySelector('#myModal form');
  const ID = modal.querySelector('#ID');
  const Email = modal.querySelector('#Email');
  const ChucVu = modal.querySelector('#ChucVu');
  const optionChucVu = ChucVu.querySelectorAll('option');
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
  
  addBtn.addEventListener('click', function() {
    modal.style.display = "block";
    action = 'create';
    $('#UserForm #submitBtn').text('Thêm');
  });

  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-pencil')) {
    action = 'edit';
    $('#LoaiToaForm #submitBtn').text('Lưu');
    const row = event.target.closest('tr');
    const ID_table = row.cells[0].textContent.trim();
    const Email_table = row.cells[1].textContent.trim();
    const ChucVu_table = row.cells[3].getAttribute('value').trim();
    console.log(ChucVu_table);
    console.log(optionChucVu);
    // Điền dữ liệu vào form
    ID.value = ID_table;
    Email.value = Email_table;
   
    for (let i = 0; i < optionChucVu.length; i++) {
      if (optionChucVu[i].value === ChucVu_table) {
        optionChucVu[i].selected = true;
        break;
      }
    }


    // Hiển thị form
    modal.style.display = "block";
  }
});

  $('#UserForm').submit(function(e){
		e.preventDefault();
    var $form = $(this);
    var $alert = $form.find('.alert');
    var sw = showLoadingSwal();
		$.ajax({
			url:'/?type=admin&page=user&action='+action,
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
              'Bạn đã '+ actiontext +' user thành công!',
              'success'
            )
          setTimeout(function() {
              location.reload();
          }, 1000);
          $('#myModal').hide();
				}else{
          sw.close();
          if($alert.length === 0)
					  $('#UserForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
          else{

            //nhớ thêm cái này cho mấy trang kia
            $('#UserForm').find('.alert-danger').remove();
            $('#UserForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
          }
				}
    }
		})
	});

  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-trash')) {
    const row = event.target.closest('tr');
    const ID_User = row.cells[0].textContent.trim();
    var rowCount = table2.rows.length;
    console.log(rowCount);
    if(rowCount > 3){
        Swal.fire({
      title: 'Bạn có chắc là muốn xóa user này không?',
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
        url: 'index.php/?type=admin&page=user&action=delete',
        type: 'POST',
        data: { ID_User: ID_User },
        success: function(response) {
          if (response.trim() == "done") {
            Swal.fire(
              'Completed!',
              'Bạn đã xóa user thành công!',
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
} else {
    Swal.fire(
              'Oops...',
              'Còn quá ít user, không được xóa!',
              'error'
            )
}
}
});

$('#cancelBtn').click(function() {
    $('#UserForm').find('.alert-danger').remove();
    $('#myModal').hide();
    $('#UserForm input[type=input]').val('');
    $('#UserForm input[type=email]').val('');
    $('#UserForm select').val([]);
  });
  // Active
const link = document.querySelector(".sidenav_link.user");
link.classList.add('active');
</script>
