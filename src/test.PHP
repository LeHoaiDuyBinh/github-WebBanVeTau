<table>
  <tr>
    <th>Tên</th>
    <th>Email</th>
    <th>Actions</th>
  </tr>
  <tr>
    <td>Người 1</td>
    <td>nguoi1@example.com</td>
    <td><button onclick="showBookingList(1)">Xem danh sách</button></td>
  </tr>
  <tr>
    <td>Người 2</td>
    <td>nguoi2@example.com</td>
    <td><button onclick="showBookingList(2)">Xem danh sách</button></td>
  </tr>
  <!-- Thêm các dòng khác của table -->
</table>

<div id="bookingListContainer"></div>


<script>
    function showBookingList(userId) {
  // Gửi yêu cầu đến server để lấy danh sách người dùng đã đặt chỗ của userId
  // Ví dụ: sử dụng AJAX để gửi yêu cầu và nhận dữ liệu từ server

  // Sau khi nhận được dữ liệu từ server, xử lý và hiển thị danh sách
  var bookingList = [
    "Người A",
    "Người B",
    "Người C"
    // Các người dùng khác đã đặt chỗ
  ];

  var bookingListContainer = document.getElementById("bookingListContainer");
  bookingListContainer.innerHTML = "";

  // Tạo danh sách để hiển thị danh sách người dùng đã đặt chỗ
  var ul = document.createElement("ul");

  for (var i = 0; i < bookingList.length; i++) {
    var li = document.createElement("li");
    li.textContent = bookingList[i];
    ul.appendChild(li);
  }

  bookingListContainer.appendChild(ul);
}

</script>