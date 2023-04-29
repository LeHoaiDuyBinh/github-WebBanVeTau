  
    
  <main>
    <header>
      <div class="text">
        <h2>Home</h2> 
        
<table id="myTable">
  <thead>
  </thead>
  <tbody>
    <form>

    </form>
    <form>

    </form>
  </tbody>
</table>

<div id="myModal" class="modal" style="display: none;">

</div>

<div id="myModal2" class="modal" style="display: none;">

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
    </header>
    
    
  </main>
  
  
</div>
<script>
  // Thêm dữ liệu
//   const addBtn = document.getElementById('addBtn');
//   const modal = document.getElementById('myModal');
//   const submitBtn = document.getElementById('submitBtn');
//   const cancelBtn = document.getElementById('cancelBtn');
//   const tableBody = document.querySelector('#myTable tbody');
  
//   addBtn.addEventListener('click', function() {
//     modal.style.display = "block";
//   });
  
//   submitBtn.addEventListener('click', function() {
//     const code = document.getElementById('code').value;
//     const name = document.getElementById('name').value;
    
//     if (code.trim() && name.trim()) {
//       const newRow = tableBody.insertRow(0);
//       const codeCell = newRow.insertCell(0);
//       const nameCell = newRow.insertCell(2);
//       const periodCell = newRow.insertCell(3);
//       codeCell.innerHTML = code;
//       nameCell.innerHTML = name;
//       periodCell.innerHTML = '<i class="fa fa-trash ticon"></i> <i class="fa fa-pencil"></i>';
//       modal.style.display = "none";
//     }
//   });
  
//   cancelBtn.addEventListener('click', function() {
//     modal.style.display = "none";
//   });

// Sửa dữ liệu
// Lấy danh sách tất cả các icon pencil trong bảng và đăng ký sự kiện click cho chúng
// const table2 = document.querySelector('#myTable');
// const modal2 = document.getElementById('myModal2');
// const form = document.querySelector('#myModal2 form');
// const submitBtn2 = document.getElementById('submitBtn2');
// const cancelBtn2 = document.getElementById('cancelBtn2');
// const codeEdit = modal2.querySelector('#codeEdit');
// const nameEdit = modal2.querySelector('#nameEdit');
// const editBtn = document.querySelectorAll('.fa-pencil');
 
// table2.addEventListener('click', function(event) {
//   if (event.target.classList.contains('fa-pencil')) {
//     const row = event.target.closest('tr');
//     const code = row.cells[0].textContent;
//     const name = row.cells[1].textContent;
    
//     // Điền dữ liệu vào form
//     codeEdit.value = code;
//     nameEdit.value = name;
//     // Hiển thị form
//     modal2.style.display = "block";
//   }
// });

// submitBtn2.addEventListener('click', function() {
//   const code = codeEdit.value.trim();
//   const name = nameEdit.value.trim();

//   if (code && name) {
//     const rows = document.querySelectorAll("tr td:nth-child(1)");
//     for (let i = 0; i < rows.length; i++) {
//       const cell = rows[i];
//       if (cell.textContent === code) {
//         const row = cell.parentNode;
//         row.cells[0].textContent = code;
//         row.cells[1].textContent = name;
//       }
//     }
//     modal2.style.display = "none";
//   } else {
//     alert('Vui lòng nhập đầy đủ thông tin');
//   }
// });



// cancelBtn2.addEventListener('click', function() {
//   // Xử lý khi người dùng bấm nút hủy
//   modal2.style.display = "none";
// });

// Active
const link = document.querySelector(".sidenav_link.home");
link.classList.add('active');

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
