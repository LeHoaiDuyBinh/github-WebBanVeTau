// Lấy tất cả các phần tử có lớp là "copyCode"
var copyCodeElements = document.getElementsByClassName("copyCode");

// Đăng ký sự kiện click cho từng phần tử
for (var i = 0; i < copyCodeElements.length; i++) {
    copyCodeElements[i].addEventListener("click", function () {
        var textToCopy = this.innerText;
        // Tạo một phần tử textarea ẩn để chứa nội dung cần sao chép
        var textarea = document.createElement("textarea");
        textarea.value = textToCopy;
        document.body.appendChild(textarea);

        // Chọn toàn bộ nội dung trong textarea
        textarea.select();

        // Sử dụng Clipboard API để sao chép nội dung vào clipboard
        navigator.clipboard.writeText(textToCopy).then(function () {
            // Xóa phần tử textarea
            document.body.removeChild(textarea);

            // Thông báo hoàn thành
            alert("Đã sao chép: " + textToCopy);
        }).catch(function (err) {
            // Xử lý lỗi (nếu có)
            console.error("Lỗi khi sao chép vào clipboard:", err);
        });
    });
}
