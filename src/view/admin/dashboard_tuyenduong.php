    
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
    <form>
    <tr>
        <td data-label="LineCode">CH1001</td>
        <td data-label="StartStation">TP.Hồ Chí Minh</td>
        <td data-label="ToStation">Hà Nội</td>
        <td data-label="Period">
          <i class="fa fa-trash ticon"></i>
          <i class="fa fa-pencil"></i>
      </tr>
    </form>
  </tbody>
</table>

<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form>
      <label for="code">Mã tuyến:</label>
      <input type="text" id="code" name="code" required>
      <label for="name">Ga xuất phát:</label>
      <input type="text" id="name" name="name" required>
      <label for="name2">Ga đến:</label>
      <input type="text" id="name2" name="name2" required>
      <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px; margin-right: 10px;" type="button" id="submitBtn">Thêm</button>
      <button style="color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px;" class= "btnCancel" type="button" id="cancelBtn">Hủy</button>
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
  
  submitBtn.addEventListener('click', function() {
    const code = document.getElementById('code').value;
    const name = document.getElementById('name').value;
    const name2 = document.getElementById('name2').value;
    
    if (code.trim() && name.trim()) {
      const newRow = tableBody.insertRow(0);
      const codeCell = newRow.insertCell(0);
      const nameCell = newRow.insertCell(1);
      const name2Cell = newRow.insertCell(2);
      const periodCell = newRow.insertCell(3);
      codeCell.innerHTML = code;
      nameCell.innerHTML = name;
      name2Cell.innerHTML = name2;
      periodCell.innerHTML = '<i class="fa fa-trash ticon"></i> <i class="fa fa-pencil"></i>';
      modal.style.display = "none";
    }
  });
  
  cancelBtn.addEventListener('click', function() {
    modal.style.display = "none";
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
