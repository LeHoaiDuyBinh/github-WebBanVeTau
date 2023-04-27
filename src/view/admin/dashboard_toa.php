    
  <main>
    <header>
      <div class="text">
        <h2>Danh sách các toa</h2> 
        
<table id="myTable">
  <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm tuyến đường</button>
  <thead>
    <tr>
      <th scope="col" width="50px">Mã toa</th>
      <th scope="col" width="80px">Số chỗ ngồi</th>
      <th scope="col" width="100px">Loại toa</th>
      <th scope="col" width="100px">Tàu</th>
      <th scope="col" width="50px">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="CarriageCode">T-H101</td>
      <td data-label="Seats">50</td>
      <td data-label="OptionCarriage">Tòa có điều hòa</td>
      <td data-label="Train">Tàu thương gia</td>
      <td data-label="Period">
        <i class="fa fa-trash ticon"></i>
        <i class="fa fa-pencil"></i>
    </tr>
  </tbody>
</table>
<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form>
      <label for="code">Mã toa:</label>
      <input type="text" id="code" name="code" required>
      <label for="seat">Số chỗ ngồi:</label>
      <input type="text" id="seat" name="seat" required>
      <label for="carriage">Loại toa:</label>
      <input type="text" id="carriage" name="carriage" required>
      <label for="train">Tàu:</label>
      <input type="text" id="train" name="train" required>
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
    const code     = document.getElementById('code').value;
    const seat     = document.getElementById('seat').value;
    const carriage = document.getElementById('carriage').value;
    const train    = document.getElementById('train').value;

    
    if (code.trim() && seat.trim() && carriage.trim() && train.trim()) {
      const newRow = tableBody.insertRow(0);
      const codeCell = newRow.insertCell(0);
      const seatCell = newRow.insertCell(1);
      const carriageCell = newRow.insertCell(2);
      const trainCell = newRow.insertCell(3);
      const periodCell = newRow.insertCell(4);
      codeCell.innerHTML = code;
      seatCell.innerHTML = seat;
      carriageCell.innerHTML = carriage;
      trainCell.innerHTML = train;
      periodCell.innerHTML = '<i class="fa fa-trash ticon"></i> <i class="fa fa-pencil"></i>';
      modal.style.display = "none";
    }
  });
  
  cancelBtn.addEventListener('click', function() {
    modal.style.display = "none";
  });
  //Sửa dữ liệu
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./javascript/dashboard.js"></script>
<script src="./javascript/PaginationDashboard.js"></script>
</body>
</html>
