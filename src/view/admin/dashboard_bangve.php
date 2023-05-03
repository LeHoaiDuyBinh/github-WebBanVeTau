
  
    
  <main>
    <header>
      <div class="text">
        <h2>Bảng vé</h2> 
        
<table id="myTable">
  <button style="background-color:var(--accent-clr); color: var(--text);; width: 150px; height: 40px; margin-bottom: 10px;" id="addBtn">Thêm tuyến đường</button>
  <thead>
    <tr>
      <th scope="col" width="100px">Mã vé</th>
      <th scope="col" width="100px">Mã đặt chỗ</th>
      <th scope="col" width="100px">Mã chuyến</th>
      <th scope="col"  width="100px">Mã chỗ ngồi</th>
      <th scope="col" width="100px">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="TicketCode">TH100</td>
      <td data-label="BookingCode">Th151</td>
      <td data-label="TripCode">TH100</td>
      <td data-label="SeatCode">TH1829</td>
      <td data-label="Period">
        <i class="fa fa-trash ticon"></i>
        <i class="fa fa-pencil"></i>
    </tr>
  </tbody>
</table>
<div id="myModal" class="modal" style="display: none;">
  <div class="modal-content">
    <form>
      <label for="code">Mã vé:</label>
      <input type="text" id="code" name="code" required>
      <label for="reservationCode">Mã đặt chỗ:</label>
      <input type="text" id="reservationCode" name="reservationCode" required>
      <label for="tripCode">Mã chuyến:</label>
      <input type="text" id="tripCode" name="tripCode" required>
      <label for="seatCode">Mã chỗ ngồi:</label>
      <input type="text" id="seatCode" name="seatCode" required>
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
    const code               = document.getElementById('code').value;
    const reservationCode    = document.getElementById('reservationCode').value;
    const tripCode           = document.getElementById('tripCode').value;
    const seatCode           = document.getElementById('seatCode').value;
   
    if (code.trim() && reservationCode.trim() && tripCode.trim() && seatCode.trim()) {
      const newRow = tableBody.insertRow(0);
      const codeCell = newRow.insertCell(0);
      const reservationCodeCell = newRow.insertCell(1);
      const tripCodeCell = newRow.insertCell(2);
      const seatCodeCell = newRow.insertCell(3);
      const periodCell = newRow.insertCell(4);
      codeCell.innerHTML = code;
      reservationCodeCell.innerHTML = reservationCode;
      tripCodeCell.innerHTML = tripCode;
      seatCodeCell.innerHTML = seatCode;
      periodCell.innerHTML = '<i class="fa fa-trash ticon"></i> <i class="fa fa-pencil"></i>';
      modal.style.display = "none";
    }
  });
  
  cancelBtn.addEventListener('click', function() {
    modal.style.display = "none";
  });
  
  // Active
  const link = document.querySelector(".sidenav_link.bangve");
  link.classList.add('active');

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/view/javascript/dashboard.js"></script>
<script src="/view/javascript/PaginationDashboard.js"></script>
</body>
</html>
