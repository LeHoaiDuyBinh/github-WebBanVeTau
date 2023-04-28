    
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
    <tr>
      <td data-label="TrainCode">TH1000</td>
      <td data-label="CurrentStation">TP.Hồ Chí Minh</td>
      <td data-label="Status">Hoạt động</td>
      <td data-label="Period">
        <i class="fa fa-trash ticon"></i>
        <i class="fa fa-pencil"></i>
    </tr>
  </tbody>
</table>
<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form>
      <label for="code">Mã tàu:</label>
      <input type="text" id="code" name="code" required>
      <label for="stationCode">Ga hiện tại:</label>
      <input type="text" id="stationCode" name="stationCode" required>
      <label for="statusCode">Trạng thái:</label>
      <input type="text" id="statusCode" name="statusCode" required>
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
    const code               = document.getElementById('code').value;
    const stationCode        = document.getElementById('stationCode').value;
    const statusCode         = document.getElementById('statusCode').value;
   
    if (code.trim() && stationCode.trim() && statusCode.trim()) {
      const newRow = tableBody.insertRow(0);
      const codeCell = newRow.insertCell(0);
      const stationCodeCell = newRow.insertCell(1);
      const statusCodeCell = newRow.insertCell(2);
      const periodCell = newRow.insertCell(3);
      codeCell.innerHTML = code;
      stationCodeCell.innerHTML = stationCode;
      statusCodeCell.innerHTML = statusCode;
      periodCell.innerHTML = '<i class="fa fa-trash ticon"></i> <i class="fa fa-pencil"></i>';
      modal.style.display = "none";
    }
  });
  
  cancelBtn.addEventListener('click', function() {
    modal.style.display = "none";
  });
  
  // Active
const link = document.querySelector(".sidenav_link.tau");
link.classList.add('active');
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
