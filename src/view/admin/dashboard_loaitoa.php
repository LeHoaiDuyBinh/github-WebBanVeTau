    
  <main>
    <header>
      <div class="text">
        <h2>Danh sách loại toa</h2> 
        
<table id="myTable">
  <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm loại toa</button>
  <thead>
    <tr>
      <th scope="col" width="50px">Mã loại toa</th>
      <th scope="col" width="80px">Tên loại toa</th>
      <th scope="col" width="50px">Giá</th>
      <th scope="col" width="30px">Số Chổ ngồi</th>
      <th scope="col" width="50px">Mô Tả</th>
      <th scope="col" width="50px">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($arrLoaiToa as $each): ?>
    <tr>
      <td data-label="CarriageCode"><?php echo $each->getMaLoaiToa(); ?></td>
      <td data-label="NameCarriage"><?php echo $each->getTenLoaiToa(); ?></td>
      <td data-label="Price"><?php echo $each->getGia(); ?></td>
      <td data-label="Description"><?php echo $each->getSoChoNgoi(); ?></td>
      <td data-label="Description"><?php echo $each->getMoTa(); ?></td>
      <td data-label="Period">
        <i class="fa fa-trash ticon"></i>
        <i class="fa fa-pencil"></i>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form id = "LoaiToaForm">
      <label for="MaLoaiToa">Mã loại toa:</label>
      <input type="text" id="MaLoaiToa" name="MaLoaiToa" required>
      <label for="TenLoaiToa">Tên loại toa:</label>
      <input type="text" id="TenLoaiToa" name="TenLoaiToa" required>
      <label for="Gia">Giá:</label>
      <input type="text" pattern="^[1-9]\d*$" id="Gia" name="Gia" required>
      <label for="SoChoNgoi">Số chổ ngồi:</label>
      <input type="text" pattern="^[1-9]\d*$" id="SoChoNgoi" name="SoChoNgoi" required>
      <label for="MoTa">Mô tả:</label>
      <input type="text" id="MoTa" name="MoTa" required>
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
  const MaLoaiToa = modal.querySelector('#MaLoaiToa');
  const TenLoaiToa = modal.querySelector('#TenLoaiToa');
  const Gia = modal.querySelector('#Gia');
  const SoChoNgoi = modal.querySelector('#SoChoNgoi');
  const MoTa = modal.querySelector('#MoTa');
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
    $('#LoaiToaForm #submitBtn').text('Thêm');
  });

  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-pencil')) {
    action = 'edit';
    $('#LoaiToaForm #submitBtn').text('Lưu');
    const row = event.target.closest('tr');
    const MaLoaiToa_table = row.cells[0].textContent.trim();
    const TenLoaiToa_table = row.cells[1].textContent.trim();
    const Gia_table = row.cells[2].textContent.trim();
    const SoChoNgoi_table = row.cells[3].textContent.trim();
    const MoTa_table = row.cells[4].textContent.trim();
    // Điền dữ liệu vào form
    MaLoaiToa.value = MaLoaiToa_table;
    TenLoaiToa.value = TenLoaiToa_table;
    Gia.value = Gia_table;
    SoChoNgoi.value = SoChoNgoi_table;
    MoTa.value = MoTa_table

    SoChoNgoi.setAttribute('readonly', true);
    SoChoNgoi.classList.add("readonly");
    // biến thành readonly
    MaLoaiToa.setAttribute('readonly', true);

    // thêm màu cho input readonly
    MaLoaiToa.classList.add("readonly");
    // Hiển thị form
    modal.style.display = "block";
  }
});

  $('#LoaiToaForm').submit(function(e){
		e.preventDefault();
    var $form = $(this);
    var $alert = $form.find('.alert');
    var sw = showLoadingSwal();
		$.ajax({
			url:'/?type=admin&page=loaitoa&action='+action,
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
              'Bạn đã '+ actiontext +' loại toa thành công!',
              'success'
            )
          setTimeout(function() {
              location.reload();
          }, 1000);
          $('#myModal').hide();
          $('#LoaiToaForm input[type=text]').removeAttr('readonly').removeClass('readonly'); 
				}else{
          sw.close();

            //nhớ thêm cái này cho mấy trang kia
            $('#LoaiToaForm').find('.alert-danger').remove();
            $('#LoaiToaForm').prepend('<div style="width: 100%; text-align: center;  font-style:italic; font-size: 16px;" class="alert alert-danger">'+ resp + '</div>');
          }
				}
		})
	});

  table2.addEventListener('click', function(event) {
  if (event.target.classList.contains('fa-trash')) {
    const row = event.target.closest('tr');
    const MaLoaiToa = row.cells[0].textContent.trim();
  Swal.fire({
      title: 'Bạn có chắc là muốn xóa loại toa này không?',
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
        url: 'index.php/?type=admin&page=loaitoa&action=delete',
        type: 'POST',
        data: { MaLoaiToa: MaLoaiToa },
        success: function(response) {
          if (response.trim() == "done") {
            Swal.fire(
              'Completed!',
              'Bạn đã xóa loại toa thành công!',
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

$('#cancelBtn').click(function() {
    $('#LoaiToaForm').find('.alert-danger').remove();
    $('#myModal').hide();
    $('#LoaiToaForm input[type=text]').val('');
    $('#LoaiToaForm input[type=text]').removeAttr('readonly').removeClass('readonly');
  });
  
  // Active
const link = document.querySelector(".sidenav_link.loaitoa");
link.classList.add('active');
</script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
