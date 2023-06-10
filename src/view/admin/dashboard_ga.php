 <main>
    <header>
      <div class="text">
        <h2>Danh sách ga</h2> 
        
<table id="myTable">
  <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm ga</button>
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
        <td id="MaGa" data-label="StationCode" >
          <?php echo $each->getMaGa(); ?>
        </td>
        <td data-label="StationName">
          <?php echo $each->getTenGa(); ?>
        </td>
        <td data-label="Period">
          <i id = "trash" class="fa fa-trash ticon" > </i>
          <i id="pencil" class="fa fa-pencil"></i>
      </tr>
    </form>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content" style="background-color:var(--accent-clr); color: var(--text);">
    <form id="GaForm">
      <label for="code">Mã ga:</label>
      <input style="color: black" type="text" id="code" name="MaGa" required>
      <label for="name">Tên ga:</label>
      <input style="color: black" type="text" id="name" name="TenGa" required>
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
  // khai báo các phần cần sử dụng
  var action = '';
  const addBtn = document.getElementById('addBtn');
  const modal = document.getElementById('myModal');
  const submitBtn = document.getElementById('submitBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const tableBody = document.querySelector('#myTable tbody');

  const table2 = document.querySelector('#myTable');
  const form = document.querySelector('#myModal form');
  const code = modal.querySelector('#code');
  const name = modal.querySelector('#name');
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
  
  // khi nhấn thêm
  addBtn.addEventListener('click', function() {
    modal.style.display = "block";
    action = 'create';
    $('#GaForm #submitBtn').text('Thêm');
  });

  // khi nhấn sửa
  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-pencil')) {
    action = 'edit';
    $('#GaForm #submitBtn').text('Lưu');
    const row = event.target.closest('tr');
    const code_table = row.cells[0].textContent.trim();
    const name_table = row.cells[1].textContent.trim();
    console.log(code);
    // Điền dữ liệu vào form
    code.value = code_table;
    name.value = name_table;

    // biến thành readonly
    code.setAttribute('readonly', true);

    // thêm màu cho input readonly
    code.classList.add("readonly");
    // Hiển thị form
    modal.style.display = "block";
  }
});
  
// khi nhấn hủy
  $('#cancelBtn').click(function() {
    $('#GaForm').find('.alert-danger').remove();
    $('#myModal').hide();
    $('#GaForm input[type=text]').val('');
    $('#GaForm input[type=text]').removeAttr('readonly').removeClass('readonly');
  });

  // truyền data tới DB và nhận response
  $('#GaForm').submit(function(e){
		e.preventDefault();
    var $form = $(this);
    var sw = showLoadingSwal();
		$.ajax({
			url:'/?type=admin&page=ga&action='+action,
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
			},
			success:function(resp){
        var actionText = action == 'create' ? 'thêm' : 'sửa';
				if(resp.trim() == "done"){
          Swal.fire(
              'Completed!',
              'Bạn đã '+ actionText +' ga thành công!',
              'success'
            )
          setTimeout(function() {
              location.reload();
          }, 1000);
          $('#myModal').hide();
          $('#GaForm input[type=text]').removeAttr('readonly').removeClass('readonly'); 
				}else{
          sw.close();

            //nhớ thêm cái này cho mấy trang kia
            $('#GaForm').find('.alert-danger').remove();
            $('#GaForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
          }
				}
		})
	});

// xóa
table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-trash')) {
    const row = event.target.closest('tr');
    const MaGa = row.cells[0].textContent.trim();
  Swal.fire({
      title: 'Bạn có chắc là muốn xóa ga này không?',
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
        url: 'index.php/?type=admin&page=ga&action=delete',
        type: 'POST',
        data: { MaGa: MaGa },
        success: function(response) {
          if (response.trim() == "done") {
            Swal.fire(
              'Completed!',
              'Bạn đã xóa ga thành công!',
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
              response,
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
const link = document.querySelector(".sidenav_link.ga");
link.classList.add('active');

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
