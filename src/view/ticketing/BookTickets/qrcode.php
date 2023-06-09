<style>
    .body-page {
        margin-top: 110px;
        background-color: #fff;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        flex-direction: column;
    }
    .qr {
        text-align: center;
        width: 45%;
        height: 60%;
        padding: 30px;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
    }
    h1 {
        font-size: 30px;
        color: #01b3a7;
        margin-bottom: 20px;
    }
    #qr-code {
        width: 40%;
        height: 70%;
        border: 7px solid #01b3a7;
        border-radius: 5px;
        background-color: white;
        padding: 15px;
        box-sizing: border-box;
        display: flex;
        justify-content: center;
        align-items: stretch;
    }
    .success-notification {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgb(1, 179, 167, 0.95);
        color: #fff;
        padding: 20px;
        border-radius: 5px;
        font-size: 18px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
    .success-notification span {
        display: block;
        font-size: 40px;
        margin-bottom: 10px;
    }
    .button-preNext {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 45%;
        height: 20%;
    }
    .back-button,
    .next-button {
        background-color: #01b3a7 !important;
        float: right;
        width: 25%;
        height: 40%;
        color: white;
        border-radius: 5px;
    }
    @media (max-width: 992px) and (min-width: 699px) {
        .qr {
            text-align: center;
            width: 60%;
            height: 60%;
            padding: 30px;
        }
        #qr-code {
            width: 70%;
            height: 60%;
        }
        .button-preNext {
            width: 60%;
            height: 40%;
        }
        .back-button,
        .next-button {
            width: 30%;
            height: 20%;
            font-size: 20px;
        }
    }
    @media (max-width: 700px) and (min-width: 480px) {
        .body-page {
            margin-top: 20px;
        }
        .qr {
            text-align: center;
            width: 80%;
            height: 70%;
            padding: 30px;
        }
        h1 {
            font-size: 30px;
            margin-bottom: 25px;
        }
        #qr-code {
            width: 65%;
            height: 70%;
        }
        .button-preNext {
            width: 80%;
            height: 40%;
        }
        .back-button,
        .next-button {
            width: 30%;
            height: 20%;
            font-size: 20px;
        }
    }
    @media (max-width: 480px) and (min-width: 281px) {
        .body-page {
            margin-top: 20px;
        }
        .qr {
            text-align: center;
            width: 80%;
            height: 70%;
            padding: 30px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 25px;
        }
        #qr-code {
            width: 100%;
            height: 70%;
        }
        .button-preNext {
            width: 80%;
            height: 40%;
        }
        .back-button,
        .next-button {
            width: 30%;
            height: 20%;
        }
    }
    @media (max-width: 280px){
        .body-page {
            margin-top: 20px;
        }
        .qr {
            text-align: center;
            width: 80%;
            height: 70%;
            padding: 30px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 25px;
        }
        #qr-code {
            width: 100%;
            height: 65%;
        }
        .button-preNext {
            width: 80%;
            height: 40%;
        }
        .back-button,
        .next-button {
            width: 30%;
            height: 20%;
            white-space: nowrap;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            var successNotification = document.querySelector(".success-notification");
            successNotification.style.display = "block";
        }, 5000);
        setTimeout(function() {
            var successNotification = document.querySelector(".success-notification");
            successNotification.style.display = "none";
            var button = document.querySelector(".next-button");
            button.style.display = "block";
        }, 7000);
    });
    function quayLai() {
        history.back(); // Quay lại trang trước đó trong lịch sử duyệt
    }
    function nextPage() {
        window.location.href = "view/ticketing/BookTickets/hienthongtin.php";
    }
</script>

<div class="body-page">
    <div class="qr">
        <h1><strong>Quét mã QR để hoàn tất thanh toán</strong></h1>
        <div id="qr-code">
            <img src="https://api.qrserver.com/v1/create-qr-code/?data=https%3A%2F%2Fexample.com&size=200x200" alt="QR Code">
        </div>
    </div>
    <div class="success-notification">
        <span>&#10004;</span>
        <p style="color: #fff;">Thanh toán thành công!</p>
    </div>
    <div class="button-preNext">
        <button class="back-button" onclick="quayLai()">Quay lại</button>
        <button class="next-button" style="display: none;" onclick="nextPage()">Hoàn tất</button>
    </div>
</div>