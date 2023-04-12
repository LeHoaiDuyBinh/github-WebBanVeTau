// thiết lập nút chuyển giữa các step
$(document).ready(function () {
    var current_fs, next_fs, pre_fs;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    setProgressBar(current);
    $(".next").click(function () {
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        next_fs.show();
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(++current);
    });
    $(".pre").click(function () {
        current_fs = $(this).parent();
        pre_fs = $(this).parent().prev();
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        pre_fs.show();
        current_fs.animate({ opacity: 0 }, {
            step: function (now) {
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                pre_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
    });
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percentpercent = percent.toFixed();
        $(".pbar")
            .css("width", percent + "%")
    }
    $(".submit").click(function () {
        return false;
    })
});

// ràng buộc dữ liệu nhập tra cứu
const codeEle = document.getElementById('code');
const emailEle = document.getElementById('email');
const phoneEle = document.getElementById('phone');
const btnRegister = document.getElementById('btn-register');
const inputEles = document.querySelectorAll('.input-row');

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function isPhone(number) {
    return /(84|0[3|5|7|8|9])+([0-9]{8})\b/.test(number);
}

btnRegister.addEventListener('click', function () {
    Array.from(inputEles).map((ele) =>
        ele.classList.remove('success', 'error')
    );
    let isValid = checkValidate();

    if (isValid) {  // nếu dữ liệu đúng, kiểm tra từ database có dữ liệu cần tìm không
        document.getElementById("have-data").style.display = 'block';
        document.getElementById("bt-have-data").style.display = 'block';
        // Lấy dữ liệu từ ô nhập liệu
        // var search_term = $("#search-term").val();
        // $.ajax({
        //     url: "check-data.php",
        //     method: "POST",
        //     data: {search_term: search_term},
        //     success: function(response){
        //         // Kiểm tra kết quả trả về từ máy chủ
        //         if (response == "found"){
        //             // Nếu có dữ liệu, show thẻ div có dữ liệu
        //             document.getElementById("have-data").style.display = 'block';
        //             document.getElementById("bt-have-data").style.display = 'block';
        //         } else {
        //             // Nếu không có dữ liệu, show thẻ div không có dữ liệu
        //             document.getElementById("no-data").style.display = 'block';
        //         }
        //     }
        // });
    }
});

function setError(ele, message) {
    let parentEle = ele.parentNode;
    parentEle.classList.add('error');
    parentEle.querySelector('small').innerText = message;
}

function setSuccess(ele) {
    ele.parentNode.classList.add('success');
}

function checkValidate() {
    let codeValue = codeEle.value;
    let emailValue = emailEle.value;
    let phoneValue = phoneEle.value;
    let isCheck = true;
    //kiểm tra trường code
    if (codeValue == '') {
        setError(codeEle, 'Mã đặt chỗ không được để trống');
        isCheck = false;
    } else {
        setSuccess(codeEle);
    }
    // Kiểm tra trường email
    if (emailValue == '') {
        setError(emailEle, 'Email không được để trống');
        isCheck = false;
    } else if (!isEmail(emailValue)) {
        setError(emailEle, 'Email không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(emailEle);
    }
    // Kiểm tra trường phone
    if (phoneValue == '') {
        setError(phoneEle, 'Số điện thoại không được để trống');
        isCheck = false;
    } else if (!isPhone(phoneValue)) {
        setError(phoneEle, 'Số điện thoại không đúng định dạng');
        isCheck = false;
    } else {
        setSuccess(phoneEle);
    }
    return isCheck;
}

// ràng buộc nhập mã xác nhận và show submit
document.getElementById("conf").addEventListener("click", function(event){
    event.preventDefault();
    var code = document.getElementById("confirm-code").value;
    var errorMessage = document.getElementById("error-message");
    if (code === ""){
        document.getElementById("error-message").style.display = 'block';
        errorMessage.textContent = "Vui lòng điền mã xác nhận trước";
    } else {
        document.getElementById("submit").style.display = 'block';
        document.getElementById("error-message").style.display = 'none';
    }
});