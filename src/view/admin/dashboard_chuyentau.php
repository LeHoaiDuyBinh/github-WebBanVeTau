
  
    
  <main>
    <header>
      <div class="text">
        <h2>Danh sách chuyến tàu</h2> 
  <table id="myTable">
  <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm chuyến tàu</button>
  <thead>
    <tr>
      <th scope="col" width="80px">Mã chuyến</th>
      <th scope="col" width="80px">Mã tuyến</th>
      <th scope="col" width="80px">Mã tàu</th>
      <th scope="col" width="100px">Thời gian xuất phát</th>
      <th scope="col" width="100px">Thời gian đến nơi</th>
      <th scope="col" width="80px">Trạng thái</th>
      <th scope="col" width="100px">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="TripCode">TH303</td>
      <td data-label="LineCode">TH100</td>
      <td data-label="TrainCode">Th1020</td>
      <td data-label="TimeStart">30/03/2023</td>
      <td data-label="EndTime">1/4/2023</td>
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
      <label for="code">Mã chuyến:</label>
      <input type="text" id="code" name="code" required>
      <label for="lineCode">Mã tuyến:</label>
      <input type="text" id="lineCode" name="lineCode" required>
      <label for="trainCode">Mã tàu:</label>
      <input type="text" id="trainCode" name="trainCode" required>
      <label for="startTime">Thời gian xuất phát:</label>
      <input style="width: 99%; height: 41px; border-radius: 4px; border: 2px solid #ccc" type="date" id="startTime" name="startTime" required>
      <label for="endTime">Thời gian xuất phát:</label>
      <input style="width: 99%; height: 41px; border-radius: 4px; border: 2px solid #ccc" type="date" id="endTime" name="endTime" required>
      <label for="status">Trạng thái:</label>
      <input type="text" id="status" name="status" required>
      <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;font-size: 16px; margin-right: 10px;" type="button" id="submitBtn">Thêm</button>
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
  const addBtn = document.getElementById('addBtn');
  const modal = document.getElementById('myModal');
  const submitBtn = document.getElementById('submitBtn');
  const cancelBtn = document.getElementById('cancelBtn');
  const tableBody = document.querySelector('#myTable tbody');
  
  addBtn.addEventListener('click', function() {
    modal.style.display = "block";
  });
  
  submitBtn.addEventListener('click', function() {
    const code             = document.getElementById('code').value;
    const lineCode         = document.getElementById('lineCode').value;
    const trainCode        = document.getElementById('trainCode').value;
    const startTime        = document.getElementById('startTime').value;
    const endTime          = document.getElementById('endTime').value;
    const status           = document.getElementById('status').value;
   
    if (code.trim() && lineCode.trim() && trainCode.trim() && startTime.trim() && endTime.trim() && status.trim()) {
      const newRow = tableBody.insertRow(0);
      const codeCell = newRow.insertCell(0);
      const lineCodeCell = newRow.insertCell(1);
      const trainCodeCell = newRow.insertCell(2);
      const startTimeCell = newRow.insertCell(3);
      const endTimeCell = newRow.insertCell(4);
      const statusCell = newRow.insertCell(5);
      const periodCell = newRow.insertCell(6);
      codeCell.innerHTML = code;
      lineCodeCell.innerHTML = lineCode;
      trainCodeCell.innerHTML = trainCode;
      startTimeCell.innerHTML = startTime;
      endTimeCell.innerHTML   = endTime;
      statusCell.innerHTML = status;
      periodCell.innerHTML = '<i class="fa fa-trash ticon"></i> <i class="fa fa-pencil"></i>';
      modal.style.display = "none";
    }
  });
  
  cancelBtn.addEventListener('click', function() {
    modal.style.display = "none";
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
