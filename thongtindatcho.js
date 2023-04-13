document.getElementById('forgotBookingCode').addEventListener('click', function() {
    // Xử lý khi người dùng quên mã đặt chỗ
    alert('Vui lòng liên hệ với tổng đài hỗ trợ khách hàng để lấy lại mã đặt chỗ.');
    });
document.getElementById("bookingForm").addEventListener("submit", function(event) {
event.preventDefault();
// Lấy giá trị nhập vào từ form
var bookingCode = document.getElementById("bookingCode").value;
var email = document.getElementById("email").value;
var phoneNumber = document.getElementById("phoneNumber").value;
var cccd = document.getElementById("cccd").value;
var paymentMethod = document.getElementById("paymentMethod").value;

// Kiểm tra và xử lý logic tra cứu thông tin đặt chỗ
// Sau khi tra cứu xong, cập nhật thông tin vào bảng
var tableBody = document.getElementById("booking-info-tbody");
var newRow = tableBody.insertRow();
var cell1 = newRow.insertCell(0);
var cell2 = newRow.insertCell(1);
var cell3 = newRow.insertCell(2);
var cell4 = newRow.insertCell(3);
var cell5 = newRow.insertCell(4);
cell1.textContent = bookingCode;
cell2.textContent = email;
cell3.textContent = phoneNumber;
cell4.textContent = cccd;
cell5.textContent = paymentMethod;

// Reset giá trị nhập vào từ form
document.getElementById("bookingCode").value = "";
document.getElementById("email").value = "";
document.getElementById("phoneNumber").value = "";
document.getElementById("cccd").value = "";
window.location.href = "thongtindatcho.html";
});