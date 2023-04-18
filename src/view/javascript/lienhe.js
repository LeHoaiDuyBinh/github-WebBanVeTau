const messageTextarea = document.getElementById("message");
    messageTextarea.addEventListener("input", function() {
        const maxLength = 150;
        const messageLength = messageTextarea.value.length;
        if (messageLength > maxLength) {
            alert("Bạn đã nhập hơn 150 ký tự, vui lòng nhập lại.");
            messageTextarea.value = messageTextarea.value.substring(0, maxLength);
        }
    });
